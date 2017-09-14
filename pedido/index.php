<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="reset.css">
        <link rel="stylesheet" type="text/css" href="pedido.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="pedido.js"></script>     
        <script>
        
$(document).ready(function(){
    var linhaProduto=2;
    $('.add').on('click', function(){
        $(".pedido").append("<tr><td><input type=\"text\">"+linhaProduto+"</td><td><input type=\"text\"></td><td><input type=\"text\"></td><td><input type=\"text\" disabled></td></tr>"  
        );   
       
     linhaProduto++;      
       
       
   });
});
        
        
        
        
        </script>
        
        <title>Pedido de Venda</title>
    </head>
    
    
    <body>
        <table class="pedido">
            <tr>
                <th>Item</th>
                <th>Quantidade</th>
                <th>Valor Unitário</th>
                <th>Valor total</th>
            </tr>
            <tr class="item">
                <td><input type="text">1</td>
                <td><input type="text"></td>
                <td><input type="text"></td>
                <td><input type="text" disabled></td>
            </tr>
        
        </table>
        <button class="add">Adicionar item</button>
    </body>
</html>
