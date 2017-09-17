<?php
$path = $_SERVER['DOCUMENT_ROOT'];
require_once ($path . '/siven/model/Pedido.php');
require_once ($path . '/siven/model/conexao.php');

$id=2;

$pedido = Pedido::read($conexao,"id=$id");
$pedidoJson = json_encode($pedido[0]);
echo $pedidoJson;        





