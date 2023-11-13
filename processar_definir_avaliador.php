<?php
// processar_definir_avaliador.php

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Conectar ao banco de dados (substitua com suas próprias configurações)
    include ("conexao.php");

    // Obter valores do formulário
    $acao_id = $_POST["acao_id"];
    $avaliador_id = $_POST["avaliador_id"];

    // Inserir dados na tabela de associação (substitua com sua própria tabela)
    $sql = "INSERT INTO acoes_e_avaliador (acao_id, usuario_id) VALUES ('$acao_id', '$avaliador_id')";

    if ($conn->query($sql) === TRUE) {
        echo "Avaliador atribuído com sucesso.";
    } else {
        echo "Erro ao atribuir avaliador: " . $conn->error;
    }

    // Fechar a conexão
    $conn->close();
} else {
    // Redirecionar se o formulário não foi enviado
    header("Location: outra-pagina.html");
    exit();
}
?>
