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
class Logradouro {

    private $log_cep;
    private $log_nome;
    private $log_tipo;
    private $log_bairro;
    private $log_timestamp;
    private $cid_id;
    
    function __construct($log_cep, $log_nome, $log_tipo, $log_bairro, $log_timestamp, $cid_id) {
        $this->log_cep = $log_cep;
        $this->log_nome = $log_nome;
        $this->log_tipo = $log_tipo;
        $this->log_bairro = $log_bairro;
        $this->log_timestamp = $log_timestamp;
        $this->cid_id = $cid_id;
    }
    
    function getLog_cep() {
        return $this->log_cep;
    }

    function getLog_nome() {
        return $this->log_nome;
    }

    function getLog_tipo() {
        return $this->log_tipo;
    }

    function getLog_bairro() {
        return $this->log_bairro;
    }

    function getLog_timestamp() {
        return $this->log_timestamp;
    }

    function getCid_id() {
        return $this->cid_id;
    }

    function setLog_cep($log_cep) {
        $this->log_cep = $log_cep;
    }

    function setLog_nome($log_nome) {
        $this->log_nome = $log_nome;
    }

    function setLog_tipo($log_tipo) {
        $this->log_tipo = $log_tipo;
    }

    function setLog_bairro($log_bairro) {
        $this->log_bairro = $log_bairro;
    }

    function setLog_timestamp($log_timestamp) {
        $this->log_timestamp = $log_timestamp;
    }

    function setCid_id($cid_id) {
        $this->cid_id = $cid_id;
    }




}
