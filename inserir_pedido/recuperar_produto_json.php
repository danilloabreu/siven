<?php
$path = $_SERVER['DOCUMENT_ROOT'];
require_once ($path . '/siven/model/Produto.php');
require_once ($path . '/siven/model/conexao.php');

$id=$_POST['id'];

$pedido = Produto::read($conexao,"id=$id");
$pedidoJson = json_encode($pedido[0]);
echo $pedidoJson;        





