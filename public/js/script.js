//funções presentes no cliente.adicionar/editar.blade

//trocar entre campos cpf e cnpj segundo opção da radio
$(".radio").on("click", function () {
   var cpf = $("#cpf_radio").is(":checked");
   var cnpj = $("#cnpj_radio").is(":checked");

 if (cpf) {
     $(".cpf_input").removeAttr('disabled');
     $(".cnpj_input").attr('disabled', 'disabled');
     $(".cnpj_input").val('');
     $(".cnpj_error_div").attr('hidden');
 } else if (cnpj){
    $(".cnpj_input").removeAttr('disabled');
    $(".cpf_input").attr('disabled', 'disabled');
    $(".cpf_input").val('');
    $(".cpf_error_div").attr('hidden');
 }
});


//mascaras para todos os forms
$(document).ready(function () {
    $(".cpf_input").mask('999.999.999-99');
    $(".cnpj_input").mask('99.999.999/9999-99');
    $(".telefone_input").mask('(99) 9999-9999');
    $(".celular_input").mask('(99) 99999-9999');

    $(".placa_input").mask('AAA-9999');
    $(".ano_fabricacao_input").mask('9999');
    $(".ano_modelo_input").mask('9999');
    $(".renavam_input").mask('99999999999');

    $(".salario_input").maskMoney();
    
    $(".preco_input").maskMoney();
    $(".duracao_dias_input").mask('99');
    $(".duracao_time_input").mask('99:99');

    $(".custo_input").maskMoney();

    

    
});

//função q mantem a opção de filtro selecionada ao carregar novamente a pag cliente.show.blade
function manterFiltro(filter = '') {
    switch (filter) {
        case '':
            $("#todas").prop("checked", true);
            break;
        case 1:
            $("#pendentes").prop("checked", true);
            break;
        case 2:
            $("#finalizadas").prop("checked", true);
            break;
        case 3:
            $("#canceladas").prop("checked", true);
    
        default:
            break;
    }
}

//função para mostrar corretamente o combustivel em veiculo.show.blade
function selectComb(combustivel) {
    switch (combustivel) {
        case 1:
            $("#combustivel").val('Gasolina');
            break;
        case 2:
            $("#combustivel").val('Etanol');
            break;
        case 3:
            $("#combustivel").val('Flex');
            break;
        case 4:
            $("#combustivel").val('Diesel');
            break;
    
        default:
            break;
    }
}

//mantem a opção escolhida no select em veiculo.editar.blade
function manterComb(combustivel) {
    switch (combustivel) {
        case 1:
            $("#op1").attr('selected', 'selected');
            break;
        case 2:
            $("#op2").attr('selected', 'selected');
            break;
        case 3:
            $("#op3").attr('selected', 'selected');
            break;
        case 4:
            $("#op4").attr('selected', 'selected');
            break;
    
        default:
            break;
    }
}

function inadimplente() {
    var valores = document.getElementById("cliente_select").value; 
        //mostra caso o cliente esteja inadimplentes
        var separar = valores.split(" ");
    
        
        if (separar[1] == 1) {
            //alert("Cliente inadimplente!!");
            $("#message").removeAttr('hidden');
            
        }else{
            $("#message").attr('hidden', 'hidden');
        }
    
        //requisição ajax para preencher o select de veiculos conforme o cliente
        let id = separar[0];
        $('#veiculo_select').empty();
        $('#veiculo_select').append(`<option value="0" disabled selected>Processando...</option>`);
        $.ajax({
            type: 'GET',
            url: 'preencherVeiculo/' + id,
            success: function (response) {
                var response = JSON.parse(response);
                console.log(response);
                $('#veiculo_select').empty();
                $('#veiculo_select').append(`<option value="0" disabled selected>Selecione um veículo</option>`);
                response.forEach(element => {
                    $('#veiculo_select').append(`<option value="${element['id']}">${element['modelo']}</option>`);
                });
            }
    
        });
    
    


  }

  function preencherPreco() {
    var valores = document.getElementById("produto_select").value;
    var separar = valores.split(" ");

    console.log(separar[1]);
    $('#valor_produto').attr("value", separar[1]);
  }
   

    


