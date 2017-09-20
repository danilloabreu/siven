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

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <?php require("../header.php") ?>

<div class="container">
    <h1>Pedido de Venda</h1> 
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#listaItens">Cliente</a></li>
    <li><a data-toggle="tab" href="#menu1">Itens</a></li>
    <li><a data-toggle="tab" href="#menu2">Entrega</a></li>
    <li><a data-toggle="tab" href="#menu2">Parcelas</a></li>
    <li><a data-toggle="tab" href="#menu2">Observações</a></li>
    <li><a href="#">Pedido</a></li>
</ul>
</div>        
<div class="container">
<div class="tab-content">
  <div id="listaItens" class="tab-pane fade in active col-sm-12">
    <form>
            <div class="grid">
                <div class="row">  
                    <div class="form-group col-sm-4">
                        <label for="idCliente">Id do Cliente</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="idClientePedido">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#adicionarItemModal" tabindex="-1">
                                    <i class="fa fa-question-circle-o"></i>
                                </button>
                            </div>   
                        </div>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="nomeCliente">Nome do Cliente</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="nomeCliente" readonly="readonly" value="dandan" tabindex="-1" >
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#adicionarItemModal" tabindex="-1" disabled="disabled">
                                    <i class="fa fa-question-circle-o"></i>
                                </button>
                            </div> 
                        </div>    
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="dataEntregaPedido">Data da Entrega</label>
                        <div class="input-group">
                            <input type="text" class="form-control inputData" id="dataEntregaPedido">
                            <span class="input-group-addon"><a data-toggle="modal" data-target="#adicionarItemModal"><i class="fa fa-question-circle-o" aria-hidden="true"></i></a></span>
                        </div>
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
  <div id="menu1" class="tab-pane fade">
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#adicionarItemModal">Adicionar item</button>
    <button type="button" class="btn btn-warning" >Histórico</button>
    <button type="button" class="btn btn-default" >Consultar Estoque</button>
    <div id="menu11">
    </div>
  </div>
  <div id="menu2" class="tab-pane fade">
    <h3>Menu 2</h3>
    <p>Some content in menu 2.</p>
  </div>
</div>    
</div>    
            
<div class="container">        
        <button type="button" class="btn btn-success" id='adicionarPedido'>Incluir</button>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#adicionarItemModal">Adicionar item</button>
        <button type="button" class="btn btn-warning" >Histórico</button>
        <button type="button" class="btn btn-default" >Consultar Estoque</button>
</div>

  <!-- Modal - Adicionar Item -->
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
            <label for="idProdutoModal">Código</label>
            <input type="text" class="form-control" id="idProdutoModal" placeholder="código">
        </div>
        <div class="form-group col-sm-8">
            <label for="nomeProdutoModal">Nome</label>
            <input type="text" class="form-control" id="nomeProdutoModal" placeholder="nome">
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
            <label for="totalItem">Total</label>
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
