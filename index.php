<!doctype html>
<?php
/*
  require_once './connect.php';
  if (isset($_GET['ra']) && !empty($_GET['ra'])) {
  $ra = $_GET['ra'];
  $rsAl = $con->query('SELECT * FROM alunos WHERE al_ra =' . $ra);
  echo('SELECT * FROM alunos WHERE al_ra=' . $ra);
  echo('<pre>');
  var_dump($rsAl);
  echo('</pre>');
  if ($rsAl->rowCount() > 0) {
  $aluno = $rsAl->fetch(PDO::FETCH_OBJ);
  }
  $acaoForm = 'editar';
  } else {
  $acaoForm = 'novo';
  } */
?>

<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="scripts/script.js"></script>
        <title></title>
    </head>
    <body onload="carregarDados()">

        <fieldset>
            <legend>Cadastrar cliente</legend>

            <form id="form" name="cadCli" method="post" action="#" onsubmit="cadastrarCliente()">
                <label for="nome" >Nome</label>
                <input type="text" name="nome" id="nome">
                <label for="responsavel">Responsável</label>
                <input type="text" name="responsavel" id="responsavel">
                <label for="tipoDoc">Tipo do documento</label>
                <select name="tipoDoc" id="tipoDoc">
                    <option value="rg">RG</option>
                    <option value="cpf">CPF</option>
                    <option value="cnpj">CNPJ</option>
                    <option value="cnh">CNH</option>
                </select>
                <label for="numDoc">Número do documento:</label>
                <input type="text" name="numDoc" id="numdoc">
                <input type="checkbox" id="cepUnico" name="cepUnico"> Cep único
                <label for="CEP">CEP</label>
                <input type="text" name="cep" id="cep" onblur="verificarCEP()">
                <label for="logradouro">Logradouro:</label>
                <select name="tipoLogradouro" id="tipoLogradouro">
                    <option value="rua">Rua</option>
                    <option value="avenida">Avenida</option>
                    <option value="alameda">Alameda</option>
                    <option value="praca">Praça</option>
                </select>
                <input type="text" name="logradouro" id="logradouro" readonly>
                <label for="uf">UF:</label>
                <select name="uf" id="uf" disabled="true">
                    <option value="PR">PR</option>
                    <option value="SP">SP</option>
                    <option value="RS">RS</option>
                    <option value="SC">SC</option>
                </select>                    
                <label for="numero">Nº</label>
                <input type="text" name="numero" id="numero">
                <label for="complemento">Complemento</label>
                <input type="text" name="complemento" id="complemento">
                <label for="bairro">Bairro</label>
                <input type="text" name="bairro" id="bairro">
                <label for="cidade">Cidade</label>
                <input type="text" name="cidade" id="cidade">
                
                <input type="hidden" value="cadCli" name="cadCli">
                <button type="submit" >Salvar</button>
            </form>
            <span></span>
        </fieldset>
        <h2><?php
            if (isset($_GET['status'])) {
                if ($_GET['status'] == 0) {
                    echo ('Não foi possivel realizar a ação');
                } elseif ($_GET['status'] == 1) {
                    echo 'Operação realizada com sucesso';
                } else {
                    echo 'Dados Inválidos';
                }
            }
            ?></h2>


        <div class="row">
            <table class="table "> 
                <thead> 
                    <tr> 
                        <th>#</th> 
                        <th>Nome</th> 
                        <th>Responsável</th> 
                        <th>Tipo Documento</th> 
                        <th>Numero documento</th> 
                    </tr> 
                </thead> 
                <tbody id="result"> 

                </tbody> 
            </table>
        </div>

        <p class="inseriu"></p>
        
            
        </div>

            

    </body>
</html>