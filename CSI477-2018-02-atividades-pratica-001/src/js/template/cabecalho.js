var gerarCabecalho = function () {

    var cabecalho = `
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="./app.html">AppComp</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <button type="button" class="btn btn-dark" onclick="chamarPagina('competicao');">Competição</buttton>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="btn btn-dark" onclick="chamarPagina('imc');">Imc</buttton>
                    </li>
                </ul>
            </div>
        </nav>
    `;
    
    //Imprimindo pagina
    $("header").html(cabecalho);
};