var carregarCompeticaoFinal = function () {

    //Fechando o modal
    $("#modal-jogadores").modal("hide");

    //Pegando as linhas da tabelas
    var linhas = $("#tabela").find("tbody").find("tr");
    var jodadores = [];

    for (let index = 0; index < linhas.length; index++) {
        var largada = $(linhas[index]).children('td:first').text();
        var nome = $(linhas[index]).children('td:nth-child(2)').text();
        var tempo = $(linhas[index]).children('td:nth-child(3)').text();

        jodadores.push({"largada": largada, "nome": nome, "tempo": tempo});
    }

    //Ordenando o array do maior para o menor
    jodadores.sort(function(obj1, obj2) {return obj1.tempo - obj2.tempo;});

    var competicaoFinal = `
        <div id="tabela" class="table-responsive">
            <table class="table table-striped table-hover">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Posição</th>
                <th scope="col">Largada</th>
                <th scope="col">Competidor (a)</th>
                <th scope="col">Tempo (s)</th>
                <th scope="col">Resultado</th>
            </tr>
            </thead>
            <tbody></tbody>
        </div>
    `;

    //Montando Tela
    $("#info").hide();
    $("#alertar-danger").hide();
    $("#alertar-success").hide();
    $('#titulo-principal').text("Competição de Carrinhos de Rolimã !!!");
    $("#corpo").html(competicaoFinal);

    var tr = "";
    //Imprimindo o resultado final
    for (let index = 0; index < jodadores.length; index++) {
        
        //Montando linha do resultado
        tr += "<tr>";
        tr += "<td>" + (index + 1) + "</td>";
        tr += "<td>" + jodadores[index].largada + "</td>";
        tr += "<td>" + jodadores[index].nome + "</td>";
        tr += "<td>" + jodadores[index].tempo + "</td>";
        if ( (index + 1) <= 2) tr += "<td> Vencedor(a) !</td>";
        else  tr += "<td></td>";
        tr += "</tr>";

        //adicionando linha na tabela
        $("#tabela").find("tbody").append(tr);

        //Limpando a linha
        tr = "";
    }
};