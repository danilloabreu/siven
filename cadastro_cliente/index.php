<?php
//Validando a existência dos dados
if(isset($_POST["nome"]) && isset($_POST["telefone"]) && isset($_POST["endereco"]))
{
	if(empty($_POST["nome"]))
		$erro = "Campo nome obrigatório";
	else
	if(empty($_POST["telefone"]))
		$erro = "Campo telefone obrigatório";
	else
	{
		//Vamos realizar o cadastro ou alteração dos dados enviados.
	}
}

//mensagens de erro
if(isset($erro))
	echo '<div style="color:#F00">'.$erro.'</div><br/><br/>';
else
if(isset($sucesso))
	echo '<div style="color:#00f">'.$sucesso.'</div><br/><br/>';
 

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Cadastro de Cliente</title>
  </head>
  <body>
      <form action="<?=$_SERVER["PHP_SELF"]?>" method="post">
	  Nome<br/> 
	  <input type="text" name="nome" placeholder="Nome"><br/><br/>
	  Telefone<br/> 
	  <input type="text" name="telefone" placeholder="Telefone"><br/><br/>
	  Endereço<br/> 
	  <input type="text" name="endereco" placeholder="Endereco"><br/><br/>
	  <input type="hidden" value="-1" name="id" >
	  <button type="submit">Cadastrar</button>
	</form>
  </body>
</html>
