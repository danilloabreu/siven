$( document ).ready(function() {

//carregar itens do pedido
//$('#listaPedidos').load('listar_pedido.php');

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

//botão excluir pedido
$(document).on('click','.excluirPedido',function(){
    var id=$(this).attr("data-id");
    $.post('excluir_pedido.php',{
        
        id: id,
    }, function(data){
    if(data==true){
     alert("Registro apagado com sucesso!");    
     //$('tr[="'+$(this).attr("data-id")+'"]').hide();
     $('tr[linha="'+id+'"]').hide() 
    }


    });//fim do post
    

    
});//fim da função clique

    function preencherCampos (produto){
        
        $('produtoId').val(produto.id);
        
    }

});


