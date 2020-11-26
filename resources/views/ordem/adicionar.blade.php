@extends('layouts.principal')

@section('title', 'Adicionar OS')

@section('content')


<body>

    <div class="corpoView"> 
    <div>
        <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-dark rounded" style="margin-right: 3px">
                    <div class="lh-100">
                    <h2 class="mb-0 text-white lh-100">Adicionar Ordem de serviço</h2>     
        </div>
    </div>
    <div  class="bg-warning" id="message" hidden>O cliente selecionado está inadimplente!!</div> 

    <form method="POST" action="{{ route('ordemServico.store') }}">
        @csrf

        Descrição:<br/>
        <input type="text" class="form-control form-control-descricao
                                  {{ $errors->has('obs') ? 'is-invalid' : '' }}"
                           name="obs" />
        @if ($errors->has('obs'))
            <div class="invalid-feedback">{{ $errors->first('obs')}}</div>            
        @endif  
        <br>    

        Cliente:        
        <select name="cliente_select" id="cliente_select" onchange="inadimplente()">
            <option value="0" disabled selected>Selecione um cliente</option>
            @foreach ($clientes as $item)
        <option value="{{ $item->id }} {{ $item->flag_inadimplente }}" >{{ $item->nome }}</option>               
        @endforeach    
    </select>
    @if ($errors->has('cliente_select'))
        <div class="invalid-feedback">{{ $errors->first('cliente_select')}}</div>            
    @endif  
    
       
        
        Veículos:
        <select name="veiculo_id" id="veiculo_select">
            <option value="0" selected disbled>Selecione um veículo</option>
        </select>
        @if ($errors->has('veiculo_id'))
         <div class="invalid-feedback">{{ $errors->first('veiculo_id')}}</div>            
        @endif  

        Mecânico:
        <select name="mecanico_id" id="mecanico_select" >
            <option value="0" disabled selected>Selecione um mecânico</option>
            @foreach ($mecanicos as $item)
        <option value="{{ $item->id }}" >{{ $item->nome }}</option>               
        @endforeach    
        </select>
        @if ($errors->has('mecanico_id'))
            <div class="invalid-feedback">{{ $errors->first('mecanico_id')}}</div>            
        @endif  
    <hr>

        <input type="submit" value="Adicionar serviços/produtos" class="btn" style="margin-top: 5px; margin-left: 590px; background-color:#55595c; color:white"/>

    </form>
   </div>
@endsection

