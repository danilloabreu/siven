<?php

$path = $_SERVER['DOCUMENT_ROOT'];
require_once ($path . '/siven/model/ItemPedido.php');
require_once ($path . '/siven/model/Produto.php');
require_once ($path . '/siven/model/conexao.php');

$idPedido= $_GET['id_pedido'];
$listaItens=ItemPedido::read($conexao,"id_pedido='$idPedido'");
 

//var_dump($listaProposta);
$total=0;
$html="<div class='table-responsive'>";
$html.="<table id='tabelaItens' class='table table-hover' cellspacing='0' width='100%'>";
$html.='<thead>';
$html.='<tr>';
//$html.="<th class='text-center'>#</th>";
$html.="<th class='text-center'>Nome</th>";
$html.="<th class='text-center'>Tipo</th>";
$html.="<th class='text-center'>Data Entrega</th>";
$html.="<th class='text-center'>Quantidade</th>";
$html.="<th class='text-center'>Valor</th>";
$html.="<th class='text-center'>Total</th>";
$html.="<th class='text-center'>Ações</th>";
$html.="</tr>";
$html.="</thead>";
$html.="<tbody>";
    for ($i = 0; $i < count ($listaItens); $i++) {
    $produto = Produto::read($conexao,"id='".$listaItens[$i]->id_produto."'");    
    $produto=$produto[0];
    $dataEntrega=new DateTime($listaItens[$i]->data_entrega);
    $dataEntrega=$dataEntrega->format('d-m-Y');
   
    $html.="<tr>";
    //$html.="<td class='text-center'>".$listaItens[$i]->id."</td>";
    $html.="<td class='text-center'>".$produto->nome."</td>";
    $html.="<td class='text-center'>".$produto->unidade."</td>";
    $html.="<td class='text-center'>".$dataEntrega."</td>";
    $html.="<td class='text-center'>".$listaItens[$i]->qtd."</td>";
    $html.="<td class='text-center'>".$listaItens[$i]->valor_unitario."</td>";
    $html.="<td class='text-center'>".$listaItens[$i]->valor_total."</td>";
    $html.="<td class='text-center'><a href='#'><i class='fa fa-pencil-square-o fa-4 editar'></i></a> <i class='fa fa-trash-o fa-4' aria-hidden='true'></i></td>";
    $html.="</tr>";
    $total+=$listaItens[$i]->valor_total;
    
    }
$html.="</tbody>";
$html.="</table>";
$html.="</div>";
$html.="<hr>";
$html.="<div class='col-sm-12'>";
$html.="<div><h3 class='col-sm-4 pull-right'>Total : <span>".number_format($total, 2,'.','')."</span></h3></div>";
$html.="</div>";

echo $html;
        