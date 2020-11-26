<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\VeiculoRequest;
use App\Cliente;
use App\Veiculo;
use App\OrdemServico;

class VeiculoController extends Controller
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

    public function indexWithId($id)
    {
        $cliente = Cliente::find($id);

        if (!empty($cliente)){
            $veiculos = Veiculo::where('cliente_id', $id)->get();
            //return $veiculos->toJson();

            return view('veiculo.index', [
                'veiculos' => $veiculos,
                'cliente' =>$cliente
                ]);
        }else{
            return redirect()->route('cliente.index');
        }
        
     

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function createWithId($id)
    {
        $cliente = Cliente::find($id);

        if (!empty($cliente)){
            return view('veiculo.adicionar',[
                'cliente' => $cliente
            ]);
        }else{
            return redirect()->route('veiculo.indexWithId', ['id' => $id]);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function storeWithId(VeiculoRequest $request, $id)
    {
        $veiculo = new Veiculo();
        
        $dados_veiculo = $request->all();
        $dados_veiculo['cliente_id'] = $id;

        $veiculo->create($dados_veiculo);
        return redirect()->route('veiculo.indexWithId', ['id' => $id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $veiculo = Veiculo::find($id);

        if (!empty($veiculo)){
            return view('veiculo.show', ['veiculo' => $veiculo]);
        } else{
            return redirect()->route('veiculo.indexWithId', ['id' => $veiculo->cliente_id]);
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
        $veiculo = Veiculo::find($id);
        
        if(!empty($veiculo)){
             return view('veiculo.editar', [
                 'veiculo' => $veiculo
             ]);
        }else{
            return redirect()->route('veiculo.index');
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
        $veiculo = Veiculo::find($id);
        $dados = $request->all();
        
        //print_r($dados);
        $veiculo->update($dados);

        return redirect()->route('veiculo.indexWithId', ['id' => $veiculo->cliente_id]);
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
