@extends('layouts.principal')

@section('title', 'Adicionar veiculo')

@section('content')


<body>

    <div class="corpoView"> 
    <div>
        <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-dark rounded" style="margin-right: 3px">
                    <div class="lh-100">
                    <h2 class="mb-0 text-white lh-100">Adicionar veiculo</h2>     
        </div>
    </div>

    <form method="POST" action="{{ route('veiculo.storeWithId', ['id' => $cliente->id]) }}">
        @csrf

        Marca:<br/>
        <input type="text" class="form-control form-control-date
                                  {{ $errors->has('marca') ? 'is-invalid' : '' }}"
                           name="marca" />
        @if ($errors->has('marca'))
            <div class="invalid-feedback">{{ $errors->first('marca')}}</div>            
        @endif  
        <br>    

        Modelo
        <input type="text" 
               class="form-control form-control-date 
                      {{ $errors->has('modelo') ? 'is-invalid' : '' }}" 
               name="modelo">
        @if ($errors->has('modelo'))
            <div class="invalid-feedback">{{ $errors->first('modelo')}}</div>            
        @endif
        <br>    

        Cor:<br>
        <input type="text" class="form-control form-control-date cor_input
                                  {{ $errors->has('cor') ? 'is-invalid' : '' }}"
                           name="cor">
        @if ($errors->has('cor'))
            <div class="invalid-feedback">{{ $errors->first('cor')}}</div>            
        @endif
        <br>

        Placa:<br/>
        <input type="text" class="form-control form-control-date placa_input
                                  {{ $errors->has('placa') ? 'is-invalid' : '' }}" 
                           name="placa"/>
        @if ($errors->has('placa'))
            <div class="invalid-feedback cpf_error_div">{{ $errors->first('placa')}}</div>            
        @endif
        <br>    
        Cidade:<br/>
        <input type="text" class="form-control form-control-date cidade_input
                                  {{ $errors->has('cidade') ? 'is-invalid' : '' }}" 
                           name="cidade"/>
        @if ($errors->has('cidade'))
            <div class="invalid-feedback cnpj_error_div">{{ $errors->first('cidade')}}</div>            
        @endif
            
        <br>
    
        Ano de fabricação:<br>
        <input type="text" class="form-control form-control-date ano_fabricacao_input
                                  {{ $errors->has('ano_fabricacao') ? 'is-invalid' : '' }}"
                           name="ano_fabricacao">
        @if ($errors->has('ano_fabricacao'))
            <div class="invalid-feedback">{{ $errors->first('ano_fabricacao')}}</div>            
        @endif
        <br>
        Ano do modelo:<br>
        <input type="text" class="form-control form-control-date ano_modelo_input
                                  {{ $errors->has('ano_modelo') ? 'is-invalid' : '' }}"
                           name="ano_modelo">
        @if ($errors->has('ano_modelo'))
            <div class="invalid-feedback">{{ $errors->first('ano_modelo')}}</div>            
        @endif
        <br>
        Renavam:<br>
        <input type="text" class="form-control form-control-name renavam_input
                                  {{ $errors->has('renavam') ? 'is-invalid' : '' }}"
                           name="renavam">
        @if ($errors->has('renavam'))
            <div class="invalid-feedback">{{ $errors->first('renavam')}}</div>            
        @endif
        <br>
        Combustível:
        <select name="combustivel" id="combustivel">
            <option value="1">Gasolina</option>
            <option value="2">Etanol</option>
            <option value="3">Flex</option>
            <option value="4">Diesel</option>
        </select>


        <input type="submit" value="Adicionar" class="btn" style="margin-top: 5px; margin-left: 700px; background-color:#55595c; color:white"/>

    </form>
   </div>
@endsection

