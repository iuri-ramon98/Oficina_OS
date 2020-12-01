@extends('layouts.principal')

@section('title', 'OS')


@section('content')

    @if (!empty($ordem_servicos_veiculos))
    <div class="corpoView"> 
    <div>
        <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-dark rounded" style="margin-right: 3px">
            <div class="lh-100">
            <h3 class="mb-0 text-white lh-100" style= "white-space: nowrap;">Ordens de serviço</h2>      
        </div>
    <button class="btn" style="margin-top: 5px; margin-left: 400px; background-color:#55595c; color:white; white-space: nowrap;"><a href="{{ route('ordemServico.create') }}" style="color:white">Adicionar nova OS</a></button>
    </div>
        @foreach ($ordem_servicos_veiculos as $item)
            <div class="col-md-12">
                <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary">Código da OS: {{ $item->id }}</strong>
                        <h3 class="mb-0">{{ $item->obs }}</h3><br/>
                            <div class="mb-1 ">Veículo: <p class="card-text mb-auto">{{ $item->veiculos->modelo }}</p></div>
                        @for ($i = 0; $i < count($clientes); $i++)
                            @if (($clientes[$i]->id) == ($item->id))
                                <div class="mb-1 ">Cliente: <p class="card-text mb-auto">{{ $clientes[$i]->nome }}</p></div>
                            @endif
                        @endfor
                            
                            @switch($item->status)
                            @case(1)
                            <div class="mb-1 ">Situação: <p class="card-text mb-auto">Pendente</p></div>
                                @break
                            @case(2)
                            <div class="mb-1 ">Situação: <p class="card-text mb-auto">Finalizada</p></div>
                                @break
                            @case(3)
                            <div class="mb-1 ">Situação: <p class="card-text mb-auto">Cancelada</p></div>
                                @break
                            @default   
                        @endswitch
                            
                        
                        <!--<div class="mb-1 ">DESCRIÇÃO:</div>
                        <p class="card-text mb-auto"><?php echo $item['descricao']; ?></p>-->
                    
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <svg class="bd-placeholder-img" width="200" height="100%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail">
                            <title>Ações</title>
                            <rect width="100%" height="100%" fill="#55595c"/>
                        <a href="{{route('ordemServico.show', ['ordemServico'=>$item->id])}}"><text x="5%" y="30%" fill="#eceeef" dy=".3em">- Consultar/Alterar Situação</text></a>
                        <a href="{{route('ordemServico.edit', ['ordemServico'=>$item->id])}}"><text x="2%" y="60%" fill="#eceeef" dy=".3em">- Adicionar/Remover produtos e serviços</text></a>
                        
                        </svg>
                    </div>
                </div>
            </div>    
        @endforeach
        </div>
    @endif
    
@endsection
    
