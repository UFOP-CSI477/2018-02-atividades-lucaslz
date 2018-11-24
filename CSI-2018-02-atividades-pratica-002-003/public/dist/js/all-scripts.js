// Inicializando o sistema quando carregar o script
$(document).ready(function(){
	activeLinks();
});

/**
 * Controla a classe active link
 */
function activeLinks (){
	var str = window.location.pathname;
	var path = str.substring(1, str.length);
	path = "#" + path;
	$(path).addClass('active');
};
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
