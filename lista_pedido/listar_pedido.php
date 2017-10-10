<?php

$path = $_SERVER['DOCUMENT_ROOT'];
require_once ($path . '/siven/model/Pedido.php');
require_once ($path . '/siven/model/conexao.php');

//função para gerar a lista de pedidos
function arrayListaPedidos($conexao){
    $resultado=array();
    $resultados=array();
     
    
    $sql=
    "SELECT pedido.id,cliente.nome,DATE_FORMAT(pedido.data_entrega,\"%d-%m-%Y\"),(SUM(item_pedido.valor_total)) AS total
    FROM pedido
    LEFT JOIN cliente ON pedido.id_cliente=cliente.id
    LEFT JOIN item_pedido ON pedido.id=item_pedido.id_pedido
    GROUP BY pedido.id";
    
    //$sql="SELECT id,nome,data_entrega,total FROM lista_itens WHERE is_canceled!=1 and is_deleted!=1";  
    //echo $sql;
    //testa se o query está correto    
    if($query=$conexao->prepare($sql)){
        //passando variaveis para a query
        try{
            //executando a consulta
            $resultado=$query->execute();
            $query->bind_result($id,$nome,$data_entrega,$total);
           //colocando resultados no array
            while ($query->fetch()) {    
              array_push($resultados,$resultado=['id'=>$id,'nome'=>$nome,'data_entrega'=>$data_entrega,'total'=>$total]);      
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
$html.="<th class='text-center'>#</th>";
$html.="<th class='text-center'>Cliente</th>";
$html.="<th class='text-center'>Valor</th>";
$html.="<th class='text-center'>Data da Entrega</th>";
$html.="<th class='text-center'>Situação</th>";
$html.="<th class='text-center'>Ação</th>";
$html.="</tr>";
$html.="</thead>";
$html.="<tbody>";
    for ($i = 0; $i < count ($listaResultados); $i++) {
    $html.="<tr linha='".$listaResultados[$i]['id']."' >";
    $html.="<td class='text-center'>".$listaResultados[$i]['id']."</td>";
    $html.="<td class='text-center'>".$listaResultados[$i]['nome']."</td>";
    $html.="<td class='text-center'>".number_format($listaResultados[$i]['total'], 2, ',', '.')."</td>";
    $html.="<td class='text-center'>".$listaResultados[$i]['data_entrega']."</td>";
    $html.="<td class='text-center'>".$listaResultados[$i]['id']."</td>";
    $html.="<td class='text-center'><a href='/siven/inserir_pedido/?id=".$listaResultados[$i]['id']."'><i class='fa fa-pencil-square-o fa-4 editar'></i></a><a href=# class='excluirPedido' data-id='".$listaResultados[$i]['id']."'><i class='fa fa-trash-o fa-4' aria-hidden='true'></i></a></td>";
    $html.="</tr>";
}
$html.="</tbody>";
$html.="</table>";
$html.="</div>";

echo $html;
        