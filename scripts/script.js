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


function apagarCliente(idCli) {

    alert("o cliente " + idCli + "será apagado");

    try {
        var xmlhttp = new XMLHttpRequest();
        var dados = "excluiCli=sim"
                + "&id=" + document.getElementById().value
                + "&responsavel=" + document.forms[0]["responsavel"].value
                + "&tipoDoc=" + document.forms[0]["tipoDoc"].value
                + "&numDoc=" + document.forms[0]["numDoc"].value;

        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                alert(xmlhttp.responseText);
            }
        };

        xmlhttp.open("POST", "./cadastros/CadastrarCliente.php", true);
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send(dados);
        var row = document.getElementById("linha" + idCli);
        row.parentNode.removeChild(row);

        //carregarDados();
    } catch (err) {
        alert(err);
    }


}
/**
 * Função para o envio de dados
 * @returns {undefined}
 */
function cadastrarCliente() {
    try {
        var xmlhttp = new XMLHttpRequest();
        var dados = "cadCli=sim"
                + "&nome=" + document.forms[0]["nome"].value
                + "&responsavel=" + document.forms[0]["responsavel"].value
                + "&tipoDoc=" + document.forms[0]["tipoDoc"].value
                + "&numDoc=" + document.forms[0]["numDoc"].value;

        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                alert(xmlhttp.responseText);
            }
        };

        xmlhttp.open("POST", "./cadastros/CadastrarCliente.php", true);
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send(dados);
        //carregarDados();
    } catch (err) {
        alert(err);
    }
}
