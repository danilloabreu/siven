$( document ).ready(function() {

var itens = new Array();



//carregar itens do pedido
//$('#listaProdutos').load('listar_produtos.php');

//botão editar da tabela
$(document).on('click','.editar',function(){
    
    $.post('recuperar_produto_json.php',{
        idProduto: '1'
    }, function(data){
      var produtoJson = JSON.parse(data);
      console.log(produtoJson.observacao);
      
    });//fim do post
    
    $('#myModal').modal('show'); 
    
});//fim da função clique

//botão inserir do modal
$(document).on('click','#inserirProduto',function(){
    
    $.post('inserir_produto.php',{
        id: $('#idProduto').val(),
        nomeProduto: $('#nomeProduto').val(),
        marcaProduto: $('#marcaProduto').val(),
        unidadeProduto: $('#unidadeProduto').val(),
        tipoProduto:  $('#tipoProduto').val(),
    }, function(data){
      alert(data);
          //carregar itens do pedido
        //$('#nomeProduto').val(''),
        //$('#marcaProduto').val(''),
        //$('#unidadeProduto').val(''),
        //$('#tipoProduto').val('')

    });//fim do post
    

    
});//fim da função clique

    function preencherCampos (produto){
        
        $('produtoId').val(produto.id);
        
    }

});


