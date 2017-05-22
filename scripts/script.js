function carregarDados() {

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var result = document.getElementById('result');
            result.innerHTML = xmlhttp.responseText;
        }
    }

    xmlhttp.open('GET', 'listarClientes.php', true);
    xmlhttp.send();
}

function verificarCEP() {
    
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var result = document.getElementById('result');
            result.innerHTML = xmlhttp.responseText;
        }
    }

    xmlhttp.open('GET', 'manipularEndereco.php', true);
    xmlhttp.send();
    
    document.getElementById('cep').removeAttribute('disabled');
    
}

function editarCliente(idCli) {

    var row = document.getElementById("linha" + idCli);
    alert("o cliente " + idCli + " será editado");
    try {
        var xmlhttp = new XMLHttpRequest();
        var dados = "acao=editar"
                + "&id_cli=" + idCli
                + "&nome=" + prompt("Nome", "Digite seu nome")
                + "&responsavel=" + prompt("Responsável","Digite o nome do responsável")
                + "&tipoDoc=" + prompt("Tipo do documento", "CPF, RG ou CNH")
                + "&numDoc=" + prompt("Numero do documento" , "Digite o número do documento");

        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                alert(xmlhttp.responseText);
            }
        };

        xmlhttp.open("POST", "./cadastros/ManipularCliente.php", true);
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send(dados);
        carregarDados();
        
    } catch (err) {
        alert(err);
        return;
    }
    row.parentNode.removeChild(row);
   
}



function apagarCliente(idCli) {

    var row = document.getElementById("linha" + idCli);
    alert("o cliente " + idCli + " será apagado");
    try {
        var xmlhttp = new XMLHttpRequest();
        var dados = "acao=excluir"
                + "&id_cli=" + idCli;

        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                alert(xmlhttp.responseText);
            }
        };

        xmlhttp.open("POST", "./cadastros/ManipularCliente.php", true);
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send(dados);
        
        //carregarDados();
    } catch (err) {
        alert(err);
        return;
    }
    row.parentNode.removeChild(row);
   

}
/**
 * Função para o envio de dados
 * @returns {undefined}
 */
function cadastrarCliente() {
    try {
        var xmlhttp = new XMLHttpRequest();
        var dados = "acao=cadastrar"
                + "&nome=" + document.forms[0]["nome"].value
                + "&responsavel=" + document.forms[0]["responsavel"].value
                + "&tipoDoc=" + document.forms[0]["tipoDoc"].value
                + "&numDoc=" + document.forms[0]["numDoc"].value;

        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                alert(xmlhttp.responseText);
            }
        };

        xmlhttp.open("POST", "./cadastros/ManipularCliente.php", true);
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send(dados);
        //carregarDados();
    } catch (err) {
        alert(err);
    }
}
