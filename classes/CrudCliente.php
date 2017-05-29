<?php

include_once ('../classes/Cliente.php');
include_once '../bd/DB.php';

class CrudCliente extends Cliente {

    private $db = "";

    function __construct() {
        parent::__construct();
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
        $stmt->bindValue(':timestamp', date("Y-m-d H:i:s"), PDO::PARAM_STR);
        $retorno = $stmt->execute();
        
        $this->id = DB::lastId($this->tabela, cli_id);
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
    }

    public function excluir() {
        $sql = "DELETE FROM Clientes WHERE cli_id = ?";
        $stmt = DB::prepare($sql);


        $stmt->execute(array($this->id));
    }

    public static function getByDocumento($docNumero) {
        

        $sql = "SELECT * FROM Clientes WHERE cli_docNumero = :docNo";

        $stmt = DB::prepare($sql);

        $stmt->bindValue(':docNo', $docNumero, PDO::PARAM_STR);

        //cli_id	cli_cep	cli_nome	cli_tipo	cli_bairro	cli_timestamp	cid_id

        $cli = new CrudCliente();
        $stmt->setFetchMode(PDO::FETCH_INTO, $cli);
        $stmt->execute();
        $cliFinded = $stmt->fetch(PDO::FETCH_INTO);
        $stmt->closeCursor();

        $cli->docNumero = $cliFinded->cid_docnumero;
        $cli->docTipo = $cliFinded->cli_doctipo;
        $cli->fantasia = $cliFinded->cli_fantasia;
        $cli->id = $cliFinded->cli_id;
        $cli->responsavel = $cliFinded->cli_responsavel;
        $cli->timestamp = $cliFinded->cli_timestamp;
        
        
        return $cli;
    }

}
