<?php

include_once ('../classes/Endereco.php');
include_once '../bd/DB.php';

class CrudEndereco extends Endereco {

    function __construct() {
        parent::__construct();
    }

    public function inserir() {
        $sql = "INSERT INTO Enderecos (end_complemento, end_numero, cli_id, log_id)"
                . "VALUES(:complemento, :numero, :cliId, :logId)";
        $stmt = DB::prepare($sql);
        echo $sql;
        $stmt->bindValue(':complemento', $this->endComplemento, PDO::PARAM_STR);
        $stmt->bindValue(':numero', $this->endNumero, PDO::PARAM_STR);
        $stmt->bindValue(':cliId', $this->cliId, PDO::PARAM_STR);
        $stmt->bindValue(':logId', $this->logId, PDO::PARAM_STR);
        $retorno = $stmt->execute();

        $this->id = DB::lastId($this->tabela, 'end_id');
    }

    public static function getByCepELogradouro($nomeUF) {

        $sql = "SELECT * FROM " + $this->tabela + " WHERE cid = :nomeUF";

        $stmt = DB::prepare($sql);

        $stmt->bindValue(':nomeUF', $nomeUF, PDO::PARAM_STR);

        $est = new CrudEstado();
        $stmt->setFetchMode(PDO::FETCH_INTO, $est);
        $stmt->execute();
        $estFinded = $stmt->fetch(PDO::FETCH_INTO);
        $stmt->closeCursor();

        $est->id = $estFinded->est_id;
        $est->nome = $estFinded->est_nome;
        $est->timestamp = $estFinded->est_timestamp;

        return $est;
    }

    public static function getByCliId($cliID) {


        $sql = "SELECT * FROM Enderecos WHERE cli_id = :cliId";

        $stmt = DB::prepare($sql);

        $stmt->bindValue(':cliId', $cliID, PDO::PARAM_STR);


        $end = new CrudEndereco();
        $stmt->setFetchMode(PDO::FETCH_INTO, $end);
        $stmt->execute();
        $endFinded = $stmt->fetch(PDO::FETCH_INTO);
        $stmt->closeCursor();

        $end->cliId = $endFinded->cl_id;
        $end->endComplemento = $endFinded->end_complemento;
        $end->endNumero = $endFinded->end_numero;
        $end->id = $endFinded->end_id;
        $end->logId = $endFinded->log_id;

        return $end;
    }

    public function excluir() {
        $sql = "DELETE FROM Enderecos WHERE end_id = ?";
        $stmt = DB::prepare($sql);


        $stmt->execute(array($this->id));
    }

}

?>