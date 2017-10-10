<?php
$path = $_SERVER['DOCUMENT_ROOT'];
require_once ($path . '/siven/model/Pedido.php');
require_once ($path . '/siven/model/conexao.php');



/*
//dados vindo do formulário
$id=null;
$id_cliente=$_POST['idCliente'];
$data_entrega=$_POST['dataEntrega'];
$observacao=$_POST['observacao'];
$is_canceled=null;
$is_deleted=null;
*/

$id=107;
$id_cliente=1;
$data_entrega=null;
$observacao=null;
$is_canceled=null;
$is_deleted=null;


//####convertendo data em caso de HTML 5#####
//preparando a data para inserir no banco
//$data_limite_tarefa=str_replace('T',' ',$data_limite_tarefa);
//$data_limite_tarefa.=":00";
//$data_limite_tarefa= new DateTime($data_limite_tarefa);
//$data_limite_tarefa=$data_limite_tarefa->format('Y-m-d H:i:s');

//convertendo a data para o formato do banco
$date=new DateTime($data_entrega);
$date=$date->format('Y-m-d H:i:s');
$data_entrega=$date;


$pedido = new Pedido($id, $id_cliente, $data_inclusao=null, $is_canceled, $is_deleted, $date, $observacao);

try{
$pedido->create($conexao);
echo $conexao->insert_id;
} catch (Exception $ex) {
echo 0;
}





