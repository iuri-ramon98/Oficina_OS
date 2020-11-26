@extends('layouts.principal')

@section('title', 'Adicionar produto')

@section('content')


<body>

    <div class="corpoView"> 
    <div>
        <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-dark rounded" style="margin-right: 3px">
                    <div class="lh-100">
                    <h2 class="mb-0 text-white lh-100">Adicionar produto</h2>     
        </div>
    </div>

    <form method="POST" action="{{ route('produto.store') }}">
        @csrf

        Descricão:<br/>
        <input type="text" class="form-control form-control-descricao
                                  {{ $errors->has('descricao') ? 'is-invalid' : '' }}"
                           name="descricao" />
        @if ($errors->has('descricao'))
            <div class="invalid-feedback">{{ $errors->first('descricao')}}</div>            
        @endif  
        <br>    
        Custo (R$):<br>
        <input type="text" data-decimal="." data-thousands="" class="form-control form-control-date custo_input
                                  {{ $errors->has('custo') ? 'is-invalid' : '' }}"
                           name="custo" >
        @if ($errors->has('custo'))
            <div class="invalid-feedback">{{ $errors->first('custo')}}</div>            
        @endif
        <br>

        Preço (R$):<br>
        <input type="text" data-decimal="." data-thousands="" class="form-control form-control-date preco_input
                                  {{ $errors->has('preco') ? 'is-invalid' : '' }}"
                           name="preco" >
        @if ($errors->has('preco'))
            <div class="invalid-feedback">{{ $errors->first('preco')}}</div>            
        @endif
        <br>
        

        <input type="submit" value="Adicionar" class="btn"  style="margin-top: 5px; margin-left: 700px; background-color:#55595c; color:white"/>

    </form>
   </div>
@endsection

