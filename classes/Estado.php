<?php


class Estado {
    protected $id;
    protected $nome;
    protected $timestamp;
    
    function __construct() {
    }

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getTimestamp() {
        return $this->timestamp;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setTimestamp($timestamp) {
        $this->timestamp = $timestamp;
    }



    
    
}