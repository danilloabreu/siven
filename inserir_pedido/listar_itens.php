<?php

$path = $_SERVER['DOCUMENT_ROOT'];
require_once ($path . '/siven/model/ItemPedido.php');
require_once ($path . '/siven/model/conexao.php');

$idPedido= $_GET['id_pedido'];
//$idPedido=1;
$listaItens=ItemPedido::read($conexao,"id_pedido='$idPedido'");
//var_dump($listaProposta);
$html="<div class='table-responsive'>";
$html.="<table id='tabelaItens' class='table table-hover' cellspacing='0' width='100%'>";
$html.='<thead>';
$html.='<tr>';
$html.="<th class='text-center'>#</th>";
$html.="<th class='text-center'>Nome</th>";
$html.="<th class='text-center'>Quantidade</th>";
$html.="<th class='text-center'>Data Entrega</th>";
$html.="<th class='text-center'>Valor</th>";
$html.="<th class='text-center'>Total</th>";
$html.="<th class='text-center'>Ações</th>";
$html.="</tr>";
$html.="</thead>";
$html.="<tbody>";
    for ($i = 0; $i < count ($listaItens); $i++) {
    $html.="<tr>";
    $html.="<td class='text-center'>".$listaItens[$i]->id."</td>";
    $html.="<td class='text-center'>".$listaItens[$i]->id_produto."</td>";
    $html.="<td class='text-center'>".$listaItens[$i]->qtd."</td>";
    $html.="<td class='text-center'>".$listaItens[$i]->data_entrega."</td>";
    $html.="<td class='text-center'>".$listaItens[$i]->valor_unitario."</td>";
    $html.="<td class='text-center'>".$listaItens[$i]->valor_total."</td>";
    $html.="<td class='text-center'><a href='#'><i class='fa fa-pencil-square-o fa-4 editar'></i></a> <i class='fa fa-trash-o fa-4' aria-hidden='true'></i></td>";
    $html.="</tr>";
}
$html.="</tbody>";
$html.="</table>";
$html.="</div>";

echo $html;
        