@extends('layouts.principal')

@section('title', 'Veiculo')


@section('content')
<body onload="selectComb({{$veiculo->combustivel}})">
      

    <div class="corpoView"> 
    @if (!empty($veiculo))
        <div>
            <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-dark rounded" style="margin-right: 3px">
                        <div class="lh-100">
                        <h2 class="mb-0 text-white lh-100">Veiculo: {{ $veiculo->id }}</h2>     
            </div>
            <button class="btn" style="margin-top: 5px; margin-left: 520px; background-color:#55595c; color:white"><a href="{{ route('veiculo.edit', ['veiculo' => $veiculo->id]) }}" style="color:white">Editar veiculo</a></button>
        </div>
        
        Marca:<br/>
        <input type="text" class="form-control form-control-date" name="marca" value="{{ $veiculo->marca }}" readonly/>
       
        <br>    

        Modelo
        <input type="text" class="form-control form-control-date" name="modelo" value="{{ $veiculo->modelo }}" readonly>
       
        <br>    

        Cor:<br>
        <input type="text" class="form-control form-control-date cor_input" name="cor" value="{{ $veiculo->cor }}" readonly>
       
        <br>

        Placa:<br/>
        <input type="text" class="form-control form-control-date placa_input" name="placa" value="{{ $veiculo->placa }}" readonly/>
       
        <br>    
        Cidade:<br/>
        <input type="text" class="form-control form-control-date cidade_input" name="cidade" value="{{ $veiculo->cidade }}" readonly/>
       
            
        <br>
    
        Ano de fabricação:<br>
        <input type="text" class="form-control form-control-date ano_fabricacao_input" name="ano_fabricacao" value="{{ $veiculo->ano_fabricacao }}" readonly>
       
        <br>
        Ano do modelo:<br>
        <input type="text" class="form-control form-control-date ano_modelo_input" name="ano_modelo" value="{{ $veiculo->ano_fabricacao }}" readonly>
       
        <br>
        Renavam:<br>
        <input type="text" class="form-control form-control-name renavam_input" name="renavam" value="{{ $veiculo->renavam }}" readonly>
        <br>

        Combustível:<br>
        <input type="text" class="form-control form-control-name renavam_input" name="combustivel" id="combustivel"  readonly>
    @endif



    <a href="{{ route('veiculo.indexWithId', ['id' => $veiculo->cliente_id]) }}"><button class="btn" style="margin-top: 5px; margin-left: 700px; background-color:#55595c; color:white">Sair</button></a>
    </div>

</body>
@endsection