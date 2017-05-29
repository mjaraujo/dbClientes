<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Logradouro
 *
 * @author marcio
 */

include_once ('Logradouro.php');
class Logradouro {

    protected $tabela = 'Logradouros';
    protected $logId = 0;
    protected $logCep;
    protected $logNome;
    protected $logTipo;
    protected $logBairro;
    protected $logTimestamp;
    protected $cidId;
    
    function __construct() {
        
    }
    
    function getTabela() {
        return $this->tabela;
    }

    function getLog_Id() {
        return $this->logId;
    }

    function getLogCep() {
        return $this->logCep;
    }

    function getLogNome() {
        return $this->logNome;
    }

    function getLogTipo() {
        return $this->logTipo;
    }

    function getLogBairro() {
        return $this->logBairro;
    }

    function getLogTimestamp() {
        return $this->logTimestamp;
    }

    function getCidId() {
        return $this->cidId;
    }

    function setTabela($tabela) {
        $this->tabela = $tabela;
    }

    function setLog_Id($logId) {
        $this->log_Id = $logId;
    }

    function setLogCep($logCep) {
        $this->logCep = $logCep;
    }

    function setLogNome($logNome) {
        $this->logNome = $logNome;
    }

    function setLogTipo($logTipo) {
        $this->logTipo = $logTipo;
    }

    function setLogBairro($logBairro) {
        $this->logBairro = $logBairro;
    }

    function setLogTimestamp($logTimestamp) {
        $this->logTimestamp = $logTimestamp;
    }

    function setCidId($cidId) {
        $this->cidId = $cidId;
    }



}
