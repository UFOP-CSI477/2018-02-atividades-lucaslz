// $(document).ready(function(){
    var db = openDatabase('comp', '1.0', 'Test DB', 2 * 1024 * 1024); 

    db.transaction(function (tx) {   
       tx.executeSql('CREATE TABLE IF NOT EXISTS competicao (id unique, nome, tempo, largada)');
       tx.executeSql('CREATE TABLE IF NOT EXISTS tabela_imc (id unique, qtde_ini, qtde_fin, classificacao)'); 

        //Incluindo dados para iniciar a aplicacao
        tx.executeSql('INSERT INTO tabela_imc (id, qtde_ini, qtde_fin, classificacao) VALUES (1, 0, 18.5, "Subnutrição")');
        tx.executeSql('INSERT INTO tabela_imc (id, qtde_ini, qtde_fin, classificacao) VALUES (2, 18.5, 24.5, "Peso Saudável")');
        tx.executeSql('INSERT INTO tabela_imc (id, qtde_ini, qtde_fin, classificacao) VALUES (3, 25.0, 29.9, "Sobrepeso")');
        tx.executeSql('INSERT INTO tabela_imc (id, qtde_ini, qtde_fin, classificacao) VALUES (4, 30.0, 34.9, "Obesidade Grau 1")');
        tx.executeSql('INSERT INTO tabela_imc (id, qtde_ini, qtde_fin, classificacao) VALUES (5, 35.0, 39.9, "Obesidade Grau 2")');
        tx.executeSql('INSERT INTO tabela_imc (id, qtde_ini, qtde_fin, classificacao) VALUES (6, 40.0, 40.0, "Obesidade Grau 3")');

    });

    var dbSelect = function (tabela, arrayCampos) {
        let campos = "";
        let dados = [];
    
        for (let index = 0; index < arrayCampos.length; index++) {
            if (!arrayCampos[index + 1]) campos += arrayCampos[index];
            else campos += arrayCampos[index] + ", ";
        }
    
        db.transaction(function (tx) {
            if (!campos) campos = "*";
    
            tx.executeSql('SELECT ' + campos + ' FROM ' + tabela, [], function (tx, results) { 
               var len = results.rows.length, i; 
           
               for (i = 0; i < len; i++) { 
                  dados.push((results.rows.item(i))); 
               } 
           
            }, null); 
        });
    
        return dados;
    };

    var dbInsert = function (tabela, arrayCampos, arrayValues) {

        let campos = "";
        let values = "";
    
        for (let index = 0; index < arrayCampos.length; index++) {
            if (!arrayCampos[index + 1]) campos += arrayCampos[index];
            else campos += arrayCampos[index] + ", ";
        }
        
        for (let index = 0; index < arrayValues.length; index++) {
            if (!arrayValues[index + 1]) values += arrayValues[index];
            else values += arrayValues[index] + ", ";
        }

        var query = 'INSERT INTO ' + tabela + ' (' + campos + ') VALUES (' + values + ')';

        db.transaction(function (tx) {
            tx.executeSql(query); 
        }); 
    }
// });