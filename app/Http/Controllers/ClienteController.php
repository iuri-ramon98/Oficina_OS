<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClienteRequest;
use App\Cliente;
use App\Veiculo;
use App\OrdemServico;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all()->sortBy('id');
        //return $clientes->toJson();

        return view('cliente.index', compact(['clientes']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.adicionar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteRequest $request)
    {
        $cliente = new Cliente();

        $dados = $request->except(['_token']);
        $dados['flag_inadimplente'] = false;
        $cliente->create($dados);

         return redirect()->route('cliente.index');        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showWithFilter($id, Request $request)
    {
       
        $filter = $request->input('filtro');
       
        $cliente = Cliente::find($id);
        if (!empty($cliente)){
            //seleciona os IDs de todos veiculos do cliente recebido
            $veiculos = Veiculo::where('cliente_id', $id)->select('id')->get();
            //converte em Json
            $veiculos = $veiculos->toJson();
            //decodifica o Json para um array associativo
            $veiculos_array = (array) json_decode($veiculos);
            
            //caso tenha algum veiculo
            if (count($veiculos_array) > 0){
                //monta um array apenas com os valores dos IDs dos veiculos
                for ($i=0; $i < count($veiculos_array); $i++) { 
                    $id_veiculos[$i] =  $veiculos_array[$i]->id;
                }
                //caso tenha recebido algum filtro
                if ($filter != ''){

                    //seleciona todos as OS, que possuem  IDs que possuem uma OS do filtro 
                    $ordem_servicos_veiculos = OrdemServico::with('veiculos')->whereIn('veiculo_id', $id_veiculos)->where('status', $filter)->get();  
                    
                }else{
                    $ordem_servicos_veiculos = OrdemServico::with('veiculos')->whereIn('veiculo_id', $id_veiculos)->get();
                }
                //return $ordem_servicos_veiculos->toJson();
                return view('cliente.show', [
                    'cliente' => $cliente,
                    'ordem_servicos_veiculos' => $ordem_servicos_veiculos,
                    'filter' => $filter
                ]);
            } else {
                return view('cliente.show', [
                    'cliente' => $cliente, 
                    'filter' => $filter
                ]);
            }
        }else{
            return redirect()->route('cliente.index');
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
        $cliente = Cliente::find($id);
        
        if(!empty($cliente)){
             return view('cliente.editar', [
                 'cliente' => $cliente
             ]);
        }else{
            return redirect()->route('cliente.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteRequest $request, $id)
    {
        $cliente = Cliente::find($id);
        $dados = $request->all();
        
        if (isset($dados['flag_inadimplente'])){
            $dados['flag_inadimplente'] = 1;

        } else{
            
            $dados['flag_inadimplente'] = 0; 
        }

        //print_r($dados);
        $cliente->update($dados);

        return redirect()->route('cliente.index');   
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
