<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OrdemServicoRequest;
use App\OrdemServico;
use App\OsServico;
use App\OsProduto;
use App\Cliente;
use App\Mecanico;
use App\Produto;
use App\Servico;
use App\Veiculo;
use DB;


class OrdemServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ordem_servicos_veiculos = OrdemServico::with('veiculos')->orderBy('id')->get();
        
        $clientes = Cliente::all();

        $clientes_json = $clientes->toJson();
        $clientes_array =  (array) json_decode($clientes_json);


        return view('ordem.index', ['clientes' => $clientes_array, 'ordem_servicos_veiculos' => $ordem_servicos_veiculos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes  = Cliente::all()->sortBy('id');
        $mecanicos = Mecanico::all()->sortBy('id');
        $produtos = Produto::all()->sortBy('id');
        $servicos = Servico::all()->sortBy('id');
        
        return view('ordem.adicionar', [
                                'clientes' => $clientes, 
                                'mecanicos' => $mecanicos,
                                'produtos' => $produtos,
                                'servicos' => $servicos]);
    }

    public function preencherVeiculo($id)
    {
        $veiculos = Veiculo::where('cliente_id', $id)->get();

        echo json_encode($veiculos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrdemServicoRequest $request)
    {
        $ordem_servico = new OrdemServico();
        
        $dados = $request->except(['_token', 'cliente_select']);
        $dados['inicio'] = date('Y-m-d  H:i:s', time());
        $dados['preco'] =  00;
        $dados['status'] =  1;

        //print_r($dados);
        //fazendo pelo eloquent ordem_servico->create($dados) não funcionou
        $id = DB::table('ordem_servicos')->insertGetId($dados);
    
        return redirect()->route('ordemServico.edit', ['ordemServico'=>$id]); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ordem_servico_veiculos_mecanicos = OrdemServico::with('veiculos', 'mecanicos', 'servicos', 'produtos')->where('id', $id)->get();
        $os_produtos = OsProduto::where('ordem_servico_id', $id)->orderBy("produto_id")->get();
        
        if(!empty($ordem_servico_veiculos_mecanicos)){
            
            foreach ($ordem_servico_veiculos_mecanicos as $item) {
                $cliente_id_pesquisa = $item->veiculos->cliente_id;
            }
            $cliente = Cliente::find($cliente_id_pesquisa);

            $os_produtos = $os_produtos->toJson();
            $os_produtos_array =  (array) json_decode($os_produtos);


            return view('ordem.show', [
                'ordem_servico_veiculos_mecanicos' => $ordem_servico_veiculos_mecanicos,
                'cliente' => $cliente,
                'id_os' => $id,
                'os_produtos_array' => $os_produtos_array
            ]);
        }else{
            return redirect()->route('ordemServico.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ordem_servico_veiculos_mecanicos = OrdemServico::with('veiculos', 'mecanicos', 'servicos', 'produtos')->where('id', $id)->get();
        $servicos = Servico::all()->sortBy("id");
        $produtos = Produto::all()->sortBy("id");
        $os_produtos = OsProduto::where('ordem_servico_id', $id)->orderBy("produto_id")->get();

        if(!empty($ordem_servico_veiculos_mecanicos)){
            
            foreach ($ordem_servico_veiculos_mecanicos as $item) {
                $cliente_id_pesquisa = $item->veiculos->cliente_id;
            }
            $cliente = Cliente::find($cliente_id_pesquisa);

            $os_produtos = $os_produtos->toJson();
            $os_produtos_array =  (array) json_decode($os_produtos);
            
            return view('ordem.editar', [
                 'ordem_servico_veiculos_mecanicos' => $ordem_servico_veiculos_mecanicos,
                 'cliente' => $cliente,
                 'servicos' => $servicos,
                 'produtos' => $produtos,
                 'id_os' => $id,
                 'os_produtos_array' => $os_produtos_array
            ]);
        }else{
            return redirect()->route('ordemServico.index');
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        $ordem_servico = OrdemServico::find($id);
       
       if (isset($ordem_servico)) {
        $dados['preco'] = $request->input('preco');

        $ordem_servico->update($dados);
        
       }
       return redirect()->route('ordemServico.index');
    }

    public function updateServicoAjax(Request $request, $id)
    {
        /*$os_servico = new OsServico();
        $os_servico->ordem_servico_id = $id;        
        $os_servico->servico_id = $request->input('servico_id');
        $os_servico->descricao_problema =  $request->input('descricao_problema');

        $os_servico->save();*/

        $ordem_servico = OrdemServico::find($id);
        $servico_id = $request->input('servico_id');

        $os_servico = OsServico::where('ordem_servico_id', $id)->where('servico_id', $servico_id)->get();

        //return json_encode($os_servico);

        if(count($os_servico)>0){
            return json_encode([]);
        } else{
            $descricao_problema =  $request->input('descricao_problema');


            $ordem_servico->servicos()->attach($servico_id, ['descricao_problema' => $descricao_problema]);
            
            $servico = Servico::find($servico_id);

            return json_encode($servico);
            
        }
    }

    public function updateProdutoAjax(Request $request, $id)
    {
        $ordem_servico = OrdemServico::find($id);
        $produto_id = $request->input('produto_id');

        $os_produto = OsProduto::where('ordem_servico_id', $id)->where('produto_id', $produto_id)->get();

        //return json_encode($os_servico);

        if(count($os_produto)>0){
            return json_encode([]);
        } else{
            $quantidade =  $request->input('quantidade');


            $ordem_servico->produtos()->attach($produto_id, ['quantidade' => $quantidade]);
            
            $produto = Produto::find($produto_id);

            return json_encode($produto);
        }
    }

    public function removerServicoAjax($id_os, $id_servico)
    {
        $ordem_servico = OrdemServico::find($id_os);
        if(isset($ordem_servico)){
            $ordem_servico->servicos()->detach($id_servico);
        }

        return json_encode("sucesso");
    }

    public function removerProdutoAjax($id_os, $id_produto)
    {
        $ordem_servico = OrdemServico::find($id_os);
        if(isset($ordem_servico)){
            $ordem_servico->produtos()->detach($id_produto);
        }

        return json_encode("sucesso");
    }

    public function mudarStatus($id_os, $novo_status)
    {
        $ordem_servico = OrdemServico::find($id_os);

        
        if ((isset($ordem_servico)) && ($novo_status >= 2) && (($novo_status <= 3))) {
            $dados['status'] = $novo_status;
            $ordem_servico->update($dados);
            return redirect()->route('ordemServico.show', ['ordemServico' => $id_os]);
        } else{
            return redirect()->route('ordemServico.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
