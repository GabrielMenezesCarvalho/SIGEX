



















// Função para adicionar uma nova linha à tabela
function adicionarLinha() {
    var table = document.getElementById("dataTable");
    var row = table.insertRow(table.rows.length);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);

    // Utilize as classes de estilo do Bulma para os inputs e divs de controle
    cell1.innerHTML = '<div class="control"><input type="text" class="input" name="atividade[]" placeholder="Atividades Planejadas"></div>';
    cell2.innerHTML = '<div class="control"><input type="text" class="input" name="periodo[]" placeholder="Período"></div>';
    cell3.innerHTML = '<div class="control"><input type="text" class="input" name="local[]" placeholder="Local"></div>';
}

// Função para serializar os dados da tabela e enviar para o servidor
function salvarDados() {
    var formData = [];
    var table = document.getElementById("dataTable");

    // Loop através das linhas da tabela, começando da terceira linha (índice 2)
    for (var i = 1; i < table.rows.length; i++) {
        var rowData = {
            atividade: table.rows[i].cells[0].getElementsByTagName("input")[0].value,
            periodo: table.rows[i].cells[1].getElementsByTagName("input")[0].value,
            local: table.rows[i].cells[2].getElementsByTagName("input")[0].value,
        };

        formData.push(rowData);
    }

    // Enviar os dados para o servidor usando AJAX (você pode ajustar isso de acordo com sua lógica de servidor)
    $.ajax({
        type: "POST",
        url: "salvar_dados.php",
        data: { dados: JSON.stringify(formData) },
        success: function(response) {
            alert("Dados salvos com sucesso!");
        },
        error: function(error) {
            console.error("Erro ao salvar dados:", error);
        }
    });
}


