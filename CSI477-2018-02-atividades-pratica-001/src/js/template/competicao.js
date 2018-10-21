var carregarCompeticao = function () {

    var competicao = `
        <form id="form-competicao">
            <div class="col-md-12 text-center mb-3">
                <button class="btn btn-primary" type="button" onclick="cadastrarCompetidor();">Cadastrar Competidor</button>
                <button class="btn btn-warning" type="button" onclick="chamarPagina('competicao');">Atualizar Competição</button>            
            </div>
            <span id="cadastro" style="display: none">
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="nome-competidor">Nome do Competidor</label>
                        <input type="text" class="form-control" id="nome-competidor" placeholder="Nome do Competidor" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="tempo">Tempo</label>
                        <input type="number" class="form-control" id="tempo" placeholder="000" required>
                    </div>
                </div>
            </span>
            <div class="form-row">
                <div class="col-md-12 mb-3" id="jogadores">
                    <label for="select-numero-competidores">Numero de Competidores</label>
                    <select class="form-control" id="select-numero-competidores" onchange="controleDeJogadores();">
                    <option value="0">Selecione</option>
                    <option value="1">1 - Jogador</option>
                    <option value="2">2 - Jogadores</option>
                    <option value="3">3 - Jogadores</option>
                    <option value="4">4 - Jogadores</option>
                    <option value="5">5 - Jogadores</option>
                    <option value="6">6 - Jogadores</option>
                  </select>
                </div>
            </div>
        </form>

        <div id="tabela" class="table-responsive">
            <table class="table table-striped table-hover text-center">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Largada</th>
                <th scope="col">Competidor</th>
                <th scope="col">Tempo</th>
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
    $("#corpo").html(competicao);
    $('#tempo').mask('000');
};