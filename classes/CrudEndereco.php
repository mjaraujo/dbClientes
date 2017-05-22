<?php

include_once ('../classes/Endereco.php');
include_once '../bd/DB.php';

class CrudCliente extends Endereco {

    function __construct() {
        parent::__construct($id, $end_complemento, $end_numero, $cli_id, $loc_id);
    }

    
}

?>