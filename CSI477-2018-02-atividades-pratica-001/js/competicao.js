/** 
 * Template de competicao 
 */

var carregarCompeticao = function () {

    var competicao = `
        <form id="form-competicao">
            <div class="col-md-12 text-center mb-3">
                <button class="btn btn-primary" type="button" onclick="cadastrarCompetidor();">Cadastrar Competidor</button>
                <button class="btn btn-warning" type="button" onclick="novaCompeticao();">Nova Competição</button>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="nome-competidor">Nome do Competidor</label>
                    <input type="text" class="form-control" id="nome-competidor" placeholder="Nome do Competidor" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="tempo">Tempo</label>
                    <input type="number" class="form-control" id="tempo" placeholder="Tempo" required>
                </div>
            </div>
        </form>
    `;

    $('#titulo-principal').text("Competição de Carrinhos de Rolimã !!!");
    $("#corpo").html(competicao);
};