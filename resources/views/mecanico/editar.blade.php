@extends('layouts.principal')

@section('title', 'Editar Mecânico')

@section('content')


<body>

    <div class="corpoView"> 
    <div>
        <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-dark rounded" style="margin-right: 3px">
                    <div class="lh-100">
                    <h2 class="mb-0 text-white lh-100">Editar mecânico</h2>     
        </div>
    </div>

    <form method="POST" action="{{ route('mecanico.update', ['mecanico' => $mecanico->id]) }}">
        @csrf
        @method('PUT')
        Nome:<br/>
        <input type="text" class="form-control form-control-name
                                  {{ $errors->has('nome') ? 'is-invalid' : '' }}"
                           name="nome" 
                           value="{{ $mecanico->nome }}"/>
        @if ($errors->has('nome'))
            <div class="invalid-feedback">{{ $errors->first('nome')}}</div>            
        @endif  
        <br>    

        Data de nascimento
        <input type="date" 
               class="form-control form-control-date 
                      {{ $errors->has('data_nascimento') ? 'is-invalid' : '' }}" 
               name="data_nascimento"
               value="{{ $mecanico->data_nascimento }}">
        @if ($errors->has('data_nascimento'))
            <div class="invalid-feedback">{{ $errors->first('data_nascimento')}}</div>            
        @endif
        <br>    

        @if (strlen($mecanico->cpf_cnpj)==14)
        CPF:<br/>
        <br>    
    @else
        CNPJ:<br/>    
    @endif
    <input type="text" class="form-control form-control-name 
                                {{ $errors->has('cpf_cnpj') ? 'is-invalid' : '' }}" 
                       name="cpf_cnpj" 
                       value="{{ $mecanico->cpf_cnpj }}"
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
                           value="{{ $mecanico->telefone }}">
        @if ($errors->has('telefone'))
            <div class="invalid-feedback">{{ $errors->first('telefone')}}</div>            
        @endif
        <br>    
        Celular:<br>
        <input type="text" class="form-control form-control-name celular_input
                                  {{ $errors->has('celular') ? 'is-invalid' : '' }}"
                           name="celular"
                           value="{{ $mecanico->celular }}">
        @if ($errors->has('celular'))
            <div class="invalid-feedback">{{ $errors->first('celular')}}</div>            
        @endif
        <br>
        
        Data de admissão: <br>
        <input type="date" 
               class="form-control form-control-date 
                      {{ $errors->has('data_admissao') ? 'is-invalid' : '' }}" 
               name="data_admissao"
               value="{{ $mecanico->data_admissao }}">
        @if ($errors->has('data_admissao'))
            <div class="invalid-feedback">{{ $errors->first('data_admissao')}}</div>            
        @endif
        <br>   

        Salário:<br>
        <input type="text" class="form-control form-control-descricao salario_input
                                  {{ $errors->has('salario') ? 'is-invalid' : '' }}"
                           name="salario" data-decimal="." data-thousands=""
                           value="{{ $mecanico->salario }}">
        @if ($errors->has('salario'))
            <div class="invalid-feedback">{{ $errors->first('salario')}}</div>            
        @endif
        <br>
        Comissão:<br>
        <input type="text" class="form-control form-control-name comissao_input
                                  {{ $errors->has('comissao') ? 'is-invalid' : '' }}"
                           name="comissao"
                           value="{{ $mecanico->comissao }}">
        @if ($errors->has('comissao'))
            <div class="invalid-feedback">{{ $errors->first('comissao')}}</div>            
        @endif
        <br>


        <input type="submit" value="Salvar" class="btn" style="margin-top: 5px; margin-left: 700px; background-color:#55595c; color:white"/>

    </form>
   </div>
@endsection

