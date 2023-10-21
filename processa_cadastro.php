<?php
// Inclui o arquivo de conexão
include("conexao.php");

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Dados do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $tipo = $_POST["tipo"];
    $cpf = $_POST["cpf"];
    
    // Verifica se o tipo de usuário é "Colaborador Externo"
    if ($tipo == 4) {
        // Campos específicos para colaborador externo
        
        $instituicao = $_POST["instituicao"];
        $formacao = $_POST["formacao"];
        
    } else {
        // Inicializa os campos com valores padrão ou nulos se necessário
        
        $instituicao = null;
        $formacao = null;
        
    }

    // Verifica se o usuário já existe
    $verificaUsuario = $conn->prepare("SELECT id FROM usuario WHERE email = ?");
    $verificaUsuario->bind_param("s", $email);
    $verificaUsuario->execute();
    $verificaUsuario->store_result();

    if ($verificaUsuario->num_rows > 0) {
        // Usuário já existe, exibe uma mensagem de erro e redireciona de volta para a página de cadastro
        echo '<script>';
        echo 'alert("Esse email já está cadastrado no nosso sistema.");';
        echo 'window.location.href = "novoUsuario.php";';
        echo '</script>';
    } else {
        // Usuário não existe, proceda com a inserção
        $verificaUsuario->close();

        // Prepara a declaração SQL para inserção
        $sql = "INSERT INTO usuario (nome, email, senha, tipo, cpf, instituicao, formacao) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        // Verifica se a preparação foi bem-sucedida
        if ($stmt === false) {
            die("Erro na preparação da consulta: " . $conn->error);
        }

        // Binda os parâmetros
        $stmt->bind_param("sssisss", $nome, $email, $senha, $tipo, $cpf, $instituicao, $formacao);

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
