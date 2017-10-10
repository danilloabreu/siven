$( document ).ready(function() {

//nome amigavel para variáveis input
var input = {
    idCliente: $('#idClientePedido'),
    nomeCliente: $('#nomeCliente'),
    idPedido: $('#idPedido'),
    DataEntrega: $('#dataEntrega'),
    Observacoes: $('#observacoes'),
    dataEntregaModal: $('#dataEntregaModal'),
    idClienteModal: $('#idClienteModal'),
    nomeCLienteModal: $('#nomeClienteModal')   
    };     
          
//carregar classe datepicker
$( ".inputData" ).datepicker({
    dateFormat: 'dd-mm-yy',
    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
    nextText: 'Próximo',
    prevText: 'Anterior'
});//fim do datepicker

//mascára dinheiro
$( ".dinheiro" ).mask('000.000.000.000.000,00', {reverse: true});

//carregar itens do pedido
$('#menu11').load('listar_itens.php?id_pedido='+input.idPedido.val());

//adicionar pedido
$(document).on('click','#adicionarPedido',function(){
    //$(this).prop('disabled','disabled');
    $.post('inserir_pedido.php',{
        idCliente: $('#idClientePedido').val(),
        dataEntrega: $('#dataEntregaPedido').val(),
        observacao: $('#observacaoPedido').val()
    }, function(data){
        if(data!=0){
            console.log(data);
            input.idPedido.val(data);
            input.dataEntregaModal.val(input.DataEntrega.val());
            $('#adicionarPedido').prop("disabled",true);
            $('.nav nav-tabs').append("<li><a data-toggle='tab' href='#menu12' >Itens</a></li>");    
        }else{
            alert(data);
        }
    });//fim do post
    });//fim da função clique 

//adicionar item
$(document).on('click','#adicionarItem',function(){
    
    $.post('inserir_item.php',{
        idPedido: input.idPedido.val(),
        codigoItem: $('#idProdutoModal').val(),
        qtdItem: $('#qtdItem').val(),
        valorItem: $('#valorItem').val(),
        totalItem: $('#totalItem').val(),
        dataEntregaItem: input.dataEntregaModal.val()
    }, function(data){
      alert(data);
      $('#menu11').load('listar_itens.php?id_pedido='+input.idPedido.val());
    });//fim do post
    });//fim da função clique

//carregar dados do cliente
$(document).on('change','#idClientePedido',function(){
    
    $.post('recuperar_cliente_json.php',{
        id: $('#idClientePedido').val()
    }, function(data){
      //alert(data);
      var clienteJson = JSON.parse(data);
      $('#nomeCliente').val(clienteJson.nome);
    });//fim do post
    });//fim da função change idClientePedido
     
//carregar dados do produto
$(document).on('change','#idProdutoModal',function(){
    
    $.post('recuperar_produto_json.php',{
        id: $('#idProdutoModal').val()
    }, function(data){
      //alert(data);
      var produtoJson = JSON.parse(data);
      $('#nomeProdutoModal').val(produtoJson.nome);
      $('#nomeProdutoModal').val(produtoJson.nome);
    });//fim do post
    });//fim da função change idClientePedido 
    
//total do item 
$(document).on('focus','#totalItem',function(){
    var total = Number($('#qtdItem').val())*Number($('#valorItem').val());
    $('#totalItem').val(total);
    });//fim da função change total do item 


//buscar cliente modal
$(document).on('click','#buscarCliente',function(){
 let idCliente=input.idClienteModal.val()   ;
 let nomeCliente=input.nomeCLienteModal.val();

$('#listaClienteModal').load('listar_clientes_ativos.php?id_cliente='+idCliente+'&nome_cliente='+nomeCliente);

});

//selecionar cliente modal
$(document).on('click','.selecionaCliente',function(){
 
 let id=$(this).attr("data-id");
  $('#idClientePedido').val(id);
  $('#idClientePedido').trigger("change");
 $('#consultarClienteModal').modal('toggle');
 
});


});


