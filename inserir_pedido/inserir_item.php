<?php
$path = $_SERVER['DOCUMENT_ROOT'];
require_once ($path . '/siven/model/ItemPedido.php');
require_once ($path . '/siven/model/conexao.php');

$id=null;
$id_pedido=$_POST['idPedido'];
$id_produto=$_POST['codigoItem'];
$qtd=$_POST['qtdItem'];
$valor_unitario=$_POST['valorItem'];
$valor_total=$_POST['totalItem'];
$data_entrega=null;

$itemPedido = new ItemPedido($id, $id_pedido, $id_produto, $qtd, $valor_unitario, $valor_total , $data_entrega);
$itemPedido->create($conexao);


