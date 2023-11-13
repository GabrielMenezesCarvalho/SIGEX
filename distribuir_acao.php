<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Pesquisador</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
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
    <section class="section">
        <div class="field">
            <h1 class="title is-1">Definir Avaliador</h1>

            <form action="processar_definir_avaliador.php" method="post">
                <div class="field">
                    <label class="label">Selecione uma Ação:</label>
                    <div class="control">
                        <div class="select is-fullwidth">
                            <select name="acao_id">
                                <?php

                                include("conexao.php");

                                $result = $conn->query("SELECT id, titulo FROM acoes_edital");

                                // Loop para exibir as opções
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row['id'] . "'>" . $row['titulo'] . "</option>";
                                }

                                // Fechar a conexão
                                $conn->close();
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Selecione um Avaliador:</label>
                    <div class="control">
                        <div class="select is-fullwidth">
                            <select name="avaliador_id">
                                <?php
                                // Conectar ao banco de dados e recuperar a lista de avaliadores
                                // Substitua isso com seu código de conexão e consulta
                                include("conexao.php");
                                // Exemplo de consulta:
                                $result_avaliadores = $conn->query("SELECT id, nome FROM usuario WHERE usuario.avaliador = 1");

                                // Loop para exibir as opções
                                while ($row_avaliador = $result_avaliadores->fetch_assoc()) {
                                    echo "<option value='" . $row_avaliador['id'] . "'>" . $row_avaliador['nome'] . "</option>";
                                }

                                // Fechar a conexão
                                $conn->close();
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <a class="button is-danger" href="admin.php">Voltar</a>
                        <button class="button is-primary" type="submit">Definir Avaliador</button>
                    </div>
                    
                        
                    
                </div>
                
            </form>
        </div>
    </section>
</body>

</html>