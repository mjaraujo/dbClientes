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
    var dados = "acao=buscarCEP" +
            "&cep=" + document.getElementById("cep").value;
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

            var ret = xmlhttp.responseText;
            alert(ret);
            ret = ret.split(":");
            if (ret[0] == "1") {
                document.getElementById('logradouro').placeholder = "Informe o logradouro";
                document.getElementById('logradouro').removeAttribute("readonly");
                document.getElementById('cidade').placeholder = "Informe a cidade";
                document.getElementById('cidade').removeAttribute("disabled");
                document.getElementById('tipoLogradouro').removeAttribute("disabled");
                document.getElementById('bairro').removeAttribute("disabled");
                document.getElementById('numero').removeAttribute("disabled");
                document.getElementById('complemento').removeAttribute("disabled");
                document.getElementById('uf').removeAttribute("disabled");
            }
        }
    }

    xmlhttp.open('POST', './cadastros/ManipularLogradouro.php', true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send(dados);
}

function editarCliente(idCli) {

    var row = document.getElementById("linha" + idCli);
    alert("o cliente " + idCli + " será editado");
    try {
        var xmlhttp = new XMLHttpRequest();
        var dados = "acao=editar"
                + "&id_cli=" + idCli
                + "&nome=" + prompt("Nome", "Digite seu nome")
                + "&responsavel=" + prompt("Responsável", "Digite o nome do responsável")
                + "&tipoDoc=" + prompt("Tipo do documento", "CPF, RG ou CNH")
                + "&numDoc=" + prompt("Numero do documento", "Digite o número do documento");
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var ret = xmlhttp.responseText;
                alert(ret);
            }
        };
        xmlhttp.open('POST', './cadastros/ManipularCliente.php', true);
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
                + "&cli_nome=" + document.forms[0]["nome"].value
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
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var result = document.getElementById('result');
                result.innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open('POST', './cadastros/ManipularCliente.php', true);
        xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xmlhttp.send(dados);
        //carregarDados();
    } catch (err) {
        alert(err);
        return;
    }
}
