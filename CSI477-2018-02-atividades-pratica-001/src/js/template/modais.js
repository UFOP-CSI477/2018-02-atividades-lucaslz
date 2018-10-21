//Controla o numero de jogadores e imprime o modal
var controleDeJogadores = function () {

    var modal = `
        <div class="modal" tabindex="-1" role="dialog" id="modal-confirmar">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title">Confirmar Numero de Jogadores ?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Dejesa confirmar a competição com: <b><span id="num-jogadores"></span></b> jogador(es) ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-success" onclick="controleModal();">Confirmar</button>
                    </div>
                </div>
            </div>
        </div>    
    `;

    //Imprimindo o modal na pagina
    $("#espaco-modal").html(modal);

    //Pegando o value do select e imprimindo no modal
    var num = $("#select-numero-competidores").val();
    $("#num-jogadores").text(num);
    
    //Chamando o modal
    $('#modal-confirmar').modal('show');
};

//vefifica a quantidade de jogadores que estao jogando no momento
var verificaTotalJogadores = function () {

    var numRows = $("#tabela").find("tbody tr").length;

    //Calculando total de jogadores para pegar a quantidade certa
    var totalJogadores = $("#total-jogadores").text();
    totalJogadores = parseInt(totalJogadores);
    totalJogadores = totalJogadores - 1;

    var modalJogadores = `
        <div class="modal" tabindex="-1" role="dialog" id="modal-jogadores">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title">Numero de Jogadores Atingido !!!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-success">
                        <p><b>Dejesa calcular o resultado Final ?</b></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-success" onclick="carregarCompeticaoFinal();">Finalizar</button>
                    </div>
                </div>
            </div>
        </div>    
    `;

    if (numRows >= totalJogadores) {
        //Imprimindo o modal na pagina
        $("#espaco-modal").html(modalJogadores);
        $("#modal-jogadores").modal('show');
    }
};