<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClienteController
 *
 * @author ALUNO
 */
require_once ('../classes/CrudCliente.php');
require_once ('../classes/CrudEstado.php');
require_once ('../classes/CrudCidade.php');
require_once ('../classes/CrudLogradouro.php');
require_once ('../classes/CrudEndereco.php');

if (isset($_POST['acao'])) {
    switch ($_POST['acao']) {
        case 'cadastrar':
            inserir();
            break;
        case 'excluir':
            excluir();
            break;
        case 'editar':
            echo 'vai editar';
            editar();
            break;

        default:
            break;
    }
}

function inserir() {


//Estado


    $estNome = $_POST['est_estado'];
    $est = new CrudEstado();
    $est = CrudEstado::getByNome($estNome);

//Cidade

    echo 'oooii';


    $cidNome = $_POST['cid_nome'];
    $cid = new CrudCidade();
    $cid = CrudCidade::getByNomeEIdEstado($cidNome, $est->getId());



    if ($cid->getCid_id() == 0) {
        $cid->setCid_nome($cidNome);
        $cid->setEst_id($est->getId());

        $cid->inserir();
    }


//Logradouro


    $cep = $_POST['log_cep'];

    $log = new CrudLogradouro();

    $log = CrudLogradouro::getByCEP($cep);


    if ($log->getLog_Id() == 0) {
        $bai = $_POST['log_bairro'];
        $logNome = $_POST['log_logradouro'];
        $logTipo = $_POST['log_tipoLogradouro'];

        $log->setCidId($cid->getCid_id());
        $log->setLogBairro($bai);
        $log->setLogCep($cep);
        $log->setLogNome($logNome);
        $log->setLogTipo($logTipo);
        $log->inserir();
    }

    $docNumero = $_POST['cli_numDoc'];
    $cli = new CrudCliente();
    $cli = CrudCliente::getByDocumento($docNumero);
    if ($cli->getId() == 0) {
        $cli->setFantasia($_POST['cli_nome']);
        $cli->setDocTipo($_POST['cli_tipoDoc']);
        $cli->setResponsavel($_POST['cli_responsavel']);
        $cli->setDocNumero($docNumero);

        $cli->inserir();
    }


    /**
     *     + "&cli_nome=" + document.forms[0]["nome"].value
      + "&cli_responsavel=" + document.forms[0]["responsavel"].value
      + "&cli_tipoDoc=" + document.forms[0]["tipoDoc"].value
      + "&cli_numDoc=" + document.forms[0]["numDoc"].value
      + "&log_cep=" + document.forms[0]["cep"].value
      + "&log_tipoLogradouro=" + document.forms[0]["tipoLogradouro"].value
      + "&log_logradouro=" + document.forms[0]["logradouro"].value
      + "&log_bairro=" + document.forms[0]["bairro"].value
      + "&end_numero=" + document.forms[0]["numero"].value
      + "&end_complemento=" + document.forms[0]["complemento"].value
      + "&cid_nome=" + document.forms[0]["cidade"].value
      + "&est_estado=" + document.forms[0]["uf"].value;

     */
//Endereco
    echo var_dump($cli);



    $end = new CrudEndereco();

    $end->setCliId($cli->getId());
    $end->setEnNumero($_POST['end_numero']);
    $end->setEndComplemento($_POST['end_complemento']);
    $end->setLocId($log->getLog_Id());
    echo var_dump($end);
    $end->inserir();
}

function editar() {
    $id = $_POST['id_cli'];
    $fantasia = $_POST['nome'];
    $responsavel = $_POST['responsavel'];
    $docTipo = $_POST['tipoDoc'];
    $docNumero = $_POST['numDoc'];

    $cli = new CrudCliente($fantasia, $responsavel, $docTipo, $docNumero);
    $cli->setId($id);
    $cli->editar();
}

function excluir() {
    
    $id = $_POST['id_cli'];
    
    $end = new CrudEndereco();
    $end = CrudEndereco::getByCliId($id);
    $end->excluir();
    
    
    $cli = CrudCliente::newSoId($id);
    $cli->setId($id);

    $cli->excluir();
}

function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
}
