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
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Novo</button>        
</div> <!-- /container -->

<div class="container" id='listaProdutos'>
     
    
</div> <!-- /container -->

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" >&times;</button>
          <h4 class="modal-title">Cadastro de Produto</h4>
        </div>
        <div class="modal-body">
         <form>
    <div class="grid">
        <div class="row">  
            <div class="form-group col-sm-4">
                <label for="exampleInputEmail1">Nome do Cliente</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Nome do Cliente">
            </div>
            <div class="form-group col-sm-2">
                <label for="exampleInputPassword1">Telefone</label>
                <input type="number" class="form-control" id="exampleInputPassword1" placeholder="(xx)xxxxx-xxxx">
            </div>
            <div class="form-group col-sm-6">
                <label for="exampleInputPassword1">Endereço</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Endereço Completo">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-12">
                 <label for="exampleInputPassword1">Observações</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Observações que irão na nota">
            </div>
        </div>
        <div class="form-group">
        <button class="btn btn-success">Gravar</button>
        </div>
    </div>
    </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
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
    <script type="text/javascript" src="index.js"></script> 
  </body>
</html>
