<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
        body {
            background-color: #003366;
        }

        .jumbotron {
            background-color: white;
            color: #003366;
        }

        .btn-success {
            background-color: #006699;
            border-color: #006699;
        }

        .btn-success:hover {
            background-color: #005588;
            border-color: #005588;
        }

        .logo {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row" style="margin-top: 50px;">
            <div class="col-md-8 mx-auto jumbotron">
                <div class="text-center mb-4">
                    <img src="imagens\Group 100.png" alt="Logo da Universidade" class="logo">
                </div>
                <br>
                <h1>Cadastrar um novo usuário.</h1>
                <!-- Formulário de Cadastro -->
                <form action="processa_cadastro.php" method="POST">
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" name="nome" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Usuário</label>
                        <input type="text" name="usuario" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Senha</label>
                        <input type="password" name="senha" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Tipo</label>
                        <select name="tipo" class="form-control" required>
                            <option value="1">Discente</option>
                            <option value="2">Docente/Técnico</option>
                        </select>
                    </div>

                    <!-- Adicionando um botão de submit -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
</body>

</html>
