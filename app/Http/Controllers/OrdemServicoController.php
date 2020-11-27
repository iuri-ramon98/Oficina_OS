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
        //
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ordem_servico_veiculos_mecanicos = OrdemServico::with('veiculos', 'mecanicos', 'servicos')->where('id', $id)->get();
        $servicos = Servico::all();
        $produtos = Produto::all();

        if(!empty($ordem_servico_veiculos_mecanicos)){
            
            foreach ($ordem_servico_veiculos_mecanicos as $item) {
                $cliente_id_pesquisa = $item->veiculos->cliente_id;
            }
            

            $cliente = Cliente::find($cliente_id_pesquisa);

            //return $ordem_servico_veiculos_mecanicos->toJson();
            
            return view('ordem.editar', [
                 'ordem_servico_veiculos_mecanicos' => $ordem_servico_veiculos_mecanicos,
                 'cliente' => $cliente,
                 'servicos' => $servicos,
                 'produtos' => $produtos,
                 'id_os' => $id
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
        //
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
            echo "servico ja adicionado";
        } else{
            $descricao_problema =  $request->input('descricao_problema');


            $ordem_servico->servicos()->attach($servico_id, ['descricao_problema' => $descricao_problema]);
    
            return json_encode($ordem_servico);
            
        }
    }

    public function updateProdutoAjax(Request $request, $id)
    {
        //
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
