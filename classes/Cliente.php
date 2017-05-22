<?php

class Cliente {

    protected $id;
    protected $fantasia;
    protected $responsavel;
    protected $docTipo;
    protected $docNumero;
    protected $timestamp;

    function __construct($fantasia, $responsavel, $docTipo, $docNumero) {

        $this->fantasia = $fantasia;
        $this->responsavel = $responsavel;
        $this->docTipo = $docTipo;
        $this->docNumero = $docNumero;
    }

    
    function getId() {
        return $this->id;
    }

    function getFantasia() {
        return $this->fantasia;
    }

    function getResponsavel() {
        return $this->responsavel;
    }

    function getDocTipo() {
        return $this->docTipo;
    }

    function getDocNumero() {
        return $this->docNumero;
    }

    function getTimestamp() {
        return $this->timestamp;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setFantasia($fantasia) {
        $this->fantasia = $fantasia;
    }

    function setResponsavel($responsavel) {
        $this->responsavel = $responsavel;
    }

    function setDocTipo($docTipo) {
        $this->docTipo = $docTipo;
    }

    function setDocNumero($docNumero) {
        $this->docNumero = $docNumero;
    }

    function setTimestamp($timestamp) {
        $this->timestamp = $timestamp;
    }

}
