<?php

$path = $_SERVER['DOCUMENT_ROOT'];
require_once ($path . '/siven/model/Pedido.php');
require_once ($path . '/siven/model/conexao.php');

//função para gerar a lista de pedidos
function arrayListaPedidos($conexao){
    $resultado=array();
    $resultados=array();
      
    $sql="SELECT distinct data_entrega FROM carregamento_data";  
    //echo $sql;
    //testa se o query está correto    
    if($query=$conexao->prepare($sql)){
        //passando variaveis para a query
        try{
            //executando a consulta
            $resultado=$query->execute();
            $query->bind_result($data_entrega);
           //colocando resultados no array
            while ($query->fetch()) {    
              array_push($resultados,$resultado=['data_entrega'=>$data_entrega]);      
            } 
           //testa o resultado
            if (!$resultado) {
                $message  = 'Invalid query: ' . $conexao->error . "\n";
                //$message .= 'Whole query: ' . $resultado;
                die($message);
            }//end of if
        }//end of try
        catch(Exception $e){
            echo "erro";
        }
    }else{
        echo "Há um problema com a sintaxe inicial da query SQL";
    }
    return $resultados;
}//fim da função loteDisponivelArray

$listaResultados= arrayListaPedidos($conexao);
//var_dump($listaProposta);
$html="<div class='table-responsive'>";
$html.="<table id='tabelaProposta' class='table table-hover' cellspacing='0' width='100%'>";
$html.='<thead>';
$html.='<tr>';
$html.="<th class='text-center'>Data</th>";
$html.="<th class='text-center'>Carregamento</th>";
$html.="<th class='text-center'>Entregas</th>";
$html.="</tr>";
$html.="</thead>";
$html.="<tbody>";
    for ($i = 0; $i < count ($listaResultados); $i++) {
    $html.="<tr>";
    $html.="<td class='text-center'>".$listaResultados[$i]['data_entrega']."</td>";
    $html.="<td class='text-center'><a target='_blank' href='/siven/carregamento_dia/?tipo=tela&data_entrega=".$listaResultados[$i]['data_entrega']."'><i class='fa fa-desktop fa-4'></i></a><a href='/siven/carregamento_dia/?tipo=pdf&data_entrega=".$listaResultados[$i]['data_entrega']."'><i class='fa fa-file-text-o fa-4' aria-hidden='true'></i></a></td>";
    $html.="<td class='text-center'><i class='fa fa-desktop fa-4'></i></a> <i class='fa fa-file-text-o fa-4' aria-hidden='true'></i></td>";
    $html.="</tr>";
}
$html.="</tbody>";
$html.="</table>";
$html.="</div>";

echo $html;
        


