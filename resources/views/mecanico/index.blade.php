@extends('layouts.principal')

@section('title', 'Mecânicos')


@section('content')

    @if (!empty($mecanicos))
    <div class="corpoView"> 
    <div>
        <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-dark rounded" style="margin-right: 3px">
            <div class="lh-100">
            <h2 class="mb-0 text-white lh-100">Mecânicos</h2>      
        </div>
    <button class="btn" style="margin-top: 5px; margin-left: 485px; background-color:#55595c; color:white"><a href="{{ route('mecanico.create') }}" style="color:white">Adicionar novo mecânico</a></button>
    </div>
        @foreach ($mecanicos as $item)
            <div class="col-md-12">
                <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary">Código do mecânico: {{ $item->id }}</strong>
                        <h3 class="mb-0">{{ $item->nome }}</h3><br/>

                            <div class="mb-1 ">Telefone: <p class="card-text mb-auto">{{ $item->telefone }}</p></div>
                            <div class="mb-1 ">Celular: <p class="card-text mb-auto">{{ $item->celular }}</p></div>
                        
                        <!--<div class="mb-1 ">DESCRIÇÃO:</div>
                        <p class="card-text mb-auto"><?php echo $item['descricao']; ?></p>-->
                    
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <svg class="bd-placeholder-img" width="200" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
                            <title>Ações</title>
                            <rect width="100%" height="100%" fill="#55595c"/>
                        <a href="{{ route('mecanico.showWithFilter', ['id' => $item->id]) }}"><text x="20%" y="25%" fill="#eceeef" dy=".3em">- Consultar mecânico</text></a>
                        <a href="{{ route('mecanico.edit', ['mecanico' => $item->id]) }}"><text x="20%" y="75%" fill="#eceeef" dy=".3em">- Editar mecânico</text></a>
                        </svg>
                    </div>
                </div>
            </div>    
        @endforeach
        </div>
    @endif
    
@endsection
    
