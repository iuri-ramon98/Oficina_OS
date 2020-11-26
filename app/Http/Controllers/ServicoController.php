<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ServicoRequest;
use App\Servico;


class ServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicos = Servico::all()->sortBy('id');
        //return $servicos->toJson();

        return view('servico.index', ['servicos' => $servicos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('servico.adicionar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServicoRequest $request)
    {
        $servico = new Servico();

        $dados = $request->only(['duracao_dias', 'duracao_time']);
        
        $duracao[0] = $dados['duracao_dias'];
        $duracao[1] = $dados['duracao_time'];
        //print_r($duracao);
        $duracao_formatada = implode(":", $duracao);

        $dados_insert = $request->except(['_token', 'duracao_dias', 'duracao_time']);

        $dados_insert['duracao'] = $duracao_formatada;

        print_r($dados_insert);
                
        $servico->create($dados_insert);

        return redirect()->route('servico.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $servico = Servico::find($id);
        
        if(!empty($servico)){
             return view('servico.show', [
                 'servico' => $servico
             ]);
        }else{
            return redirect()->route('servico.index');
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
        $servico = Servico::find($id);
        
        if(!empty($servico)){
             return view('servico.editar', [
                 'servico' => $servico
             ]);
        }else{
            return redirect()->route('servico.index');
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
        $servico = Servico::find($id);

        $dados = $request->only(['duracao_dias', 'duracao_time']);
        
        $duracao[0] = $dados['duracao_dias'];
        $duracao[1] = $dados['duracao_time'];
        //print_r($duracao);
        $duracao_formatada = implode(":", $duracao);

        $dados_insert = $request->except(['_token', 'duracao_dias', 'duracao_time']);

        $dados_insert['duracao'] = $duracao_formatada;

        print_r($dados_insert);
                
        $servico->update($dados_insert);

        return redirect()->route('servico.index'); 
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
