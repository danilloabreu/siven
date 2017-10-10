<?php

$path = $_SERVER['DOCUMENT_ROOT'];
require_once ($path . '/siven/model/Pedido.php');
require_once ($path . '/siven/model/conexao.php');

//$condicao='id=1';
if(isset($_POST['id'])){    
$condicao='id='.$_POST['id'];
//$condicao='id='.$_POST['id'];
$pedido= Pedido::read($conexao, $condicao)[0];
$pedido->is_deleted=1;
$pedido->update($conexao);
$status=$conexao->errno;
//var_dump($conexao);
$conexao->close();

if(!$status){
    echo TRUE;
}else{
    echo FALSE;
}

}
