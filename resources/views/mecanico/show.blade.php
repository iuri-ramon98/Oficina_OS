@extends('layouts.principal')

@section('title', 'Mecânico')


@section('content')
<body onload="manterFiltro({{ $filter }})">
      

    <div class="corpoView"> 
            @if (!empty($mecanico))
        <div>
            <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-dark rounded" style="margin-right: 3px">
                        <div class="lh-100">
                        <h2 class="mb-0 text-white lh-100">Mecânico: {{ $mecanico->id }}</h2>     
            </div>
            <button class="btn" style="margin-top: 5px; margin-left: 520px; background-color:#55595c; color:white"><a href="{{ route('mecanico.edit', ['mecanico' => $mecanico->id]) }}" style="color:white">Editar mecânico</a></button>
        </div>
            Nome:<br/>
            <input type="text" class="form-control form-control-name" name="nome" value="{{ $mecanico->nome }}" readonly/>
            <br>    

            Data de nascimento
            <input type="date" class="form-control form-control-date" name="data_nascimento" value="{{ $mecanico->data_nascimento }}" readonly>
            <br>    

            @if (strlen($mecanico->cpf_cnpj)==14)
                CPF:<br/>
                <input type="text" class="form-control form-control-name cpf_input" name="cpf_cnpj" value="{{ $mecanico->cpf_cnpj }}" readonly/>
                <br>    
            @else
                CNPJ:<br/>
                <input type="text" class="form-control form-control-name cpf_input" name="cpf_cnpj" value="{{ $mecanico->cpf_cnpj }}" readonly/>
                <br>          
            @endif
            Telefone:<br>
            <input type="text" class="form-control form-control-name telefone_input" name="telefone" value="{{ $mecanico->telefone }}" readonly>
            <br>
            Celular:<br>
            <input type="text" class="form-control form-control-name celular_input" name="celular" value="{{ $mecanico->celular }}" readonly>
            <br>
            Data de admissão
            <input type="date" class="form-control form-control-date" name="data_admissao" value="{{ $mecanico->data_admissao }}" readonly>
            <br>  
            Salário:<br>
            <input type="text" class="form-control form-control-descricao salario_input" name="salario" value="{{ $mecanico->salario }}" readonly>
            <br>
            Comissão:<br>
            <input type="text" class="form-control form-control-date comissao_input" name="comissao" value="{{ $mecanico->comissao }}" readonly>
            <br>
    @endif


    @if (!empty($ordem_servicos_veiculos))

    


    <div class="card">
      <h5 class="card-header">Filtrar OS do mecânico por:</h5>
      <div class="card-body">
        <form method="GET" action=" {{ route('mecanico.showWithFilter', ['id' => $mecanico->id]) }} ">
            
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
    <a href="{{ route('mecanico.index') }}"><button class="btn" style="margin-top: 5px; margin-left: 700px; background-color:#55595c; color:white">Sair</button></a>
    </div>

</body>
@endsection