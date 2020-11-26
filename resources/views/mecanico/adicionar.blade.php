@extends('layouts.principal')

@section('title', 'Adicionar mecânico')

@section('content')


<body>

    <div class="corpoView"> 
    <div>
        <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-dark rounded" style="margin-right: 3px">
                    <div class="lh-100">
                    <h2 class="mb-0 text-white lh-100">Adicionar mecânico</h2>     
        </div>
    </div>

    <form method="POST" action="{{ route('mecanico.store') }}">
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
        Data de admissão:
        <input type="date" 
               class="form-control form-control-date 
                      {{ $errors->has('data_admissao') ? 'is-invalid' : '' }}" 
               name="data_admissao">
        @if ($errors->has('data_admissao'))
            <div class="invalid-feedback">{{ $errors->first('data_admissao')}}</div>            
        @endif
        Salário:<br>
        <input type="text" data-decimal="." data-thousands="" class="form-control form-control-descricao salario_input
                                  {{ $errors->has('salario') ? 'is-invalid' : '' }}"
                           name="salario" >
        @if ($errors->has('salario'))
            <div class="invalid-feedback">{{ $errors->first('salario')}}</div>            
        @endif
        <br>
        Comissão:<br>
        <input type="text" class="form-control form-control-name comissao_input
                                  {{ $errors->has('comissao') ? 'is-invalid' : '' }}"
                           name="comissao">
        @if ($errors->has('comissao'))
            <div class="invalid-feedback">{{ $errors->first('comissao')}}</div>            
        @endif
        <br>


        <input type="submit" value="Adicionar" class="btn"  style="margin-top: 5px; margin-left: 700px; background-color:#55595c; color:white"/>

    </form>
   </div>
@endsection

