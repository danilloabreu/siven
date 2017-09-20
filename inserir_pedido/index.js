$( document ).ready(function() {
    
    var pedido = 
    
    
    //carregar datepicker
    $( ".inputData" ).datepicker({
    dateFormat: 'dd/mm/yy',
    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
    nextText: 'Próximo',
    prevText: 'Anterior'
});//fim do datepicker

//adicionar pedido
$(document).on('click','#adicionarPedido',function(){
    
    $.post('inserir_pedido.php',{
        idCliente: '1',
        dataInclusao: $('#nomeClientePedido').val(),
        dataEntrega: $('#dataEntregaPedido').val(),
        observacao: $('#observacaoPedido').val()
    }, function(data){
      alert(data);  
    });//fim do post
    });//fim da função clique 

//adicionar item
$(document).on('click','#adicionarItem',function(){
    
    $.post('inserir_item.php',{
        idPedido: '1',
        codigoItem: $('#idProdutoModal').val(),
        qtdItem: $('#qtdItem').val(),
        valorItem: $('#valorItem').val(),
        totalItem: $('#totalItem').val()
    }, function(data){
      alert(data);
      
      $('#menu11').load('listar_itens.php?id_pedido=1');
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
    });//fim do post
    });//fim da função change idClientePedido 
    
//total do item 
$(document).on('focus','#totalItem',function(){
    var total = Number($('#qtdItem').val())*Number($('#valorItem').val());
    $('#totalItem').val(total);
    
   
    });//fim da função change total do item 

//carregar itens do pedido
$('#menu11').load('listar_itens.php?id_pedido=1');



});


