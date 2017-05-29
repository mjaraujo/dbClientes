<?php

require_once ('../classes/CrudLogradouro.php');
//echo '<pre>';
//var_dump($_POST);

if (isset($_POST['acao'])) {
    switch ($_POST['acao']) {
        case 'cadastrar':
            inserir();
            break;
        case 'excluir':
            excluir();
            break;
        case 'editar':
            editar();
            break;
        case 'buscarCEP':
            buscarPeloCEP();
            break;
        default:
            break;
    }
}

function buscarPeloCEP() {
//    echo 'rua das ameixas';
    $cep = $_POST['cep'];
    $logradouro = CrudLogradouro::buscarPeloCEP($cep);
    
    echo $logradouro->getLogNome();
    
}
