@extends('layouts.principal')

@section('title', 'Adicionar')

@section('content')


<body onload="somarPreco()">
    @if (!empty($ordem_servico_veiculos_mecanicos))
    <div class="corpoView"> 
    <div>
        <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-dark rounded" style="margin-right: 3px">
                    <div class="lh-100">
                    <h3 class="mb-0 text-white lh-100" style="white-space: nowrap;">Adicionar produtos e serviços</h3>     
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
            <!--tranfsormar em ajax request (só voltar o botão e descomentar o post no script)-->
            <!--<form action="{{ route('ordemServico.updateServicoAjax', ['id' => $id_os]) }}" method="post">-->
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
            <input type="text"  class="form-control form-control-descricao" name="descricao_problema" id="descricao_servico" onblur="habilitarBtnServico()">
            <br>

            <!--<input type="submit" value="Inserir">-->
            <button onclick="inserirServico({{ $id_os }})" class="btn" id="btn_inserir_servico" style="margin-top: 5px; margin-left: 300px; background-color:#55595c; color:white" disabled>Inserir</button>
        </div>
        <div class="col-md-6">
            <h3>Inserir Produto</h3>
            <!--<form action="{{ route('ordemServico.updateProdutoAjax', ['id' => $id_os]) }}" method="post">-->
                
                Produtos: <br>
            <select name="produto_id" id="produto_select" onchange="habilitarBtnProduto()" onblur="habilitarBtnProduto()">
                <option value="0" disabled selected>Selecione um produto</option>
                @foreach ($produtos as $item)
            <option value="{{ $item->id }}" >{{ $item->descricao }}</option>               
            @endforeach    
            </select>
            @if ($errors->has('produto_id'))
                <div class="invalid-feedback">{{ $errors->first('produto_id')}}</div>            
            @endif  
            <br>
            <br>
            Quantidade: <br>
            <input type="number"  class="form-control form-control-date quantidade_input" name="quantidade" id="quantidade" value="1" onclick="habilitarBtnProduto()">
            <br>
            <!--<input type="submit" value="Inserir">-->
            
           <button onclick="inserirProduto({{ $id_os }})" id="btn_inserir_produto" class="btn" style="margin-top: 5px; margin-left: 300px; background-color:#55595c; color:white" disabled>Inserir</button>
            <!--associar o produto e construir a tabela-->
        </div>
    </div>
    <hr>
    <div class="row mb-2">
        <div class="col-md-6">
            <h2>Serviços</h2>
            <table class="table" style="margin-right: 20px; text-align: center" id="tabela_servicos">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Descriçao</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Ação</th>
          
                  </tr>
                </thead>
                <tbody>
                  @foreach ($ordem_servico_veiculos_mecanicos as $os_servicos)
                  @foreach ($os_servicos->servicos as $item)
                  <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->descricao }}</td>
                    <td>{{ $item->preco }}</td>
                    <td><button class="btn btn-danger btn-remover" onclick="removerServico({{ $id_os }}, {{ $item->id }})">Remover</button></td>
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
                    <th scope="col">Ação</th>
          
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
                    <td><button class="btn btn-danger btn-remover" onclick="removerProduto({{ $id_os }}, {{ $item->id }})">Remover</button></td>
                  </tr>
                  @endforeach
                @endforeach
            </tbody>
              </table>
              <br>

        </div>
    </div>
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
    <form action="{{ route('ordemServico.update', ['ordemServico' => $id_os]) }}" method="post">
      @csrf
      @method('PUT')
    <div class="row mb-2">
        <div class="col-md-6">
        Valor Total (R$):
        <input type="text" name="preco" id="preco" readonly>
      </div>
      <div class="col-md-6">
        <input type="submit" value="Salvar" class="btn" style="margin-left: 300px; background-color:#55595c; color:white"/>
      </div>
    </div>
  </form>
@endsection

