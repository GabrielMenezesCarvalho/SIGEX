<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sistema de Login</title>
    <!-- Layout com bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
        body {
            background-color: #003366; /* Cor de fundo da UNIVASF */
        }

        .jumbotron {
            background-color: white; /* Cor do cabeçalho */
            color: #003366; /* Cor do texto do cabeçalho */
        }

        .btn-success {
            background-color: #006699; /* Cor do botão */
            border-color: #006699; /* Cor da borda do botão */
        }

        .btn-success:hover {
            background-color: #005588; /* Cor do botão ao passar o mouse */
            border-color: #005588; /* Cor da borda do botão ao passar o mouse */
        }

        /* Estilo para limitar o tamanho da imagem da logo */
        .logo {
            max-width: 100%; /* Define a largura máxima da imagem */
            height: auto; /* Mantém a proporção da imagem */
        }

        
        .solid-border {
            border: 2px solid #006699; 
            padding: 20px; 
            margin-bottom: 20px; 
            text-align: center;
        }

        
        .register-link {
            color: #006699;
            text-decoration: none;
        }

        .register-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row" style="margin-top: 100px;">
            <div class="col-md-8 mx-auto jumbotron">
                <div class="text-center mb-4">
                    <img src="imagens\Group 100.png" alt="Logo da Universidade" class="logo">
                </div>
                <div class="solid-border">
                    <h1>Bem Vindo(a) ao SIGEX</h1>
                    <h3>Sistema de Gerenciamento de Ações da Extensão</h3>
                </div>
                <form action="login.php" method="POST">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Senha</label>
                        <input type="password" name="senha" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block">Enviar</button>
                    </div>
                </form>
                <div class="center-text">
                    <p>Ainda não é cadastrado? Por favor <a href="novoUsuario.php" class="register-link">Clique aqui</a>.</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
