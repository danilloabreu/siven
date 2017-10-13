<?php

$path = $_SERVER['DOCUMENT_ROOT'];
require_once ($path . '/siven/model/Cliente.php');
require_once ($path . '/siven/model/conexao.php');

$idCliente= $_GET['id_cliente'];
$nomeCliente= $_GET['nome_cliente'];

$listaClientes=Cliente::read($conexao,"nome LIKE '%$nomeCliente%' AND is_inativo IS NULL ");
 

//var_dump($listaProposta);
$total=0;
$html="<div class='table-responsive'>";
$html.="<table id='tabelaItens' class='table table-hover' cellspacing='0' width='100%'>";
$html.='<thead>';
$html.='<tr>';
$html.="<th class='text-center'>#</th>";
$html.="<th class='text-center'>Nome</th>";
$html.="<th class='text-center'>Endereço</th>";
$html.="<th class='text-center'>Selecionar</th>";
$html.="</tr>";
$html.="</thead>";
$html.="<tbody>";
    for ($i = 0; $i < count ($listaClientes); $i++) {
    
    $html.="<tr>";
    $html.="<td class='text-center'>".$listaClientes[$i]->id."</td>";
    $html.="<td class='text-center'>".$listaClientes[$i]->nome."</td>";
    $html.="<td class='text-center'>".$listaClientes[$i]->endereco."</td>";
    $html.="<td class='text-center'><a href='#' data-id='".$listaClientes[$i]->id."' class='selecionaCliente'><i class='fa fa-check fa-4'></i></a></td>";
    $html.="</tr>";
    }
$html.="</tbody>";
$html.="</table>";
$html.="</div>";
    
echo $html;
        