<?php

class Pedido{
    
    //variáveis do banco de dados
    private static $tableDb="pedido";    
    private static $tableColumns = array(
    "id"=>null,
    "id_cliente"=>null,
    "data_inclusao"=>null,
    "is_canceled"=>null,
    "is_deleted"=>null,
    "data_entrega"=>null,
    "observacao"=>null,    
  );
    
    public $id;
    public $id_cliente;
    public $data_inclusao;
    public $is_canceled;
    public $is_deleted;
    public $data_entrega;
    public $observacao;
    
    function __construct($id, $id_cliente, $data_inclusao, $is_canceled, $is_deleted, $data_entrega, $observacao) {
        $this->id = $id;
        $this->id_cliente = $id_cliente;
        $this->data_inclusao = $data_inclusao;
        $this->is_canceled = $is_canceled;
        $this->is_deleted = $is_deleted;
        $this->data_entrega = $data_entrega;
        $this->observacao = $observacao;
    }

        public static function read ($conexao,$condicao){
    $sql="SELECT ";
    
    foreach(self::$tableColumns as $key => $keyValue){
        $sql.="$key,";        
    } 
    $sql=rtrim($sql, ',');
    $sql.=" FROM ".self::$tableDb;
    $sql.=" WHERE $condicao";
    $sqlStmt=$sql;

$param=array();    
    
    if (!is_string($sqlStmt) || empty($sqlStmt)) {
        return false;
    }

    // initialise some empty arrays
    $fields = array();
    $results = array();

    if ($stmt = $conexao->prepare($sqlStmt)) {
        // bind params if they are set
        if (!empty($params)) {
            $types = '';
            foreach($params as $param) {
                // set param type
                if (is_string($param)) {
                    $types .= 's';  // strings
                } else if (is_int($param)) {
                    $types .= 'i';  // integer
                } else if (is_float($param)) {
                    $types .= 'd';  // double
                } else {
                    $types .= 'b';  // default: blob and unknown types
                }
            }

            $bind_names[] = $types;
            for ($i=0; $i<count($params);$i++) {
                $bind_name = 'bind' . $i;       
                $$bind_name = $params[$i];      
                $bind_names[] = &$$bind_name;   
            }

            call_user_func_array(array($stmt,'bind_param'),$bind_names);
        }

        // execute query
        $stmt->execute();

        // Get metadata for field names
        $meta = $stmt->result_metadata();

        // This is the tricky bit dynamically creating an array of variables to use
        // to bind the results
        while ($field = $meta->fetch_field()) { 
            $var = $field->name; 
            $$var = null; 
            $fields[$var] = &$$var;
        }

        // Bind Results
        call_user_func_array(array($stmt,'bind_result'),$fields);

        // Fetch Results
        $i = 0;
        $listaResultado=array();
        $argObj = array();
        while ($stmt->fetch()) {
            $results[$i] = array();
            
            foreach($fields as $k => $v){
                
                $results[$i][$k] = $v;
                array_push($argObj,$v);
            }
            $class = new ReflectionClass(__CLASS__);
            //$args  = array('id','usuario','senha','email','acesso_qualidade','acesso_ambiental');
            $instance = $class->newInstanceArgs($argObj);
            array_push($listaResultado,$instance);
            $argObj = array();
            $i++;
            
        }

        // close statement
        $stmt->close();
    }
   // echo "<pre>";
    //print_r($results);
    //print_r($listaResultado);
    //echo "</pre>";
    return $listaResultado;
}

public function create($conexao){
     
    //iniciando a conexão
    $query =$conexao->stmt_init();    
    //testa se o query estã correto
    if($query=$conexao->prepare("INSERT INTO pedido (id,id_cliente,data_inclusao,is_canceled,is_deleted,data_entrega,observacao)"
                . "VALUES (?,?,?,?,?,?,?)")){
        //passando variaveis para a query
            try{              
                $query->bind_param('sssssss',
                $this->id,
                $this->id_cliente,
                $this->data_inclusao,
                $this->is_canceled,
                $this->is_deleted,
                $this->is_canceled,        
                $this->observacao        
                );
        $resultado=$query->execute();
        }
            catch(Exception $e){
            echo "Problema";
        }
       //testa o resultado
        if (!$resultado) {
        $message  = 'Invalid query: ' . $conexao->error . "\n";
        //$message .= 'Whole query: ' . $resultado;
		//throw new Exception('Erro no movimento');
        die($message);
        }
        } else {
        echo "Há um problema com a sintaxe inicial da query SQL";
        }
         
     
 }//fim da funçao create
  
public function update($conexao){
     
    //iniciando a conexão
    $query =$conexao->stmt_init();    
    //testa se o query estã correto
    if($query=$conexao->prepare("UPDATE cliente SET id=?,nome=?,endereco=?,telefone=?)"
                . "VALUES (?,?,?,?)")){
        //passando variaveis para a query
            try{              
                $query->bind_param('ssss',
                $this->getId(),
                $this->getNome(),
                $this->getEndereco(),
                $this->getTelefone()
                );
        $resultado=$query->execute();
        }
            catch(Exception $e){
            echo "Problema";
        }
       //testa o resultado
        if (!$resultado) {
        $message  = 'Invalid query: ' . $conexao->error . "\n";
        //$message .= 'Whole query: ' . $resultado;
		//throw new Exception('Erro no movimento');
        die($message);
        }
        } else {
        echo "Há um problema com a sintaxe inicial da query SQL";
        }
         
     
 }//fim da funçao update
 
 
 
}//fim da classe Pedido



