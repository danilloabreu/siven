<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Siven - São José Bebidas</title>

    <!-- Bootstrap core CSS -->
    <link href="/siven/util/bootstrap.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Jquery Ui -->
    <link href="/siven/util/jqueryui/jquery-ui.min.css" rel="stylesheet">
    <link href="/siven/util/jqueryui/jquery-ui.structure.min.css" rel="stylesheet">
    <link href="/siven/util/jqueryui/jquery-ui.theme.min.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <?php require("../header.php") ?>

<div class="container">
    <h1>Pedidos</h1><hr> 
         <form>
            <div class="grid">
                <div class="row">  
                    <div class="form-group col-sm-8">
                        <label for="nomeClientePedido">Nome do Cliente</label>
                        <input type="text" class="form-control" id="nomeClientePedido" placeholder="Nome do Cliente">
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="dataEntregaPedido">Data da Entrega</label>
                        <input type="text" class="form-control" id="dataEntregaPedido" placeholder="">
                    </div>

                </div>
                <div class="row">
                    <div class="form-group col-sm-12">
                         <label for="observacaoPedido">Observações</label>
                         <textarea class="form-control" rows="4" id="observacaoPedido" placeholder="Observações do pedido"></textarea>
                    </div>
                </div>
            </div>
        </form>
</div>
<div class="container">        
        <button type="button" class="btn btn-success" id='adicionarPedido'>Incluir</button>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#adicionarItemModal">Adicionar item</button>
        <button type="button" class="btn btn-warning" >Histórico</button>
        <button type="button" class="btn btn-default" >Consultar Estoque</button>
</div>
<div class="container">      
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#listaItens">Itens</a></li>
    <li><a data-toggle="tab" href="#menu1">Financeiro</a></li>
    <li><a data-toggle="tab" href="#menu2">Histórico do Cliente</a></li>
</ul>
</div>        
<div class="container">
<div class="tab-content">
  <div id="listaItens" class="tab-pane fade in active col-sm-12">
      
  </div>
  <div id="menu1" class="tab-pane fade">
    <h3>Menu 1</h3>
    <p>Some content in menu 1.</p>
  </div>
  <div id="menu2" class="tab-pane fade">
    <h3>Menu 2</h3>
    <p>Some content in menu 2.</p>
  </div>
</div>    
</div>    
      
  <!-- Modal -->
  <div class="modal fade" id="adicionarItemModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Adicionar item</h4>
        </div>
        <div class="modal-body">
            <div class="row">
        <div class="form-group col-sm-4">
            <label for="codigo">Código</label>
            <input type="text" class="form-control" id="codigoItem" placeholder="código">
        </div>
        <div class="form-group col-sm-8">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nomeItem" placeholder="nome">
        </div>
        </div>
        <div class="row">
        <div class="form-group col-sm-4">
            <label for="qtd">Quantidade</label>
            <input type="number" class="form-control" id="qtdItem" placeholder="">
        </div>
        <div class="form-group col-sm-4">
            <label for="valor">Valor</label>
            <input type="number" class="form-control" id="valorItem" placeholder="">
        </div>
        <div class="form-group col-sm-4">
            <label for="total">Total</label>
            <input type="number" class="form-control" id="totalItem" placeholder="">
        </div>        
            </div>
                
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" id="adicionarItem">Adicionar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>
   


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="/siven/util/bootstrap/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript" src="/siven/util/jqueryui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="index.js"></script> 
  </body>
</html>
