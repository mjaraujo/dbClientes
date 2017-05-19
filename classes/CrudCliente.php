<?php

include_once ('../classes/Cliente.php');
include_once '../bd/DB.php';

class CrudCliente extends Cliente{
    private $db="";

    function __construct($fantasia, $responsavel, $docTipo, $docNumero) {
        parent::__construct($fantasia, $responsavel, $docTipo, $docNumero);
        $this->db = DB::getInstance();
    }

    
    //    $db = DB::getInstance();

    
    public function inserir(){
        
        $sql = "INSERT INTO Clientes (cli_fantasia, cli_responsavel, cli_doctipo, cli_docnumero, cli_timestamp) "
                . "VALUES(:fantasia, :responsavel, :doctipo, :docnumero, :timestamp)";
        $stmt =  DB::prepare($sql);

        $stmt->bindValue(':fantasia',  $this->fantasia, PDO::PARAM_STR);
        $stmt->bindValue(':responsavel', $this->responsavel, PDO::PARAM_STR);
        $stmt->bindValue(':doctipo', $this->docTipo, PDO::PARAM_STR);
        $stmt->bindValue(':docnumero', $this->docNumero, PDO::PARAM_STR);
        $stmt->bindValue(':timestamp', $this->timestamp , PDO::PARAM_STR);
        $retorno = $stmt->execute();
    }
    
    public function excluir(){
        
        $sql = "DELETE FROM Clientes c WHERE c.cli_id = :cli_id";
        $stmt =  DB::prepare($sql);

        $stmt->bindValue(':cli_id',  $this->id, PDO::PARAM_STR);
        $retorno = $stmt->execute();
    }
    
    
    
}
