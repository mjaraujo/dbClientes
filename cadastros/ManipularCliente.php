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

    $fantasia = $_POST['nome'];
    $responsavel = $_POST['responsavel'];
    $docTipo = $_POST['tipoDoc'];
    $docNumero = $_POST['numDoc'];

    $cli = new CrudCliente($fantasia, $responsavel, $docTipo, $docNumero);

    $cli->inserir();
}

function editar() {
    echo "iiiiiiiii:" + $_POST['id_cli'];
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
    echo "hhhhhhhh:" . $id;
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
