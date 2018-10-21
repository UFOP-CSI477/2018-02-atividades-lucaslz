//Chamar a pagina correta de acordo com o link
var chamarPagina = function (pagina) {

    //Verificando qual pagina chamar
    if (pagina == "competicao") {
        carregarCompeticao();
    } else if (pagina == "imc") {
        carregarImc();
    }
};

//Pega e valida os dados do input
var pegarDadosInput = function () {
    
    //Pegando os dados do input
    var nome = $("#nome-competidor").val();
    var tempo = $("#tempo").val();

    //esconcendo mensagens
    $("#alertar-danger").hide();
    $("#alertar-success").hide();
        
    //Validando os dados
    if (!nome && !tempo) {
        $("#alertar-danger").show();
    } else if (!tempo || !tempo) {
        $("#alertar-danger").show();
    } else {
        $("#alertar-success").show();
        return {
            "nome": nome,
            "tempo": tempo
        };
    }
};

//Funcao paracadastrar um competidor
var cadastrarCompetidor = function () {
    //Pegando os dados validados
    var dados = pegarDadosInput();

    if (dados) {
        //Pegando o id e somando mais 1
        var id = $("#tabela").find("tr").last().find("td:first-child").text();
        id = parseInt(id);
        
        //Verificando o id e dando a numeracao correta
        if (isNaN(id)) id = 1;
        else id += 1;

        //verifica a quantidade de numero e valida quando necessario
        verificaTotalJogadores();

        //Incluindo nova linha na tabela
        $("#tabela").find("tbody").append(
            "<tr>" +
                "<td> "+ id +" </td> " +
                "<td> "+ dados.nome +" </td> " +
                "<td> "+ dados.tempo +" </td> " +
            "</tr>"
        );

        //Limpando os inputs
        $("#nome-competidor").val("");
        $("#tempo").val("");

        //Colocando foco no primeiro input
        $("#nome-competidor").focus();
    }
};

//Controla o modal quando o numero de jogadores é aceito
var controleModal = function () {

    //Escondendo elementos
    $('#modal-confirmar').modal('hide');
    $("#jogadores").hide();

    //Mostando o cadastro de jogadores
    $("#cadastro").show();

    //Mostrar numero de jogadores
    var num = $("#select-numero-competidores").val();
    $("#info").html(
        "<h2 class='cor-verde'>" +
            "Total de Competidores: <span id='total-jogadores'>" + num + "</span>" +
        "</h2>"

    );
    $("#info").show();
}

//Calcula e mostra os dados do imc
var calcularImc = function () {
    
    //Pegando os dados
    var peso = $("#peso").val();
    var altura = $("#altura").val();

    //Calculando o IMC
    var imc = peso / (altura * altura);
    imc = imc.toFixed(2);
    
    //Colocando o imc no card
    $("#seuImc").text(imc);
    $("#seuImc").addClass("cor-vermelha");

    //Definindo classificacao
    var classificacao = "";
    var linha = 0;
    if (imc < 18.5) {
        classificacao = "Subnutrição";
        linha = 1;
    }else if (imc >= 18.5 && imc <= 24.9) {
        classificacao = "Peso Saudável";
        linha = 2;
    }else if (imc >= 25.5 && imc <= 29.9) {
        classificacao = "Sobrepeso";
        linha = 3;
    }else if (imc >= 30.5 && imc <= 34.9) {
        classificacao = "Obesidade Grau 1";
        linha = 4;
    }else if (imc >= 35.0 && imc <= 39.9) {
        classificacao = "Obesidade Grau 2";
        linha = 5;
    }else if (imc >= 40.0) {
        classificacao = "Obesidade Grau 3";
        linha = 6;
    }else {
        classificacao = "";
    }
    $("#classificacao").text(classificacao);


    //Calculando o peso ideal
    var pesoIdeal = 21.5 * (altura * altura);
    pesoIdeal = pesoIdeal.toFixed(2);
    $("#pesoIdeal").text(pesoIdeal);

    //Pinstando a linha da tabela
    var tr = $('#imc tbody tr:nth-child('+linha+')');
    tr.addClass("p-3 mb-2 bg-success text-white");

}