<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.tiny.cloud/1/s3zlvxi87b9m37cn8vukivxht0lpogsjccobx1rw0kul8z9u/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <title>Ficha de Avaliação para Ação de Extensão</title>
    <style>
        .navbar {
            background: linear-gradient(135deg, #5F9EFF, #5B91E5);
        }

        .navbar-brand img {
            max-height: 80px;
        }

        .user-icon {
            font-size: 35px;
            margin-right: 5px;
        }

        .custom-field {
            display: flex;
            justify-content: space-between;
        }

        .custom-field .field {
            flex: 1;
            margin-right: 10px;
        }

        .custom-field .field:last-child {
            margin-right: 0;
        }

        .is-fullwidth {
            width: 100%;
        }

        .margem-desktop {
            margin-left: 12%;
            margin-right: 12%;
        }

        .list-divider {
            margin-top: 10px;
            margin-bottom: 10px;
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

    <section class="section margem-desktop">
        <div class="container">
            <h1 class="title has-text-centered has-text-weight-bold">Ficha de Avaliação para Ação de Extensão</h1>

            <br>

            <div class="custom-field">
                <div class="field">
                    <?php
                    include("conexao.php");

                    // Consulta SQL para obter títulos e IDs das ações vinculadas ao usuário
                    $sql = "SELECT acoes_edital.id AS acao_id, acoes_edital.titulo
                    FROM acoes_e_avaliador
                    INNER JOIN acoes_edital ON acoes_e_avaliador.acao_id = acoes_edital.id
                    WHERE acoes_e_avaliador.usuario_id = {$_SESSION['usuario_id']}";

                    // Executar a consulta
                    $result = $conn->query($sql);

                    // Verificar se há resultados
                    if ($result->num_rows > 0) {
                        echo '<div class="menu">';
                        echo '<p class="menu-label is-size-4">Ações Atribuidas a Você</p>';
                        echo '<ul class="menu-list">';
                        echo '<hr class="list-divider">';
                        while ($row = $result->fetch_assoc()) {
                            // Criar um link clicável para cada título dentro de um item de lista
                            echo '<li><a href="acaoavaliada.php?acao_id=' . $row["acao_id"] . '">' . $row["titulo"] . '</a></li>';
                            // Adicionar uma linha divisória
                            echo '<hr class="list-divider">';
                        }
                        echo '</ul>';
                        echo '</div>';
                    } else {
                        echo "Nenhuma ação encontrada para este usuário.";
                    }

                    // Fechar a conexão
                    $conn->close();
                    ?>



                </div>
            </div>

            <div class="field is-grouped is-grouped-centered">

                <p class="control">
                    <button class="button is-danger" onclick="window.location.href='menuavaliador.php'">Voltar para a Tela Inicial</button>
                </p>
            </div>

        </div>
    </section>
</body>

</html>