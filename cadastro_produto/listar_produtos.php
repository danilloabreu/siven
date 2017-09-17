<?php

$path = $_SERVER['DOCUMENT_ROOT'];
require_once ($path . '/siven/model/Produto.php');
require_once ($path . '/siven/model/conexao.php');

$listaProdutos=Produto::read($conexao,true);
//var_dump($listaProposta);
$html="<div class='table-responsive'>";
$html.="<table id='tabelaProposta' class='table table-hover' cellspacing='0' width='100%'>";
$html.='<thead>';
$html.='<tr>';
$html.="<th class='text-center'>#</th>";
$html.="<th class='text-center'>Nome</th>";
$html.="<th class='text-center'>Marca</th>";
$html.="<th class='text-center'>Unidade</th>";
$html.="<th class='text-center'>Tipo</th>";
$html.="<th class='text-center'>Ação</th>";
$html.="</tr>";
$html.="</thead>";
$html.="<tbody>";
    for ($i = 0; $i < count ($listaProdutos); $i++) {
    $html.="<tr>";
    $html.="<td class='text-center'>".$listaProdutos[$i]->id."</td>";
    $html.="<td class='text-center'>".$listaProdutos[$i]->nome."</td>";
    $html.="<td class='text-center'>".$listaProdutos[$i]->marca."</td>";
    $html.="<td class='text-center'>".$listaProdutos[$i]->unidade."</td>";
    $html.="<td class='text-center'>".$listaProdutos[$i]->tipo."</td>";
    $html.="<td class='text-center'><i class='fa fa-pencil-square-o fa-4'></i>     <i class='fa fa-trash-o fa-4' aria-hidden='true'></i></td>";
    $html.="</tr>";
}
$html.="</tbody>";
$html.="</table>";
$html.="</div>";

echo $html;
        