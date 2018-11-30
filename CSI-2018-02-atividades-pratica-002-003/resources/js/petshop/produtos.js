var cadastrarProduto = function () {

	//Pegando os valores do input
	var produto = {
		"nome": $("#nomeProduto").val(),
		"preco": $("#precoProduto").val(),
		"imagem": $("#imagemProduto").val(),
	};

	//submetendo o formulario
	$("#formProduto").submit();
};

var chamarModal = function () {
	$('#cadastrarProduto').modal('toggle');
};
