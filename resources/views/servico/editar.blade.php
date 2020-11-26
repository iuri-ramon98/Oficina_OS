@extends('layouts.principal')

@section('title', 'Editar Serviço')

@section('content')


<body>

    <div class="corpoView"> 
    <div>
        <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-dark rounded" style="margin-right: 3px">
                    <div class="lh-100">
                    <h2 class="mb-0 text-white lh-100">Editar serviço</h2>     
        </div>
    </div>

    <form method="POST" action="{{ route('servico.update', ['servico' => $servico->id]) }}">
        @csrf
        @method('PUT')
        Descricão:<br/>
        <input type="text" class="form-control form-control-descricao
                                  {{ $errors->has('descricao') ? 'is-invalid' : '' }}"
        name="descricao" value="{{ $servico->descricao }}"/>
        @if ($errors->has('descricao'))
            <div class="invalid-feedback">{{ $errors->first('descricao')}}</div>            
        @endif  
        <br>    


        Preço (R$):<br>
        <input type="text" data-decimal="." data-thousands="" class="form-control form-control-date preco_input
                                  {{ $errors->has('preco') ? 'is-invalid' : '' }}"
                           name="preco" value="{{ $servico->preco }}">
        @if ($errors->has('preco'))
            <div class="invalid-feedback">{{ $errors->first('preco')}}</div>            
        @endif
        <br>
        Comissão:<br>
        <input type="text" class="form-control form-control-date comissao_input
                                  {{ $errors->has('comissao') ? 'is-invalid' : '' }}"
                           name="comissao" value="{{ $servico->comissao }}">
        @if ($errors->has('comissao'))
            <div class="invalid-feedback">{{ $errors->first('comissao')}}</div>            
        @endif
        <br>
        Duração:<br>
        Dias: <br>
        <input type="text" class="form-control form-control-date duracao_dias_input
                                  {{ $errors->has('duracao_dias') ? 'is-invalid' : '' }}"
                           name="duracao_dias" value="00" value="{{ $servico->duracao[0] }}{{ $servico->duracao[1] }}">
        @if ($errors->has('duracao_dias'))
            <div class="invalid-feedback">{{ $errors->first('duracao_dias')}}</div>            
        @endif
        <br>
        Horas: <br>
        <input type="text" class="form-control form-control-name duracao_time_input
                                    {{ $errors->has('duracao_time') ? 'is-invalid' : '' }}"
                           name="duracao_time" value="{{ $servico->duracao[3]}}{{ $servico->duracao[4]}}{{ $servico->duracao[5]}}{{ $servico->duracao[6]}}{{ $servico->duracao[7]}}">
    @if ($errors->has('duracao_time'))
        <div class="invalid-feedback">{{ $errors->first('duracao_time')}}</div>            
    @endif
        <br>


        <input type="submit" value="Salvar" class="btn" style="margin-top: 5px; margin-left: 700px; background-color:#55595c; color:white"/>

    </form>
   </div>
@endsection

