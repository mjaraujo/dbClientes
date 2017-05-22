<?php

class Endereco {

    protected $id;
    protected $end_complemento;
    protected $end_numero;
    protected $cli_id;
    protected $loc_id;
    
    function __construct($id, $end_complemento, $end_numero, $cli_id, $loc_id) {
        $this->id = $id;
        $this->end_complemento = $end_complemento;
        $this->end_numero = $end_numero;
        $this->cli_id = $cli_id;
        $this->loc_id = $loc_id;
    }
    
    function getId() {
        return $this->id;
    }

    function getEnd_complemento() {
        return $this->end_complemento;
    }

    function getEnd_numero() {
        return $this->end_numero;
    }

    function getCli_id() {
        return $this->cli_id;
    }

    function getLoc_id() {
        return $this->loc_id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setEnd_complemento($end_complemento) {
        $this->end_complemento = $end_complemento;
    }

    function setEnd_numero($end_numero) {
        $this->end_numero = $end_numero;
    }

    function setCli_id($cli_id) {
        $this->cli_id = $cli_id;
    }

    function setLoc_id($loc_id) {
        $this->loc_id = $loc_id;
    }



}
