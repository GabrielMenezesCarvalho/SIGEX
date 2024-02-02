<?php
/*
// Iniciar a sessão
session_start();

// Recuperar dados do POST
$dados = json_decode($_POST['dados'], true);

// Conectar ao banco de dados (substitua as informações do banco de dados)
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "sislogin";

$conn = new mysqli($host, $usuario, $senha, $banco);

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Inserir dados na tabela do banco de dados (substitua o nome da tabela)
foreach ($dados as $dado) {
    // Adicionar o nome do usuário da sessão à coluna 'usuario_remetente'
    $usuario_remetente = $_SESSION["nome"];

    $atividade = $conn->real_escape_string($dado['atividade']);
    $periodo = $conn->real_escape_string($dado['periodo']);
    $localidade = $conn->real_escape_string($dado['localidade']);

    $sql = "INSERT INTO tabela_exemplo (atividade, periodo, localidade, usuario_remetente) VALUES ('$atividade', '$periodo', '$localidade', '$usuario_remetente')";

    if ($conn->query($sql) !== true) {
        echo "Erro na inserção de dados: " . $conn->error;
    }
}

// Fechar a conexão com o banco de dados
$conn->close();
*/
?>
