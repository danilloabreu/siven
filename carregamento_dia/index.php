<?php
$path = $_SERVER['DOCUMENT_ROOT'];
require_once ($path . '/siven/model/conexao.php');
require_once ($path .'/siven/util/mpdf/mpdf.php');

function arrayCarregamentoData($conexao,$data){
    $resultado=array();
    $resultados=array();
      
    $sql="SELECT nome,unidade,soma FROM carregamento_data where data_entrega = '$data'";  
    //echo $sql;
    //testa se o query está correto    
    if($query=$conexao->prepare($sql)){
        //passando variaveis para a query
        try{
            //executando a consulta
            $resultado=$query->execute();
            $query->bind_result($nome,$unidade,$soma);
           //colocando resultados no array
            while ($query->fetch()) {    
              array_push($resultados,$resultado=['nome'=>$nome,'unidade'=>$unidade,'soma'=>$soma]);      
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

$data=New DateTime($_GET['data_entrega']);
//var_dump($data);
$data1=$data;
$data=$data->format('Y-m-d');        
//var_dump($data);
$resultado=arrayCarregamentoData($conexao, $data);
//var_dump($resultado);   

$data1=$data1->format('d-m-Y');

$table="<div class='table'>";
$table.="<h3 class='text-center'>Carregamento do dia $data1 </h3>";
$table.="<table id='tabelaItens' class='table table-hover' cellspacing='0' width='100%'>";
$table.='<thead>';
$table.='<tr>';
$table.="<th class='text-center'>Produto</th>";
$table.="<th class='text-center'>Tipo</th>";
$table.="<th class='text-center'>Caixa (12)</th>";
$table.="<th class='text-center'>Avulso</th>";
$table.="<th class='text-center'>Quantidade</th>";
$table.="</tr>";
$table.="</thead>";
$table.="<tbody>";
    for ($i = 0; $i < count ($resultado); $i++) {
    $table.="<tr>";
    $table.="<td class='text-center'>".$resultado[$i]['nome']."</td>";
    $table.="<td class='text-center'>".$resultado[$i]['unidade']."</td>";
    $table.="<td class='text-center'>".((int)($resultado[$i]['soma']/12))."</td>";
    $table.="<td class='text-center'>".((int)($resultado[$i]['soma']%12))."</td>";
    $table.="<td class='text-center'>".$resultado[$i]['soma']."</td>";
    $table.="<td class='text-center'><a href='#'><i class='fa fa-pencil-square-o fa-4 editar'></i></a> <i class='fa fa-trash-o fa-4' aria-hidden='true'></i></td>";
    $table.="</tr>";
}
$table.="</tbody>";
$table.="</table>";
$table.="</div>";

$html="<!DOCTYPE html>";
$html.="<html lang='pt-br'>";
$html.="<head>";
$html.="<link href='/siven/util/bootstrap.css' rel='stylesheet'>";
$html.="</head>";
$html.="<body>";
$html.=$table;
$html.="</body>";
$html.="</html>";


if($_GET['tipo']=='pdf'){
$mpdf = new mPDF();
$mpdf->WriteHTML($html);
$mpdf->Output($data.'.pdf','D');    
}else{
echo $html;    
}


