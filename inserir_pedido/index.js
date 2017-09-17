$( document ).ready(function() {
    //carregar datepicker
    $( "#inputDataEntrega" ).datepicker({
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
    
    $.post('inserir_pedido.php',{
        idCliente: '1',
        codigoItem: $('#codigoItem').val(),
        nomeItem: $('#nomeItem').val(),
        qtdItem: $('#qtdItem').val(),
        valorItem: $('#valorItem').val(),
        totalItem: $('#totalItem').val()
    }, function(data){
      alert(data);  
    });//fim do post
    });//fim da função clique

//carregar itens do pedido
$('#listaItens').load('listar_itens.php');



});


