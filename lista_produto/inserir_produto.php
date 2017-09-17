<?php
$path = $_SERVER['DOCUMENT_ROOT'];
require_once ($path . '/siven/model/Produto.php');
require_once ($path . '/siven/model/conexao.php');

$id=null;
$nome=$_POST['nomeProduto'];
$marca=$_POST['marcaProduto'];
$unidade=$_POST['unidadeProduto'];
$tipo=$_POST['tipoProduto'];

$produto = new Produto($id, $nome, $marca, $unidade, $tipo);
$produto->create($conexao);



