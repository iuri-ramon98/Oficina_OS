<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MecanicoRequest;
use App\Mecanico;
use App\OrdemServico;

class MecanicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mecanicos = Mecanico::all()->sortBy('id');
        //return $mecanicos->toJson();

        return view('mecanico.index', compact(['mecanicos']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mecanico.adicionar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MecanicoRequest $request)
    {
        $mecanico = new Mecanico();

        $dados = $request->except(['_token']);
        $mecanico->create($dados);

         return redirect()->route('mecanico.index');   
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


    public function showWithFilter($id, Request $request){
        $filter = $request->input('filtro');
       
        $mecanico = Mecanico::find($id);
        if (!empty($mecanico)){
            //seleciona os IDs de todas as OS do mecanico recebido
            $ordem_servicos = OrdemServico::where('mecanico_id', $id)->select('id')->get();
            //converte em Json
            $ordem_servicos = $ordem_servicos->toJson();
            //decodifica o Json para um array associativo
            $ordem_servicos_array = (array) json_decode($ordem_servicos);
            
            //caso tenha alguma OS
            if (count($ordem_servicos_array) > 0){
                //monta um array apenas com os valores dos IDs das OS
                for ($i=0; $i < count($ordem_servicos_array); $i++) { 
                    $id_ordem_servicos[$i] =  $ordem_servicos_array[$i]->id;
                }
                //caso tenha recebido algum filtro
                if ($filter != ''){

                    //seleciona todos as OS, que possuem  IDs que possuem uma OS do filtro 
                    $ordem_servicos_veiculos = OrdemServico::with('veiculos')->where('mecanico_id', $id)->where('status', $filter)->get();  
                    
                }else{
                    $ordem_servicos_veiculos = OrdemServico::with('veiculos')->where('mecanico_id', $id)->get();
                }
                //return $ordem_servicos_veiculos->toJson();
                return view('mecanico.show', [
                    'mecanico' => $mecanico,
                    'ordem_servicos_veiculos' => $ordem_servicos_veiculos,
                    'filter' => $filter
                ]);
            } else {
                return view('mecanico.show', [
                    'mecanico' => $mecanico, 
                    'filter' => $filter
                ]);
            }
        }else{
            return redirect()->route('mecanico.index');
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
        $mecanico = Mecanico::find($id);
        
        if(!empty($mecanico)){
             return view('mecanico.editar', [
                 'mecanico' => $mecanico
             ]);
        }else{
            return redirect()->route('mecanico.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MecanicoRequest $request, $id)
    {
        $mecanico = Mecanico::find($id);
        $dados = $request->all();
        
        //print_r($dados);
        $mecanico->update($dados);

        return redirect()->route('mecanico.index');   
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
