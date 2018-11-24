// Inicializando o sistema quando carregar o script
$(document).ready(function(){
	tratarPreco();
});

/**
 * Modifica o designer dos precos
 */
function tratarPreco () {
	var tdPreco = $(".preco");

	for (var i = 0; i < tdPreco.length; i++) {
		var precoCerto = "R$ " + $(tdPreco[i]).text();
		$(tdPreco[i]).text(precoCerto);		
	}
};
