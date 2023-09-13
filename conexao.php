<?php

// Configurações de conexão com o banco de dados
$host = "localhost"; // Host do banco de dados
$usuario = "root"; // Nome de usuário do banco de dados
$senha = ""; // Senha do banco de dados
$banco = "sislogin"; // Nome do banco de dados que você deseja conectar

$conn = new MySqli($host, $usuario, $senha, $banco);

// Verifica se a conexão foi bem-sucedida
if (!$conn) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}
?>