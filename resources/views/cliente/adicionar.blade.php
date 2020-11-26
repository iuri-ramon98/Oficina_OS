@extends('layouts.principal')

@section('title', 'Adicionar cliente')

@section('content')


<body>

    <div class="corpoView"> 
    <div>
        <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-dark rounded" style="margin-right: 3px">
                    <div class="lh-100">
                    <h2 class="mb-0 text-white lh-100">Adicionar cliente</h2>     
        </div>
    </div>

    <form method="POST" action="{{ route('cliente.store') }}">
        @csrf

        Nome:<br/>
        <input type="text" class="form-control form-control-name
                                  {{ $errors->has('nome') ? 'is-invalid' : '' }}"
                           name="nome" />
        @if ($errors->has('nome'))
            <div class="invalid-feedback">{{ $errors->first('nome')}}</div>            
        @endif  
        <br>    

        Data de nascimento
        <input type="date" 
               class="form-control form-control-date 
                      {{ $errors->has('data_nascimento') ? 'is-invalid' : '' }}" 
               name="data_nascimento">
        @if ($errors->has('data_nascimento'))
            <div class="invalid-feedback">{{ $errors->first('data_nascimento')}}</div>            
        @endif
        <br>    
        <input type="radio" name="cpf_cnpj" class="radio" value="cpf" id="cpf_radio">  Pessoa Física 
        <input type="radio" name="cpf_cnpj" class="radio" value="cnpj" id="cnpj_radio">  Pessoa Juridica <br><br>  
        CPF:<br/>
        <input type="text" class="form-control form-control-name cpf_input
                                  {{ $errors->has('cpf_cnpj') ? 'is-invalid' : '' }}" 
                           name="cpf_cnpj"  disabled/>
        @if ($errors->has('cpf_cnpj'))
            <div class="invalid-feedback cpf_error_div">{{ $errors->first('cpf_cnpj')}}</div>            
        @endif
        <br>    
        CNPJ:<br/>
        <input type="text" class="form-control form-control-name cnpj_input
                                  {{ $errors->has('cpf_cnpj') ? 'is-invalid' : '' }}" 
                           name="cpf_cnpj" disabled/>
        @if ($errors->has('cpf_cnpj'))
            <div class="invalid-feedback cnpj_error_div">{{ $errors->first('cpf_cnpj')}}</div>            
        @endif
            
        <br>
        Telefone:<br>
        <input type="text" class="form-control form-control-name telefone_input
                                  {{ $errors->has('telefone') ? 'is-invalid' : '' }}"
                           name="telefone">
        @if ($errors->has('telefone'))
            <div class="invalid-feedback">{{ $errors->first('telefone')}}</div>            
        @endif
        <br>    
        Celular:<br>
        <input type="text" class="form-control form-control-name celular_input
                                  {{ $errors->has('celular') ? 'is-invalid' : '' }}"
                           name="celular">
        @if ($errors->has('celular'))
            <div class="invalid-feedback">{{ $errors->first('celular')}}</div>            
        @endif
        <br>
        Endereço:<br>
        <input type="text" class="form-control form-control-descricao endereco_input
                                  {{ $errors->has('endereco') ? 'is-invalid' : '' }}"
                           name="endereco">
        @if ($errors->has('endereco'))
            <div class="invalid-feedback">{{ $errors->first('endereco')}}</div>            
        @endif
        <br>
        Cidade:<br>
        <input type="text" class="form-control form-control-name cidade_input
                                  {{ $errors->has('cidade') ? 'is-invalid' : '' }}"
                           name="cidade">
        @if ($errors->has('cidade'))
            <div class="invalid-feedback">{{ $errors->first('cidade')}}</div>            
        @endif
        <br>


        <input type="submit" value="Adicionar" class="btn" style="margin-top: 5px; margin-left: 700px; background-color:#55595c; color:white"/>

    </form>
   </div>
@endsection

