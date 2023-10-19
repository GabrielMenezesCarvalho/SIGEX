<?php
// Inclui o arquivo de conexão
include("conexao.php");

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Dados do formulário
    $nome = $_POST["nome"];
    $usuario = $_POST["usuario"];
    $email = $_POST["email"];
    $senha = $_POST["senha"]; 
    $tipo = $_POST["tipo"];

    // Verifica se o usuário já existe
    $verificaUsuario = $conn->prepare("SELECT id FROM usuario WHERE usuario = ?");
    $verificaUsuario->bind_param("s", $usuario);
    $verificaUsuario->execute();
    $verificaUsuario->store_result();

    if ($verificaUsuario->num_rows > 0) {
        // Usuário já existe, exibe uma mensagem de erro e redireciona de volta para a página de cadastro
        echo '<script>';
        echo 'alert("O nome de usuário já está em uso. Por favor, escolha outro nome de usuário.");';
        echo 'window.location.href = "novoUsuario.php";'; 
        echo '</script>';
    } else {
        // Usuário não existe, proceda com a inserção
        $verificaUsuario->close();

        // Prepara a declaração SQL para inserção
        $sql = "INSERT INTO usuario (nome, usuario, email, senha, tipo) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        // Verifica se a preparação foi bem-sucedida
        if ($stmt === false) {
            die("Erro na preparação da consulta: " . $conn->error);
        }

        // Binda os parâmetros
        $stmt->bind_param("ssssi", $nome, $usuario, $email, $senha, $tipo);

        // Executa a declaração
        if ($stmt->execute()) {
            // Usuário cadastrado com sucesso!
            echo '<script>';
            echo 'alert("Usuário cadastrado com sucesso!");';
            echo 'window.location.href = "index.php";';
            echo '</script>';
        } else {
            echo "Erro ao cadastrar o usuário: " . $stmt->error;
        }

        // Fecha a declaração
        $stmt->close();
    }
}

// Fecha a conexão
$conn->close();
?>
