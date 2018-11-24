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