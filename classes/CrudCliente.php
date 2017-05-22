<?php

include_once ('../classes/Cliente.php');
include_once '../bd/DB.php';

class CrudCliente extends Cliente {

    private $db = "";

    function __construct($fantasia, $responsavel, $docTipo, $docNumero) {
        parent::__construct($fantasia, $responsavel, $docTipo, $docNumero);
        $this->db = DB::getInstance();
    }

    function newSoId($id) {
        $instance = new self("", "", "", "");
        return $instance;
    }

    //    $db = DB::getInstance();


    public function inserir() {

        $sql = "INSERT INTO Clientes (cli_fantasia, cli_responsavel, cli_doctipo, cli_docnumero, cli_timestamp) "
                . "VALUES(:fantasia, :responsavel, :doctipo, :docnumero, :timestamp)";
        $stmt = DB::prepare($sql);

        $stmt->bindValue(':fantasia', $this->fantasia, PDO::PARAM_STR);
        $stmt->bindValue(':responsavel', $this->responsavel, PDO::PARAM_STR);
        $stmt->bindValue(':doctipo', $this->docTipo, PDO::PARAM_STR);
        $stmt->bindValue(':docnumero', $this->docNumero, PDO::PARAM_STR);
        $stmt->bindValue(':timestamp', $this->timestamp, PDO::PARAM_STR);
        $retorno = $stmt->execute();
    }

    public function editar() {

        $sql = "UPDATE Clientes set cli_fantasia = ?, cli_responsavel =?, cli_doctipo  = ?, cli_docnumero = ?" +
                "WHERE cli_id = ?";
    
        
        $stmt = DB::prepare($sql);
        
        $stmt->bindParam(1, $this->fantasia);
        $stmt->bindParam(2, $this->responsavel);
        $stmt->bindParam(3, $this->docTipo);
        $stmt->bindParam(4, $this->docNumero);
        $stmt->bindParam(5, $this->id);
        
        $stmt->execute();
         var_dump($stmt);
    }

    public function excluir() {
        echo "iiiid:" . $this->id;
        $sql = "DELETE FROM Clientes WHERE cli_id = ?";
        $stmt = DB::prepare($sql);


        $stmt->execute(array($this->id));
    }

}
