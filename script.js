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
    cell3.innerHTML = '<div class="control"><input type="text" class="input" name="localidade[]" placeholder="Local"></div>';
}