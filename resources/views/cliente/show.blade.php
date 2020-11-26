@extends('layouts.principal')

@section('title', 'Cliente')


@section('content')
<body onload="manterFiltro({{ $filter }})">
      

    <div class="corpoView"> 
            @if (!empty($cliente))
        <div>
            <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-dark rounded" style="margin-right: 3px">
                        <div class="lh-100">
                        <h2 class="mb-0 text-white lh-100">Cliente: {{ $cliente->id }}</h2>     
            </div>
            <button class="btn" style="margin-top: 5px; margin-left: 520px; background-color:#55595c; color:white"><a href="{{ route('cliente.edit', ['cliente' => $cliente->id]) }}" style="color:white">Editar cliente</a></button>
        </div>
        @if ($cliente->flag_inadimplente)
        <div class="card  text-white bg-danger">
            <div class="card-body">
            Este cliente está inadimplente! Entre em editar para mudar a situação
            </div>
        </div><br/>
        @endif  

            Nome:<br/>
            <input type="text" class="form-control form-control-name" name="nome" value="{{ $cliente->nome }}" readonly/>
            <br>    

            Data de nascimento
            <input type="date" class="form-control form-control-date" name="data_nascimento" value="{{ $cliente->data_nascimento }}" readonly>
            <br>    

            @if (strlen($cliente->cpf_cnpj)==14)
                CPF:<br/>
                <input type="text" class="form-control form-control-name cpf_input" name="cpf_cnpj" value="{{ $cliente->cpf_cnpj }}" readonly/>
                <br>    
            @else
                CNPJ:<br/>
                <input type="text" class="form-control form-control-name cpf_input" name="cpf_cnpj" value="{{ $cliente->cpf_cnpj }}" readonly/>
                <br>          
            @endif
            Telefone:<br>
            <input type="text" class="form-control form-control-name telefone_input" name="telefone" value="{{ $cliente->telefone }}" readonly>
            <br>
            Celular:<br>
            <input type="text" class="form-control form-control-name celular_input" name="celular" value="{{ $cliente->celular }}" readonly>
            <br>
            Endereço:<br>
            <input type="text" class="form-control form-control-descricao endereco_input" name="endereco" value="{{ $cliente->endereco }}" readonly>
            <br>
            Cidade:<br>
            <input type="text" class="form-control form-control-date cidade_input" name="cidade" value="{{ $cliente->cidade }}" readonly>
            <br>
    @endif


    @if (!empty($ordem_servicos_veiculos))

    


    <div class="card">
      <h5 class="card-header">Filtrar OS do cliente por:</h5>
      <div class="card-body">
        <form method="GET" action=" {{ route('cliente.showWithFilter', ['id' => $cliente->id]) }} ">
            
          <input type="radio" name="filtro" class="radio" value="" id="todas" style="margin-top: 5px; margin-left: 20px;">  Mostrar todas 
          <input type="radio" name="filtro" class="radio" value="1" id="pendentes" style="margin-top: 5px; margin-left: 80px;">  Pendentes 
          <input type="radio" name="filtro" class="radio" value="2" id="finalizadas" style="margin-top: 5px; margin-left: 80px;">  Finalizadas 
          <input type="radio" name="filtro" class="radio" value="3" id="canceladas" style="margin-top: 5px; margin-left: 80px;">  Canceladas 
          <input type="submit" class="btn btn-secondary" style="margin-top: 5px; margin-left: 40px;" value="Filtrar">
          
        </form>
      </div>
    </div><br>

    

    
    <table class="table" style="margin-right: 20px;">
      <thead class="thead-dark">
        <tr>
          <th scope="col">ID OS</th>
          <th scope="col">Descricao</th>
          <th scope="col">Veículo</th>
          <th scope="col">Status</th>
          <th scope="col-sm-auto">Iniciada em:</th>

        </tr>
      </thead>
      <tbody>
        @foreach ($ordem_servicos_veiculos as $item)
            <tr>
              <td>{{ $item->id }}</td>
              <td>{{ $item->obs }}</td>
              <td>{{ $item->veiculos->modelo }}</td>
              @switch($item->status)
                  @case(1)
                  <td>Pendente</td>
                      @break
                  @case(2)
                  <td>Finalizada</td>
                      @break
                  @case(3)
                  <td>Cancelada</td>
                      @break
                  @default   
              @endswitch
              <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$item->inicio)->format('d/m/Y  H:i') }}h</td>     
            </tr>
          </tbody>
      @endforeach
    </table>
    @endif
    <a href="{{ route('cliente.index') }}"><button class="btn" style="margin-top: 5px; margin-left: 700px; background-color:#55595c; color:white">Sair</button></a>
    </div>

</body>
@endsection