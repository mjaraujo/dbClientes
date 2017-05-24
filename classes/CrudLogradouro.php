<?php

include_once ('../classes/Logradouro.php');
include_once '../bd/DB.php';

class CrudLogradouro extends Logradouro {

    public function __construct($log_cep, $log_nome, $log_tipo, $log_bairro, $log_timestamp, $cid_id) {
        parent::__construct($log_cep, $log_nome, $log_tipo, $log_bairro, $log_timestamp, $cid_id);
    }

    function buscarPeloCEP($CEP) {
        $instance = new self("", "", "", "", "", "");

        $sql = 'SELECT * from Logradouros WHERE log_cep = ' . $CEP;
        $stmt = DB::prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $stmt->execute();

        $r = $stmt->fetch(PDO::FETCH_OBJ, PDO::FETCH_ORI_FIRST);
        if ($r == FALSE) {
            echo '1:CEP não cadastrado';
        } else {
            echo var_dump($r[0]);
        }
        



        return $instance;
    }

    //put your code here
}
