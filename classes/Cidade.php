<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cidade
 *
 * @author ALUNO
 */

include_once ('Cidade.php');
class Cidade {
    protected $tabela = 'Cidades';
    protected $cidId = 0;
    protected $cidNome;
    protected $cidTimestamp;
    protected $estId;
            
    function __construct() {
    }

    function getCid_id() {
        return $this->cidId;
    }

    function getCid_nome() {
        return $this->cidNome;
    }

    function getCid_timestamp() {
        return $this->cidTimestamp;
    }

    function getEst_id() {
        return $this->estId;
    }

    function setCid_id($cid_id) {
        $this->cidId = $cid_id;
    }

    function setCid_nome($cid_nome) {
        $this->cidNome = $cid_nome;
    }

    function setCid_timestamp($cid_timestamp) {
        $this->cidTimestamp = $cid_timestamp;
    }

    function setEst_id($est_id) {
        $this->estId = $est_id;
    }


    
}
