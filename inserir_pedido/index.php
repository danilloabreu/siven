<?php
$path = $_SERVER['DOCUMENT_ROOT'];
require_once ($path . '/siven/model/Pedido.php');
require_once ($path . '/siven/model/Cliente.php');
require_once ($path . '/siven/model/conexao.php');

header("Cache-Control: no-store, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");


if(isset($_GET['id'])){
$pedido = Pedido::read($conexao, "id=".$_GET['id']);
$pedido=$pedido[0];
$cliente = Cliente::read($conexao, "id=$pedido->id_cliente");
$cliente=$cliente[0];
$alterar=true;


}else{
$pedido= new Pedido($id=null, $id_cliente=null, $data_inclusao=null, $is_canceled=null, $is_deleted=null, $data_entrega=null, $observacao=null);
$cliente = new Cliente($id=null, $nome=null, $telefone=null, $endereco=null);
$alterar=false;

}    
?>

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
<!--Container da Tabulação-->
<div class="container">
    <h1>Pedido de Venda</h1> 
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#listaItens">Cliente</a></li>
        <li><a data-toggle="tab" href="#menu1" >Itens</a></li>
        <!--<li><a data-toggle="tab" href="#menu2">Entrega</a></li>-->
        <!--<li><a data-toggle="tab" href="#menu2">Parcelas</a></li>-->
        <!--<li><a data-toggle="tab" href="#menu2">Observações</a></li>-->
        <!--<li><a href="#">Pedido</a></li>-->
    </ul>
</div>

<!--Container do Formulário-->
<div class="container">
<div class="tab-content"><!--inicio aba cliente --->
  <div id="listaItens" class="tab-pane fade in active col-sm-12">
    <form>
            <div class="grid">
                <div class="row">  
                    <div class="form-group col-sm-4">
                        <label for="idCliente">Id do Cliente</label>
                        <div class="input-group">
                            <input type="text" class="form-control detalhesPedido" id="idClientePedido" value='<?= $pedido->id_cliente?>'>
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#consultarClienteModal" tabindex="-1">
                                    <i class="fa fa-question-circle-o"></i>
                                </button>
                            </div>   
                        </div>
                    </div>
                     
                    <div class="form-group col-sm-8">
                        <label for="nomeCliente">Nome do Cliente</label>
                        <div class="input-group">
                            <input type="text" class="form-control detalhesPedido" id="nomeCliente" readonly="readonly" tabindex="-1" value='<?= $cliente->nome ?>'>
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#adicionarItemModal" tabindex="-1" disabled="disabled">
                                    <i class="fa fa-question-circle-o"></i>
                                </button>
                            </div> 
                        </div>    
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="idPedido">Id do Pedido</label>
                        <div class="input-group">
                            <input type="text" class="form-control detalhesPedido" id="idPedido" readonly="readonly" tabindex="-1" value='<?= $pedido->id?>' >
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#adicionarItemModal" tabindex="-1" disabled="disabled">
                                    <i class="fa fa-question-circle-o"></i>
                                </button>
                            </div>   
                        </div>
                    </div>
                    
                    <div class="form-group col-sm-4 pull-right" >
                        <label for="dataEntregaPedido">Data da Entrega</label>
                        <div class="input-group">
                            <input type="text" class="form-control inputData detalhesPedido" id="dataEntregaPedido" value='<?= $pedido->data_entrega ?>'>
                            <span class="input-group-addon"><a data-toggle="modal" data-target="#adicionarItemModal"><i class="fa fa-question-circle-o" aria-hidden="true"></i></a></span>
                        </div>
                </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12">
                         <label for="observacaoPedido">Observações</label>
                            <textarea class="form-control detalhesPedido" rows="4" id="observacaoPedido" placeholder="Observações do pedido"><?= $pedido->observacao ?></textarea>
                          </div>
                </div>
            </div>
        </form>
    <?php if(!$alterar){ 
    echo "<button type='button' class='btn btn-success' id='adicionarPedido'>Inserir</button>";
    }else{
    echo "<button type='button' class='btn btn-primary' id='alterarPedido'>Alterar</button>";    
    } 
        ?>
            </div><!-- fim aba cliente -->
    
  <div id="menu1" class="tab-pane fade">
    <!--<button type="button" class="btn btn-warning" >Histórico</button>-->
    <!--<button type="button" class="btn btn-default" >Consultar Estoque</button>-->
    <div id="menu11">
    </div>
    <button type="button" id="adicionarItemPedido" class="btn btn-info" data-toggle="modal" data-target="#adicionarItemModal">Adicionar item</button>
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#adicionarItemModal">Confirmar</button>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#adicionarItemModal">Gerar Financeiro</button>
  </div>
  <div id="menu2" class="tab-pane fade">
    <h3>Menu 2</h3>
    <p>Some content in menu 2.</p>
  </div>
</div>    
</div>    
<!--Container dos Botões-->            
<div class="container">        
    
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
                <div class="form-group col-sm-2">
                    <label for="idProdutoModal">Código</label>
                    <div class="input-group">
                        <input type="text" class="form-control modalAdicionarItem" id="idProdutoModal">
                            <div class="input-group-btn ">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#consultarProdutoModal" tabindex="-1">
                                    <i class="fa fa-question-circle-o"></i>
                                </button>
                            </div>   
                    </div>
                </div>  
            <div class="form-group col-sm-6">
                <label for="nomeProdutoModal">Nome</label>
                <input type="text" class="form-control modalAdicionarItem" id="nomeProdutoModal">
            </div>
            <div class="form-group col-sm-4">
                <label for="dataEntregaModal">Data Entrega</label>
                <input type="text" class="form-control inputData modalAdicionarItem" id="dataEntregaModal" value='<?= $pedido->data_entrega ?>'>
            </div>        
        </div>
        <div class="row">
        <div class="form-group col-sm-4">
            <form>
            <label for="qtd">Quantidade</label>
            <input type="number" class="form-control modalAdicionarItem" id="qtdItem" placeholder="">
        </form>
            </div>
        <div class="form-group col-sm-4">
            <label for="valor">Valor</label>
            <input type="text" class="form-control dinheiro modalAdicionarItem" id="valorItem" placeholder="">
        </div>
        <div class="form-group col-sm-4">
            <label for="totalItem">Total</label>
            <input type="text" class="form-control dinheiro modalAdicionarItem" id="totalItem" placeholder="">
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

<!-- Modal - Consultar cliente -->
  <div class="modal fade" id="consultarClienteModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Consultar clientes ativos</h4>
        </div>
        <div class="modal-body">
            <div class="row">
               
                <div class="form-group col-sm-6">
                    <label for="nomeClienteModal">Nome</label>
                    <input type="text" class="form-control" id="nomeClienteModal">
                </div>
                <div class="form-group col-sm-2">
                    <label for="buscarCliente">Pesquisa</label>
                    <button type="button" class="btn btn-success" id="buscarCliente">Pesquisar</button>   
                </div>
            </div>
            
            <div class="row">
                <div id="listaClienteModal">
                    <?php //require 'listar_clientes_ativos.php' ?>
                </div>
            </div>
            
        </div>
        <div class="modal-footer">
          
          <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div>
  
<!-- Modal - Consultar produto -->
  <div class="modal fade" id="consultarProdutoModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Consultar produtos ativos</h4>
        </div>
        <div class="modal-body">
            <div class="row">
               
                <div class="form-group col-sm-6">
                    <label for="nomeProdutoPesquisaModal">Nome</label>
                    <input type="text" class="form-control" id="nomeProdutoPesquisaModal">
                </div>
                <div class="form-group col-sm-2">
                    <label for="buscarProduto">Pesquisa</label>
                    <button type="button" class="btn btn-success" id="buscarProduto">Pesquisar</button>   
                </div>
            </div>
            
            <div class="row">
                <div id="listaProdutoModal">
                    <?php //require 'listar_clientes_ativos.php' ?>
                </div>
            </div>
            
        </div>
        <div class="modal-footer">
          
          <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div><!-- Fim do Modal - Consultar produto -->
   



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="/siven/util/bootstrap/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript" src="/siven/util/jqueryui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="/siven/util/jquery.mask.min.js"></script>
    <script type="text/javascript" src="index.js"></script> 
  </body>
</html>
