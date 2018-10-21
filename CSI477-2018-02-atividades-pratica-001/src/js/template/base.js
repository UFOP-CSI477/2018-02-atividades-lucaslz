var base = function () {
    var ini = `
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="mt-5 mb-5 text-center display-5" id="titulo-principal"></h1>
                </div>
                <div id="alertar-danger" class="col-sm-12 text-center" style="display: none;">
                    <div class="alert alert-danger" role="alert">
                        <b>Preencha todos os campos !!!</b>
                    </div>
                </div>
                <div id="alertar-success" class="col-sm-12 text-center" style="display: none;">
                    <div class="alert alert-success" role="alert">
                            <b>Competidor Cadastrado !!!</b>
                        </div>
                    </div>
                    <div id="info" class="col-sm-12 mt-2 mb-5 text-center"></div>
                    <div class="col-sm-12">
                        <div id="corpo">
                            <div class="alert alert-primary mt-5" role="alert">
                                <h1 class="text-center">App Competição!!!</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div id="espaco-modal"></div>
    `;

    $("main").html(ini);
};