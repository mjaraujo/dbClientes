<?php

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

