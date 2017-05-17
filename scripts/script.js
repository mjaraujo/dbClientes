function carregarDados() {

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var result = document.getElementById('result');
            result.innerHTML = xmlhttp.responseText;
        }
    }

    xmlhttp.open('GET', 'listarAlunos.php', true);
    xmlhttp.send();

}



/**
 * Função para o envio de dados
 * @returns {undefined}
 */
function cadastrarCliente() {
    var req = new XMLHttpRequest();
    var dados = "nome=" + document.forms[0]["nome"].value
    + "&responsavel=" + document.forms[0]["responsavel"].value
    + "&tipoDoc=" + document.forms[0]["tipoDoc"].value
    + "&numDoc=" + document.forms[0]["numDoc"].value;

    req.onreadystatechange = function name() {
        if (req.readyState == 4 && req.status == 200) {
            document.forms[0][1].value = "";
            carregarDados();
       }
    }
    req.open("POST", "../cadastros/CadastrarCliente", true);
    
    req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    req.send(dados);

    carregarDados();

}
