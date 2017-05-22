<?php

include_once ('../classes/Logradouro.php.php');
include_once '../bd/DB.php';
class CrudLogradouro extends Logradouro {
    
    public function __construct($log_cep, $log_nome, $log_tipo, $log_bairro, $log_timestamp, $cid_id) {
        parent::__construct($log_cep, $log_nome, $log_tipo, $log_bairro, $log_timestamp, $cid_id);
    }
    
    function buscarPeloCEP($CEP) {
        $sql = 'SELECT * from Logradouro WHERE log_cep = ' . $CEP;
        $stmt = DB::prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $stmt->execute();
        
        $r = $stmt->fetch(PDO::FETCH_OBJ, PDO::FETCH_ORI_FIRST);
        
        return $r["log_nome"];
                
                
    }

    //put your code here
}
