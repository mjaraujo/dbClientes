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


echo('<pre>');
  var_dump($_POST);
  
if (isset($_POST['cadCli'])) {
    include_once ('../classes/CrudCliente.php');
    
    $fantasia = $_POST['nome'];
    $responsavel = $_POST['responsavel'];
    $docTipo = $_POST['tipoDoc'];
    $docNumero = $_POST['numDoc'];
    
    $cli = new CrudCliente($fantasia, $responsavel, $docTipo, $docNumero);
    
    $cli->inserir();
    

}
    
