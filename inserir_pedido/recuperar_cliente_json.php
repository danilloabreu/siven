<?php
$path = $_SERVER['DOCUMENT_ROOT'];
require_once ($path . '/siven/model/Cliente.php');
require_once ($path . '/siven/model/conexao.php');

$id=$_POST['id'];

$cliente = Cliente::read($conexao,"id=$id");
$clienteJson = json_encode($cliente[0]);
echo $clienteJson;        
