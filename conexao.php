<?php

// Configurações de conexão com o banco de dados
$host = "localhost"; // Host do banco de dados
$usuario = "root"; // Nome de usuário do banco de dados
$senha = ""; // Senha do banco de dados
$banco = "sislogin"; // Nome do banco de dados que você deseja conectar

// Criação da conexão
$conn = new mysqli($host, $usuario, $senha, $banco);

// Verifica se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Força o conjunto de caracteres para UTF-8
if (!$conn->set_charset("utf8")) {
    printf("Erro ao definir o conjunto de caracteres para UTF-8: %s\n", $conn->error);
    exit();
}


?>
