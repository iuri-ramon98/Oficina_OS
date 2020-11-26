@extends('layouts.principal')

@section('title', 'Editar cliente')

@section('content')


<body>

    <div class="corpoView"> 
    <div>
        <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-dark rounded" style="margin-right: 3px">
                    <div class="lh-100">
                    <h2 class="mb-0 text-white lh-100">Editar cliente</h2>     
        </div>
    </div>

    <form method="POST" action="{{ route('cliente.update', ['cliente' => $cliente->id]) }}">
        @csrf
        @method('PUT')
        Nome:<br/>
        <input type="text" class="form-control form-control-name
                                  {{ $errors->has('nome') ? 'is-invalid' : '' }}"
                           name="nome" 
                           value="{{ $cliente->nome }}"/>
        @if ($errors->has('nome'))
            <div class="invalid-feedback">{{ $errors->first('nome')}}</div>            
        @endif  
        <br>    

        Data de nascimento
        <input type="date" 
               class="form-control form-control-date 
                      {{ $errors->has('data_nascimento') ? 'is-invalid' : '' }}" 
               name="data_nascimento"
               value="{{ $cliente->data_nascimento }}">
        @if ($errors->has('data_nascimento'))
            <div class="invalid-feedback">{{ $errors->first('data_nascimento')}}</div>            
        @endif
        <br>    

        @if (strlen($cliente->cpf_cnpj)==14)
        CPF:<br/>
        <br>    
    @else
        CNPJ:<br/>    
    @endif
    <input type="text" class="form-control form-control-name 
                                {{ $errors->has('cpf_cnpj') ? 'is-invalid' : '' }}" 
                       name="cpf_cnpj" 
                       value="{{ $cliente->cpf_cnpj }}"
/>
        @if ($errors->has('cpf_cnpj'))
            <div class="invalid-feedback cpf_error_div">{{ $errors->first('cpf_cnpj')}}</div>            
        @endif
        <br>    
            
        <br>
        Telefone:<br>
        <input type="text" class="form-control form-control-name telefone_input
                                  {{ $errors->has('telefone') ? 'is-invalid' : '' }}"
                           name="telefone"
                           value="{{ $cliente->telefone }}">
        @if ($errors->has('telefone'))
            <div class="invalid-feedback">{{ $errors->first('telefone')}}</div>            
        @endif
        <br>    
        Celular:<br>
        <input type="text" class="form-control form-control-name celular_input
                                  {{ $errors->has('celular') ? 'is-invalid' : '' }}"
                           name="celular"
                           value="{{ $cliente->celular }}">
        @if ($errors->has('celular'))
            <div class="invalid-feedback">{{ $errors->first('celular')}}</div>            
        @endif
        <br>
        Endereço:<br>
        <input type="text" class="form-control form-control-descricao endereco_input
                                  {{ $errors->has('endereco') ? 'is-invalid' : '' }}"
                           name="endereco"
                           value="{{ $cliente->endereco }}">
        @if ($errors->has('endereco'))
            <div class="invalid-feedback">{{ $errors->first('endereco')}}</div>            
        @endif
        <br>
        Cidade:<br>
        <input type="text" class="form-control form-control-name cidade_input
                                  {{ $errors->has('cidade') ? 'is-invalid' : '' }}"
                           name="cidade"
                           value="{{ $cliente->cidade }}">
        @if ($errors->has('cidade'))
            <div class="invalid-feedback">{{ $errors->first('cidade')}}</div>            
        @endif
        <br>
        @if ($cliente->flag_inadimplente)
            <input type="checkbox" name="flag_inadimplente" id="flag_inadimplente" checked > Cliente inadimplente<br/>
        @else
            <input type="checkbox" name="flag_inadimplente" id="flag_inadimplente" > Cliente inadimplente<br/>
        @endif  


        <input type="submit" value="Salvar" class="btn" style="margin-top: 5px; margin-left: 700px; background-color:#55595c; color:white"/>

    </form>
   </div>
@endsection

