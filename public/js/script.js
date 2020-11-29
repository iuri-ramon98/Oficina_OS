$.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

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

  /*function preencherPreco() {
    var valores = document.getElementById("produto_select").value;
    var separar = valores.split(" ");
    $('#valor_produto').val(separar[1]);
    //$('#valor_produto').attr("value", separar[1]);
    //console.log(separar[1]);
    
  }*/
   
//função para habilitar o botão inserir no form ordem.editar
function habilitarBtnServico() {
    var valor_descricao = document.getElementById("descricao_servico").value;
    //console.log(valor_descricao);
    if (valor_descricao.length > 0) {
        $("#btn_inserir_servico").removeAttr('disabled');
    }else{
        $("#btn_inserir_servico").attr('disabled', 'disabled');
    }
}


function habilitarBtnProduto() {
    var valor_input_produto = document.getElementById("quantidade").value;
    
    if (valor_input_produto > 0) {
        $("#btn_inserir_produto").removeAttr('disabled');
    }else{
        $("#btn_inserir_produto").attr('disabled', 'disabled');
    }
}


function inserirServico(id) { 
    
     dados = {
        servico_id: $("#servico_select").val(),
        descricao_problema: $("#descricao_servico").val()
    };


    $.ajax({
        url: '/ordemServico/updateServicoAjax/' + id,
        data: dados,
        dataType: "json",
        type: 'POST',
        success: function (response){
            
            console.log(response);
            if((response.length) == 0){
                alert("Serviço já adicionado");
            }
            else{
                
                console.log("adicionado");
                $("#tabela_servicos>tbody").append(`
                <tr>
                    <td>${response['id']}</td>
                    <td>${response['descricao']}</td>
                    <td>${response['preco']}</td>
                    <td><button class="btn btn-danger btn-remover" onclick="removerServico(${id}, ${dados['servico_id']})">Remover</button></td>
                </tr>
                `);
            }
                document.getElementById("servico_select").value = 0;
                document.getElementById("descricao_servico").value = "";
                $("#btn_inserir_servico").attr('disabled', 'disabled');
                somarPreco();
               
        }
        
    });
    
}


function inserirProduto(id) { 
    
    dados = {
       produto_id: $("#produto_select").val(),
       quantidade: $("#quantidade").val()
   };


   $.ajax({
       url: '/ordemServico/updateProdutoAjax/' + id,
       data: dados,
       dataType: "json",
       type: 'POST',
       success: function (response){
           
           console.log(response);
           if((response.length) == 0){
               alert("Produto já adicionado");
           }
           else{
               
               console.log("adicionado");
               $("#tabela_produtos>tbody").append(`
               <tr>
                   <td>${response['id']}</td>
                   <td>${response['descricao']}</td>
                   <td>${dados['quantidade']}</td>
                   <td>${response['preco']}</td>
                   <td><button class="btn btn-danger btn-remover" onclick="removerProduto(${id}, ${dados['produto_id']})">Remover</button></td>
               </tr>
               `);
           }
               document.getElementById("produto_select").value = 0;
               document.getElementById("quantidade").value = "1";
               $("#btn_inserir_produto").attr('disabled', 'disabled');
               somarPreco();
              
       }
       
   });
   
}

function removerServico(id_os, id_servico) {
    $.ajax({
        url: '/ordemServico/removerServicoAjax/' + id_os +'/' + id_servico,
        type: 'POST',
        success: function (response){
            
            console.log(response);

                
                console.log("removido");
                linhas = $("#tabela_servicos>tbody>tr");
                e = linhas.filter(function (i, elemento) {
                    return elemento.cells[0].textContent == id_servico;
                });
                if(e){
                    e.remove();
                }else {
                    alert("Item não adicionado");
                }
                


                somarPreco();
               
        }
        
    });
}


function removerProduto(id_os, id_produto) {
    $.ajax({
        url: '/ordemServico/removerProdutoAjax/' + id_os +'/' + id_produto,
        type: 'POST',
        success: function (response){
            
            console.log(response);

                
                console.log("removido");
                linhas = $("#tabela_produtos>tbody>tr");
                e = linhas.filter(function (i, elemento) {
                    return elemento.cells[0].textContent == id_produto;
                });
                if(e){
                    e.remove();
                }else {
                    alert("Item não adicionado");
                }
                


                somarPreco();
               
        }
        
    });
}




function somarPreco() {
    var precoTotal = 0;
    var precoServico = 0;
    var precoProduto = 0;
    
    $('#tabela_servicos>tbody tr').each(function() {
        
        precoServico += parseFloat($(this).find("td").eq(2).html());  
        //console.log(parseFloat($(this).find("td").eq(2).html()));
        
    });
    document.getElementById("preco_servico").value = precoServico;

    $('#tabela_produtos>tbody tr').each(function() {
        
        precoProduto += (parseFloat($(this).find("td").eq(3).html()))*parseFloat($(this).find("td").eq(2).html());  
        //console.log(parseFloat($(this).find("td").eq(2).html()));
        
    });
    document.getElementById("preco_produto").value = precoProduto;

    document.getElementById("preco").value = precoProduto + precoServico;
}


