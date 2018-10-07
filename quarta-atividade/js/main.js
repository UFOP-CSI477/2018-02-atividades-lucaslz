/**
 * Imitando o metodo do jquery 
 * 
 * Não criei essa funcao com o simbolo $, porque 
 * ele já esta sendo usado pelo jquery na pagina 
 */
a = function (paramentro) {
    return document.querySelector(paramentro);
};

//Metodo que inicializara todas as funcoes do sistemas
document.addEventListener('DOMContentLoaded', function(){
    esconderCampos();
    resetarInputs();
});

//Metodo para mostrar a outra parte do formulario
carregarDepoisDoSelect = function () {
    var mais = a("#maisDados");
    mais.style.display = "block";
};

//Metodo responsavel por controlar visibilidade de campos
esconderCampos = function () {
    //Escondendo os resto do formulario
    var mais = a("#maisDados");
    mais.style.display = "none";

    //Quando carregar a pagina o seleciona sempre ficara selecionado
    var select = a("#cidade");
    select[0].setAttribute("selected", "true");
};

//Metodo para limpar todos os inputs ao recarregar a pagina
resetarInputs = function () {
    a("#cadastrar").reset();
};

/***************************************************************/
/**************** Validando os formularios *********************/
/***************************************************************/

//Escuta o campo select do input
a("#nome").addEventListener("input", function() {
    var string = this.value.match(/[0-9]+/);
    
    if (string && string.length > 0) {
        a("#msgNome").innerHTML = "Digite somente letras.";
        a("#confirmar").setAttribute("disabled", "");
    }else {
        a("#msgNome").innerHTML = "";
        a("#confirmar").removeAttribute("disabled");
    }
});
