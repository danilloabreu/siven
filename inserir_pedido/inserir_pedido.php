<?php
$path = $_SERVER['DOCUMENT_ROOT'];
require_once ($path . '/siven/model/Pedido.php');
require_once ($path . '/siven/model/conexao.php');

$id=null;
$id_cliente=$_POST['idCliente'];
$data_inclusao=$_POST['dataInclusao'];
$data_entrega=$_POST['dataEntrega'];
$observacao=$_POST['observacao'];
$is_canceled=null;
$is_deleted=null;

$pedido = new Pedido($id, $id_cliente, $data_inclusao, $is_canceled, $is_deleted, $data_entrega, $observacao);
$pedido->create($conexao);



