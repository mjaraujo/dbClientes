<?php

include_once ('../classes/Cidade.php');
include_once '../bd/DB.php';

class CrudCidade extends Cidade {

    function __construct() {
        parent::__construct();
    }

    public  static function getByNomeEIdEstado($cidNome, $estId) {

        echo $cidNome . ': ' . $estId;

        $sql = "SELECT * FROM Cidades WHERE cid_nome = :nomeCid AND est_id = :estId";

        $stmt = DB::prepare($sql);

        $stmt->bindValue(':nomeCid', $cidNome, PDO::PARAM_STR);
        $stmt->bindValue(':estId', $estId, PDO::PARAM_STR);

        $cid = new CrudCidade();
        $stmt->setFetchMode(PDO::FETCH_INTO, $cid);
        $stmt->execute();
        $cidFinded = $stmt->fetch(PDO::FETCH_INTO);
        $stmt->closeCursor();
       
        $cid->cidId = $cidFinded->cid_id;
        $cid->cidNome = $cidFinded->cid_nome;
        $cid->cidTimestamp = $cidFinded->cid_timestamp;
        $cid->estId = $cidFinded->est_id;

        return $cid;
    }

    public function inserir() {
        try {


            $sql = "INSERT INTO Cidades (cid_nome, cid_timestamp, est_id) "
                    . "VALUES(:nome, :timestamp, :est_id)";
            $stmt = DB::prepare($sql);

            $stmt->bindValue(':nome', $this->cidNome, PDO::PARAM_STR);
            $stmt->bindValue(':timestamp', date("Y-m-d H:i:s"), PDO::PARAM_STR);
            $stmt->bindValue(':est_id', $this->estId, PDO::PARAM_STR);
            $retorno = $stmt->execute();
            var_dump($retorno);
            $this->cidId = DB::lastId($this->tabela, cid_id);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
