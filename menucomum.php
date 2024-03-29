<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGEX - MENU</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <style>
        .navbar {
            background: linear-gradient(135deg, #5F9EFF, #5B91E5);
        }

        .navbar-brand img {
            max-height: 80px;
        }

        @media only screen and (max-width: 600px) {
            .navbar-brand img {
                width: 100%;
                height: 100%;
            }

        }

        .user-icon {
            font-size: 35px;
            margin-right: 5px;
        }

        .welcome-message {
            text-align: center;
            margin-top: 50px;
        }

        .square-button-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            margin-top: 30px;
        }

        .square-button {
            width: 150px;
            height: 150px;
            margin: 10px;
            text-align: center;
            background-color: #E0E0E0;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .square-button i {
            font-size: 36px;
            margin-bottom: 10px;
        }

        .square-button p {
            margin: 0;
        }
    </style>
</head>

<body>
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="#">
                <img src="imagens/Group 100.png" alt="Logo 1">
            </a>
        </div>
        <div class="navbar-end">
            <div class="navbar-item">
                <div class="user-icon">
                    <i class="fa fa-user-circle"></i>
                </div>
                <?php
                session_start();
                if (empty($_SESSION)) {
                    print "<script>location.href='index.php';</script>";
                }
                print "Olá, " . $_SESSION["nome"];
                print "<a style='margin-left: 10px;' href='logout.php'>Sair</a>";

                ?>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="welcome-message">
            <?php
            session_start();

            $tipo = $_SESSION["tipo"];
            $nome = $_SESSION["nome"];

            switch ($tipo) {
                case 1:
                    $funcao = "Aluno";
                    break;
                case 2:
                    $funcao = "Professor";
                    break;
                case 3:
                    $funcao = "Técnico Administrativo";
                    break;
                case 4:
                    $funcao = "Colaborador Externo";
                    break;
                default:
                    $funcao = "Usuário Desconhecido";
            }

            print "Bem Vindo à Área do $funcao: $nome";
            ?>
        </h1>

        <div class="square-button-container">

            <button class="square-button" onclick="window.location.href='outra-pagina.html';">
                <img src="imagens/MeusDados.png" alt="Imagem do Botão">
            </button>

            <button class="square-button" onclick="window.location.href='novaAcaoAvaliador.php';">
                <img src="imagens/CadastrarPIBEX.png" alt="Imagem do Botão">
            </button>

            <button class="square-button" onclick="window.location.href='novaAcaoAvaliadorVoluntario.php';">
                <img src="imagens/cadastrar acao voluntaria.png" alt="Imagem do Botão">
            </button>

            <button class="square-button" onclick="window.location.href='avaliacaoDeAcao.php';">
                <img src="imagens/AvaliarAcoes.png" alt="Imagem do Botão">
            </button>

            <button class="square-button" onclick="window.location.href='outra-pagina.html';">
                <img src="imagens/Relatorios.png" alt="Imagem do Botão">
            </button>

            <button class="square-button" onclick="window.location.href='outra-pagina.html';">
                <img src="imagens/Declaração.png" alt="Imagem do Botão">
            </button>


        </div>
    </div>
    </div>
</body>

</html>