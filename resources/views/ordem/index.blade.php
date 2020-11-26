@extends('layouts.principal')

@section('title', 'Clientes')


@section('content')

    @if (!empty($clientes))
    <div class="corpoView"> 
    <div>
        <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-dark rounded" style="margin-right: 3px">
            <div class="lh-100">
            <h2 class="mb-0 text-white lh-100">Clientes</h2>      
        </div>
    <button class="btn" style="margin-top: 5px; margin-left: 485px; background-color:#55595c; color:white"><a href="{{ route('cliente.create') }}" style="color:white">Adicionar novo cliente</a></button>
    </div>
        @foreach ($clientes as $item)
            <div class="col-md-12">
                <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary">Código do cliente: {{ $item->id }}</strong>
                        <h3 class="mb-0">{{ $item->nome }}</h3><br/>
                        @if ($item->flag_inadimplente)
                            <div class="card  text-white bg-danger">
                                <div class="card-body">
                                Este cliente está inadimplente! Entre em editar para mudar a situação
                                </div>
                            </div><br/>
                        @endif    
                            <div class="mb-1 ">Telefone: <p class="card-text mb-auto">{{ $item->telefone }}</p></div>
                            <div class="mb-1 ">Celular: <p class="card-text mb-auto">{{ $item->celular }}</p></div>
                        
                        <!--<div class="mb-1 ">DESCRIÇÃO:</div>
                        <p class="card-text mb-auto"><?php echo $item['descricao']; ?></p>-->
                    
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <svg class="bd-placeholder-img" width="200" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
                            <title>Ações</title>
                            <rect width="100%" height="100%" fill="#55595c"/>
                        <a href="{{ route('cliente.showWithFilter', ['id' => $item->id]) }}"><text x="20%" y="25%" fill="#eceeef" dy=".3em">- Consultar cliente</text></a>
                        <a href="{{ route('veiculo.indexWithId', ['id' => $item->id]) }}"><text x="20%" y="50%" fill="#eceeef" dy=".3em">- Consultar veiculos</text></a>
                        <a href="{{ route('cliente.edit', ['cliente' => $item->id]) }}"><text x="20%" y="75%" fill="#eceeef" dy=".3em">- Editar cliente</text></a>
                        </svg>
                    </div>
                </div>
            </div>    
        @endforeach
        </div>
    @endif
    
@endsection
    
