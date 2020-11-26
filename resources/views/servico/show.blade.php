@extends('layouts.principal')

@section('title', 'Servico')


@section('content')
<body>
      

    <div class="corpoView"> 
    @if (!empty($servico))
        <div>
            <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-dark rounded" style="margin-right: 3px">
                        <div class="lh-100">
                        <h2 class="mb-0 text-white lh-100">Serviço: {{ $servico->id }}</h2>     
            </div>
            <button class="btn" style="margin-top: 5px; margin-left: 520px; background-color:#55595c; color:white"><a href="{{ route('servico.edit', ['servico' => $servico->id]) }}" style="color:white">Editar serviço</a></button>
        </div>
        
        Descrição:<br/>
        <input type="text" class="form-control form-control-date" name="descricao" value="{{ $servico->descricao }}" readonly/>
       
        <br>    

        Preço:
        <input type="text" class="form-control form-control-date" name="preco" value="R$ {{ $servico->preco }}" readonly>
       
        <br>    

        Comissão:<br>
        <input type="text" class="form-control form-control-date comissao_input" name="comissao" value="{{ $servico->comissao }}%" readonly>
       
        <br>

        Duração prevista:<br/>
        <input type="text" class="form-control form-control-date duracao_input" name="duracao" value="{{ $servico->duracao[0] }}{{ $servico->duracao[1] }} dias, {{ $servico->duracao[3]}}{{ $servico->duracao[4]}}{{ $servico->duracao[5]}}{{ $servico->duracao[6]}}{{ $servico->duracao[7]}}h" readonly/> 
       
    @endif



    <a href="{{ route('servico.index') }}"><button class="btn" style="margin-top: 5px; margin-left: 700px; background-color:#55595c; color:white">Sair</button></a>
    </div>

</body>
@endsection