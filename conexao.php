<?php
// Configurações de conexão com o banco de dados
$host = "localhost"; // Host do banco de dados
$usuario = "root";   // Nome de usuário do banco de dados
$senha = "159357";    // Senha do banco de dados
$banco = "testando"; // Nome do banco de dados que você deseja conectar

// Cria uma conexão com o banco de dados MySQL
$conexao = mysqli_connect($host, $usuario, $senha, $banco);

// Verifica se a conexão foi bem-sucedida
if (!$conexao) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}
?>
