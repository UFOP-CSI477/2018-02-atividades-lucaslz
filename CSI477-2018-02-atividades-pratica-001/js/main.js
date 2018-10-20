/** 
 * Controle do sistema 
 */

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
        
    //Validando os dados
    if (!nome) {
        console.log("Nome Esta Vazio");
        if (!tempo) {
            console.log("Tempo Esta Vazio");
        }
    } else if (!tempo) {
        console.log("Tempo Esta Vazio");
    } else {
        return {
            "nome": nome,
            "tempo": tempo
        };
    }
};

//Funcao paracadastrar um competidor
var cadastrarCompetidor = function () {
    var dados = pegarDadosInput();
    if (dados) {
        localStorage.setItem("nome", dados.nome);
        console.log(dados.nome);
    }
    dbInsert("tabela_imc", ["id", "qtde_ini", "qtde_fin", "classificacao"], ["7", "80", "80", "Morto"]);
};