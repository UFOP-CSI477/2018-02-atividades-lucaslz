var carregarImc = function () {

    var imc = `
        <form id="form-competicao">
            <div class="col-md-12 text-center mb-3">
                <button class="btn btn-primary" type="button" onclick="calcularImc();">Calcular IMC</button>
                <button class="btn btn-warning" type="button" onclick="chamarPagina('imc');">Atualizar</button>            
            </div>
            <span id="imc">
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="peso">Peso</label>
                        <input type="number" class="form-control" id="peso" placeholder="000.00" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="altura">Altura</label>
                        <input type="number" class="form-control" id="altura" placeholder="0.00" required>
                    </div>
                </div>
            </span>
        </form>

        <div class="col-md-12 mb-3">
            <div class="card-deck">
                <div class="card border-info">
                    <div class="card-body">
                        <table class="table table-striped table-hover text-center" id="imc">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">IMC</th>
                                    <th scope="col">Classificação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Abaixo de 18,5</td>
                                    <td>Subnutrição</td>
                                </tr>
                                <tr>
                                    <td>Entre 18,5 e 24,9</td>
                                    <td>Peso Saudável</td>
                                </tr>
                                <tr>
                                    <td>Entre 25,0 e 29,9</td>
                                    <td>Sobrepeso</td>
                                </tr>
                                <tr>
                                    <td>Entre 30,0 e 34,9</td>
                                    <td>Obesidade Grau 1</td>
                                </tr>
                                <tr>
                                    <td>Entre 35,0 e 39,9</td>
                                    <td>Obesidade Grau 2</td>
                                </tr>
                                <tr>
                                    <td>Acima de 40</td>
                                    <td>Obesidade Grau 3</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="p-3 mb-2 card-footer bg-info text-white border-info text-center">
                        <b>Tabela de Classificação do IMC</b>
                    </div>
                </div>
                <div class="card border-success">
                    <div class="card-body">
                        <h5 class="card-title text-center">Resultado da Sua Classificação !!!</h5>
                        <p class="card-text mt-5 text-center" id="texto-card">
                            Seu peso ideal è: <span id="pesoIdeal"></span><br />
                            Sua classificação è: <span id="classificacao"></span>
                        </p>
                    </div>
                    <div class="p-3 mb-2 card-footer bg-success text-white border-success text-center">
                        <b>Seu IMC é: <span id="seuImc">0.00</span></b>
                    </div>
                </div>
            </div>
        </div>
    `;

    $("#info").hide();
    $("#alertar-danger").hide();
    $("#alertar-success").hide();
    $('#titulo-principal').text("Calculo do IMC !!!");
    $("#corpo").html(imc);
    $('#peso').mask('000.00');
    $('#altura').mask('0.00');
};