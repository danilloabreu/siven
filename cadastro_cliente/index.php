<?php
//requisições
$path = $_SERVER['DOCUMENT_ROOT'];
require_once ($path . '/siven/model/Cliente.php');
require_once ($path . '/siven/model/conexao.php');

$id = '';
$nome = '';
$telefone = '';
$endereco = '';

$cliente = new Cliente($id, $nome, $telefone, $endereco);

//Validação e 
//inserção de dados
if (isset($_POST["nome"]) && isset($_POST["telefone"]) && isset($_POST["endereco"])) {
    if (empty($_POST["nome"]))
        $erro = "Campo nome obrigatório";
    else
    if (empty($_POST["telefone"]))
        $erro = "Campo telefone obrigatório";
    else
    if (empty($_POST["endereco"]))
        $erro = "Campo endereço obrigatório";
    else {
        //Realização do cadastro ou alteração do dado
        $nome = $_POST['nome'];
        $endereco = $_POST['endereco'];
        $telefone = $_POST['telefone'];

        if ($_POST['id'] == -1) {
            //adicionando ao banco
            $cliente_inserir = new Cliente(null, $nome, $telefone, $endereco);
            $cliente_inserir->create($conexao);
            $sucesso="Registro inserido com sucesso!";
        }
    }//fim do else
}//fim da inserção de dados

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $cliente = Cliente::read($conexao, "id = $id ")[0];
}




//mensagens de erro
if (isset($erro))
    echo '<div style="color:#F00">' . $erro . '</div><br/><br/>';
else
if (isset($sucesso))
    echo '<div style="color:#00f">' . $sucesso . '</div><br/><br/>';
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Cadastro de Cliente</title>
    </head>
    <body>
        <form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
            Nome<br/> 
            <input type="text" name="nome" placeholder="Nome" value="<?= $cliente->getNome() ?>"><br/><br/>
            Telefone<br/> 
            <input type="text" name="telefone" placeholder="Telefone" value="<?= $cliente->getTelefone() ?>"><br/><br/>
            Endereço<br/> 
            <input type="text" name="endereco" placeholder="Endereco" value="<?= $cliente->getEndereco() ?>"><br/><br/>
            <input type="hidden" value="-1" name="id" >
            <button type="submit">Cadastrar</button>
        </form>
    </body>
</html>
