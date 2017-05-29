<?php


class Endereco {

    protected $tabela = 'Enderecos';
    protected $id;
    protected $endComplemento;
    protected $endNumero;
    protected $cliId;
    protected $logId;

    function __construct() {
        
    }

    function getTabela() {
        return $this->tabela;
    }

    function getId() {
        return $this->id;
    }

    function getEndComplemento() {
        return $this->endComplemento;
    }

    function getEnNumero() {
        return $this->endNumero;
    }

    function getCliId() {
        return $this->cliId;
    }

    function getLocId() {
        return $this->logId;
    }

    function setTabela($tabela) {
        $this->tabela = $tabela;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setEndComplemento($endComplemento) {
        $this->endComplemento = $endComplemento;
    }

    function setEnNumero($enNumero) {
        $this->endNumero = $enNumero;
    }

    function setCliId($cliId) {
        $this->cliId = $cliId;
    }

    function setLocId($locId) {
        $this->logId = $locId;
    }

}
