@extends('layouts.principal')

@section('title', 'Produto')


@section('content')
<body>
      

    <div class="corpoView"> 
    @if (!empty($produto))
        <div>
            <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-dark rounded" style="margin-right: 3px">
                        <div class="lh-100">
                        <h3 class="mb-0 text-white lh-100">Produto: {{ $produto->id }}</h3>     
            </div>
            <button class="btn" style="margin-top: 5px; margin-left: 520px; background-color:#55595c; color:white"><a href="{{ route('produto.edit', ['produto' => $produto->id]) }}" style="color:white">Editar produto</a></button>
        </div>
        
        Descrição:<br/>
        <input type="text" class="form-control form-control-date" name="descricao" value="{{ $produto->descricao }}" readonly/>
       
        <br>    

        Custo:
        <input type="text" class="form-control form-control-date" name="custo" value="R$ {{ $produto->custo }}" readonly>
       
        <br>    

        Preço:
        <input type="text" class="form-control form-control-date" name="preco" value="R$ {{ $produto->preco }}" readonly>
       
        <br>    

       

    <a href="{{ route('produto.index') }}"><button class="btn" style="margin-top: 5px; margin-left: 700px; background-color:#55595c; color:white">Sair</button></a>
    </div>
@endif
</body>
@endsection