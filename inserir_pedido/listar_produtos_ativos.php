<?php

$path = $_SERVER['DOCUMENT_ROOT'];
require_once ($path . '/siven/model/Produto.php');
require_once ($path . '/siven/model/conexao.php');


$idProduto= $_GET['id_produto'];
$nomeProduto= $_GET['nome_produto'];

/*
$idProduto=null;
$nomeProduto=null;
*/

$listaProdutos=Produto::read($conexao,"nome LIKE '%$nomeProduto%' AND is_inativo IS NULL ");
 

//var_dump($listaProposta);
$total=0;
$html="<div class='table-responsive'>";
$html.="<table id='tabelaItens' class='table table-hover' cellspacing='0' width='100%'>";
$html.='<thead>';
$html.='<tr>';
$html.="<th class='text-center'>#</th>";
$html.="<th class='text-center'>Nome</th>";
$html.="<th class='text-center'>Marca</th>";
$html.="<th class='text-center'>Unidade</th>";
$html.="<th class='text-center'>Tipo</th>";
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
    $html.="<td class='text-center'><a href='#' data-id='".$listaProdutos[$i]->id."' class='selecionaProduto'><i class='fa fa-check fa-4'></i></a></td>";
    $html.="</tr>";
    }
$html.="</tbody>";
$html.="</table>";
$html.="</div>";
    
echo $html;
        