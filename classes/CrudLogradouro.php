<?php

include_once ('../classes/Logradouro.php');
include_once '../bd/DB.php';

class CrudLogradouro extends Logradouro {

   
    public function __construct() {
         parent::__construct();
    }

    public function buscarPeloCEP($CEP) {
        $instance = new self("", "", "", "", "", "");

        $sql = 'SELECT * from Logradouros WHERE log_cep = ' . $CEP;
        $stmt = DB::prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $stmt->execute();

        $r = $stmt->fetch(PDO::FETCH_OBJ, PDO::FETCH_ORI_FIRST);
        if ($r == FALSE) {
            echo '1:CEP não cadastrado';
        } 




        return $instance;
    }

    public  static function getByCEP($cep) {

        echo $cep;

        $sql = "SELECT * FROM Logradouros WHERE log_cep = :cep";

        $stmt = DB::prepare($sql);

        $stmt->bindValue(':cep', $cep, PDO::PARAM_STR);
        
        //log_id	log_cep	log_nome	log_tipo	log_bairro	log_timestamp	cid_id
        
        $log = new CrudLogradouro();
        $stmt->setFetchMode(PDO::FETCH_INTO, $log);
        $stmt->execute();
        $logFinded = $stmt->fetch(PDO::FETCH_INTO);
        $stmt->closeCursor();
       
        $log->cidId = $logFinded->cid_id;
        $log->logBairro = $logFinded->log_bairro;
        $log->logCep = $logFinded->log_cep;
        $log->logId = $logFinded->log_id;
        $log->logNome = $logFinded->log_nome;
        $log->logTimestamp = $logFinded->log_timestamp;
        $log->logTipo = $logFinded->log_tipo;
       
        
        return $log;
    }
  
    public function inserir() {
        $sql = "INSERT INTO Logradouros (log_cep, log_nome, log_tipo, log_bairro, log_timestamp, cid_id) "
                . "VALUES(:cep, :nome, :tipo, :bairro, :timestamp, :cidId)";
        $stmt = DB::prepare($sql);
        echo $sql;
        $stmt->bindValue(':cep', $this->logCep, PDO::PARAM_STR);
        $stmt->bindValue(':nome', $this->logNome, PDO::PARAM_STR);
        $stmt->bindValue(':tipo', $this->logTipo, PDO::PARAM_STR);
        $stmt->bindValue(':bairro', $this->logBairro, PDO::PARAM_STR);
        $stmt->bindValue(':timestamp', date("Y-m-d H:i:s"), PDO::PARAM_STR);
        $stmt->bindValue(':cidId', $this->cidId, PDO::PARAM_STR);
        $retorno = $stmt->execute();

        $this->logId = DB::lastId($this->tabela, log_id);
    }

    //put your code here
}
