@extends('layouts.principal')

@section('title', 'OS')


@section('content')
<body onload="somarPreco()">
      

    <div class="corpoView"> 
            @if (!empty($ordem_servico_veiculos_mecanicos))
            @foreach ($ordem_servico_veiculos_mecanicos as $item)
            
        <div>
            <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-dark rounded" style="margin-right: 3px">
                  <h4 class="mb-0 text-white lh-100" style= "white-space: nowrap;">Ordem de serviço: {{ $item->id }}</h4>     
      
            <button class="btn" style="margin-top: 5px; margin-left: 320px; background-color:#55595c; color:white"><a href="{{ route('ordemServico.edit', ['ordemServico' => $item->id]) }}" style="color:white">Editar</a></button>
            <button class="btn" style="margin-top: 5px; margin-left: 10px; background-color:#cc0707; color:white"><a href="{{ route('ordemServico.mudarStatus', ['id_os'=> $item->id, 'novo_status' => 3 ]) }}" style="color:white">Cancelar</a></button>
            <button class="btn" style="margin-top: 5px; margin-left: 10px; background-color:#028539; color:white"><a href="{{ route('ordemServico.mudarStatus', ['id_os'=> $item->id, 'novo_status' => 2 ]) }}" style="color:white">Finalizar</a></button>
        </div>

        @switch($item->status)
        @case(1)
        Situação: <br>
        <input type="text" class="form-control form-control-date" name="situacao" value="Pendente" readonly>
            @break
        @case(2)
        Situação: <br>
        <input type="text" class="form-control form-control-date" name="situacao" value="Finalizada" readonly>
            @break
        @case(3)
        Situação: <br>
        <input type="text" class="form-control form-control-date" name="situacao" value="Cancelada" readonly>
            @break
        @default   
    @endswitch
    <br>

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
    <hr>
        @endforeach

        <div class="row mb-2">
          <div class="col-md-6">
              <h2>Serviços</h2>
              <table class="table" style="margin-right: 20px; text-align: center" id="tabela_servicos">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Descriçao</th>
                      <th scope="col">Preço</th>
                      
            
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($ordem_servico_veiculos_mecanicos as $os_servicos)
                    @foreach ($os_servicos->servicos as $item)
                    <tr>
                      <td>{{ $item->id }}</td>
                      <td>{{ $item->descricao }}</td>
                      <td>{{ $item->preco }}</td>
                      
                    </tr>
                    @endforeach
                  @endforeach
              </tbody>
                </table>
                <br>
  
          </div>
          <div class="col-md-6">
              <h2>Produtos</h2>
              <table class="table" style="margin-right: 30px; text-align: center" id="tabela_produtos">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Descriçao</th>
                      <th scope="col">Quantidade</th>
                      <th scope="col">Preço</th>
                      
            
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($ordem_servico_veiculos_mecanicos as $os_produtos)
                    @foreach ($os_produtos->produtos as $item)
                    <tr>
                      <td>{{ $item->id }}</td>
                      <td>{{ $item->descricao }}</td>
                      @for ($i = 0; $i < count($os_produtos_array); $i++)
                          @if (($os_produtos_array[$i]->produto_id) == ($item->id))
                          <td>{{ $os_produtos_array[$i]->quantidade }}</td>
                          @endif
                      @endfor
                      <td>{{ $item->preco }}</td>
                    </tr>
                    @endforeach
                  @endforeach
              </tbody>
                </table>
          </div>
        </div>
        <hr>
                <div class="row mb-2">
                  <div class="col-md-6">
                    Valor dos Serviços (R$):
                    <input type="text" name="preco_servico" id="preco_servico" readonly>
                  </div>
                  <div class="col-md-6">
                    Valor dos Produtos (R$):
                    <input type="text" name="preco_produto" id="preco_produto" readonly>
                  </div>
                </div>
                <hr>
                <div class="row mb-2">
                    <div class="col-md-6">
                    Valor Total (R$):
                    <input type="text" name="preco" id="preco" readonly>
                  </div>
                  <div class="col-md-6">
                  <a href="{{route('ordemServico.index')}}"><button class="btn" style="margin-left: 300px; background-color:#55595c; color:white">Voltar</button></a>
                  </div>
                </div>
        @endif
</body>
@endsection