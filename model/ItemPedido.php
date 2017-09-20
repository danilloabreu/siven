<?php

class ItemPedido{
    
    //variáveis do banco de dados
    private static $tableDb="item_pedido";    
    private static $tableColumns = array(
    "id"=>null,
    "id_pedido"=>null,
    "id_produto"=>null,
    "qtd"=>null,
    "valor_unitario"=>null,
    "valor_total"=>null,
    "data_entrega"=>null,
  );
    
    public $id;
    public $id_pedido;
    public $id_produto;
    public $qtd;
    public $valor_unitario;
    public $valor_total;
    public $data_entrega;
    
    function getId() {
        return $this->id;
    }

    function getId_pedido() {
        return $this->id_pedido;
    }

    function getId_produto() {
        return $this->id_produto;
    }

    function getQtd() {
        return $this->qtd;
    }

    function getValor_unitario() {
        return $this->valor_unitario;
    }

    function getValor_total() {
        return $this->valor_total;
    }

    function __construct($id, $id_pedido, $id_produto, $qtd, $valor_unitario, $valor_total, $data_entrega) {
        $this->id = $id;
        $this->id_pedido = $id_pedido;
        $this->id_produto = $id_produto;
        $this->qtd = $qtd;
        $this->valor_unitario = $valor_unitario;
        $this->valor_total = $valor_total;
        $this->data_entrega = $data_entrega;
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

//todo -> inserir data entrega
public function create($conexao){
     
    //iniciando a conexão
    $query =$conexao->stmt_init();    
    //testa se o query estã correto
    if($query=$conexao->prepare("INSERT INTO item_pedido (id,id_pedido,id_produto,qtd,valor_unitario,valor_total,data_entrega)"
                . "VALUES (?,?,?,?,?,?,?)")){
        //passando variaveis para a query
            try{              
                $query->bind_param('sssssss',
                $this->id,
                $this->id_pedido,
                $this->id_produto,
                $this->qtd,
                $this->valor_unitario,
                $this->valor_total,
                $this->data_entrega                        
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
 
 
 
}//fim da classe Cliente

