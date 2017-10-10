<?php
$path = $_SERVER['DOCUMENT_ROOT'];
require_once ($path . '/siven/model/Pedido.php');
require_once ($path . '/siven/model/Cliente.php');
require_once ($path . '/siven/model/conexao.php');


$conexao->autocommit(FALSE);

try{
$pedido = new Pedido($id=null, $id_cliente=3, $data_inclusao='2017-27-12', $is_canceled=null, $is_deleted=null, $data_entrega='2017-27-12', $observacao='Pedido inserido manualmente');
$pedido->create($conexao);
$cliente = new Cliente($id=31, $nome="Danilo", $telefone="Beleza", $endereco="Teste");
$cliente->create($conexao);
$conexao->commit();
} catch (Exception $e){
    echo '<pre>' . var_dump($conexao) . '</pre>';
    $conexao->rollback();
}

