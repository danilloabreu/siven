<?php
$path = $_SERVER['DOCUMENT_ROOT'];
require_once ($path . '/siven/model/Produto.php');
require_once ($path . '/siven/model/Unidade.php');
require_once ($path . '/siven/model/Tipo.php');
require_once ($path . '/siven/model/conexao.php');

if(isset($_GET['id'])){
$produto = Produto::read($conexao, "id=".$_GET['id']);
$produto=$produto[0];
//var_dump($produto);
}else{
$produto= new Produto($id=null, $nome=null, $marca=null, $unidade=null, $tipo=null);    
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
    <h1>Cadastro de Produtos</h1><hr> 
<form>
    <div class="grid">
        <div class="row">  
            <div class="form-group col-sm-4">
                <label for="nomeProduto">Nome do Produto</label>
                <input type="text" class="form-control" id="nomeProduto" value="<?= $produto->nome ?>">
            </div>
            <div class="form-group col-sm-3">
                <label for="marcaProduto">Marca</label>
                <input type="text" class="form-control" id="marcaProduto"value="<?= $produto->marca ?>">
            </div>
            <div class="form-group col-sm-3">
                <label for="unidadeProduto">Unidade</label>
                 <?=Unidade::htmlSelect($conexao,$produto->unidade);?>
            </div>
            <div class="form-group col-sm-2">
                <label for="idProduto">Id</label>
                <input type="text" class="form-control" id="idProduto" value="<?= $produto->id ?>" disabled="true">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-12">
                 <label for="tipoProduto">Tipo</label>
                 <?=Tipo::htmlSelect($conexao,$produto->tipo);?>
             </div>
            
        </div>
        <div class="form-group">
            <button type='button' class="btn btn-success" id='inserirProduto'><?php echo (isset($_GET['id'])) ? "Alterar" : "Salvar"; ?></button>
        </div>
        
        
    </div>
    
    </form>



</div> <!-- /container -->



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="/siven/util/bootstrap/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript" src="index.js"></script> 
  </body>
</html>
