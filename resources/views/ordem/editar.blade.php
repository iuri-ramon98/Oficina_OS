@extends('layouts.principal')

@section('title', 'Adionar')

@section('content')


<body>
    @if (!empty($ordem_servico_veiculos_mecanicos))
    <div class="corpoView"> 
    <div>
        <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-dark rounded" style="margin-right: 3px">
                    <div class="lh-100">
                    <h2 class="mb-0 text-white lh-100">Adicionar produtos e serviços</h2>     
        </div>
    </div>
    @foreach ($ordem_servico_veiculos_mecanicos as $item)
        
    
    Descricão:<br/>
    <input type="text" class="form-control form-control-descricao" name="descricao" value="{{ $item->obs }}" readonly/>
    <br>    

    Cliente: <br>
    <input type="text" class="form-control form-control-name" name="cliente_nome" value="{{ $cliente->nome }}" readonly>
    <br>   
    
    Veículo: <br>
    <input type="text" class="form-control form-control-date" name="veiculo_modelo" value="{{ $item->veiculos->modelo }}" readonly>
    <br>   

    Mecânico: <br>
    <input type="text" class="form-control form-control-name" name="mecanico_nome" value="{{ $item->mecanicos->nome }}" readonly>
    <br>   
    @endforeach
    @endif
   </div>
   <hr>
    <div class="row mb-2">
        <div class="col-md-6">
            <h3>Inserir Serviço</h3>
            Serviços: <br>
            <select name="servico_id" id="servico_select" >
                <option value="0" disabled selected>Selecione um serviço</option>
                @foreach ($servicos as $item)
            <option value="{{ $item->id }}" >{{ $item->descricao }}</option>               
            @endforeach    
            </select>
            @if ($errors->has('servico_id'))
                <div class="invalid-feedback">{{ $errors->first('servico_id')}}</div>            
            @endif  
            <br>
            <br>
            Descricão do problema: <br>
            <input type="text"  class="form-control form-control-descricao" name="descricao_servico" id="descricao_servico">
            <br>
            <button class="btn" style="margin-top: 5px; margin-left: 300px; background-color:#55595c; color:white" disabled><a href="{{ route('mecanico.create') }}" style="color:white">Inserir</a></button>
        </div>
        <div class="col-md-6">
            <h3>Inserir Produto</h3>
            Produtos: <br>
            <select name="produto_id" id="produto_select" onchange="preencherPreco()">
                <option value="0" disabled selected>Selecione um produto</option>
                @foreach ($produtos as $item)
            <option value="{{ $item->id }} {{ $item->preco }}" >{{ $item->descricao }}</option>               
            @endforeach    
            </select>
            @if ($errors->has('produto_id'))
                <div class="invalid-feedback">{{ $errors->first('produto_id')}}</div>            
            @endif  
            <br>
            <br>
            Valor (R$): <br>
            <input type="text"  class="form-control form-control-name preco_input" name="valor_produto" id="valor_produto" >
            <br>
            <button class="btn" style="margin-top: 5px; margin-left: 300px; background-color:#55595c; color:white" disabled><a href="{{ route('mecanico.create') }}" style="color:white">Inserir</a></button>
        </div>
    </div>
@endsection

