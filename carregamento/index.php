<?php
$path = $_SERVER['DOCUMENT_ROOT'];
require_once ($path . '/siven/model/conexao.php');

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

$data=New DateTime('15-09-2017');
//var_dump($data);
$data1=$data;
$data=$data->format('Y-m-d');        
//var_dump($data);
$resultado=arrayCarregamentoData($conexao, $data);
//var_dump($resultado);   

$data1=$data1->format('d-m-Y');

$html="<div class='table-responsive'>";
$html.="<h3>Carregamento do dia $data1 </h3>";
$html.="<table id='tabelaItens' class='table table-hover' cellspacing='0' width='100%'>";
$html.='<thead>';
$html.='<tr>';
$html.="<th class='text-center'>Produto</th>";
$html.="<th class='text-center'>Tipo</th>";
$html.="<th class='text-center'>Quantidade</th>";
$html.="</tr>";
$html.="</thead>";
$html.="<tbody>";
    for ($i = 0; $i < count ($resultado); $i++) {
    $html.="<tr>";
    $html.="<td class='text-center'>".$resultado[$i]['nome']."</td>";
    $html.="<td class='text-center'>".$resultado[$i]['unidade']."</td>";
    $html.="<td class='text-center'>".$resultado[$i]['soma']."</td>";
    $html.="<td class='text-center'><a href='#'><i class='fa fa-pencil-square-o fa-4 editar'></i></a> <i class='fa fa-trash-o fa-4' aria-hidden='true'></i></td>";
    $html.="</tr>";
}
$html.="</tbody>";
$html.="</table>";
$html.="</div>";

echo $html;



