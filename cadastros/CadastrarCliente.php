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

debug_to_console( "Test" );
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
    
function debug_to_console( $data ) {
    $output = $data;
    if ( is_array( $output ) )
        $output = implode( ',', $output);

    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
}