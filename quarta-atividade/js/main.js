//Metodo que inicializara todas as funcoes do sistemas
$(document).ready(function(){
    esconderCampos();
    resetarInputs();
});

//Metodo para mostrar a outra parte do formulario
carregarDepoisDoSelect = function () {
    $("#maisDados").show();
};

//Metodo responsavel por controlar visibilidade de campos
esconderCampos = function () {
    //Escondendo os resto do formulario
    $("#maisDados").hide();

    //Quando carregar a pagina o seleciona sempre ficara selecionado
    $("#cidade")[0].setAttribute("selected", "true");
};

//Metodo para limpar todos os inputs ao recarregar a pagina
resetarInputs = function () {
    $("#cadastrar")[0].reset();
};

/***************************************************************/
/**************** Validando os formularios *********************/
/***************************************************************/

//Escuta o campo select do input
$("#nome").on("input", function() {
    var string = this.value.match(/[0-9]+/);
    
    if (string && string.length > 0) {
        $("#msgNome").html("Digite somente letras.");
        $("#confirmar").attr("disabled", "");
    }else {
        $("#msgNome").html("");
        $("#confirmar").removeAttr("disabled");
    }
});
