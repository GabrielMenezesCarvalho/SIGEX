<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
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
            <h1 class="title has-text-centered has-text-weight-bold">Barema de pontuação</h1>

            <?php
            include("conexao.php");

            // Verificar se o parâmetro 'acao_id' foi fornecido na URL
            if (isset($_GET['acao_id'])) {
                $acao_id = $_GET['acao_id'];

                // Consulta SQL para obter todas as informações da ação
                $sql = "SELECT * FROM acoes_edital WHERE id = $acao_id";

                // Executar a consulta
                $result = $conn->query($sql);

                // Verificar se há resultados
                if ($result->num_rows > 0) {
                    // Exibir as informações da ação
                    $row = $result->fetch_assoc();
                    exibirAcao($row);
                    // Exibir outras informações da ação...

                } else {
                    echo "Ação não encontrada.";
                }
            } else {
                echo "ID da ação não fornecido.";
            }

            // Fechar a conexão
            $conn->close();



            // Função para exibir um Acao
            function exibirAcao($row)
            {
                echo "<div class='box'>";
                exibirCampo('Data de Publicação', $row['data_publicacao']);
                exibirCampo('Nome Completo', $row['nome_completo_avaliador']);
                exibirCampo('CPF do Coordenador', $row['CPF_COORDENADOR']);
                exibirCampo('Email do Coordenador', $row['EMAIL_COORDENADOR']);
                exibirCampo('Titulação do Coordenador', $row['TITULACAO_COORDENADOR']);
                exibirCampo('Telefone do Coordenador', $row['TELEFONE_COORDENADOR']);
                exibirCampo('Colegiado do Coordenador', $row['COLEGIADO_COORDENADOR']);
                exibirCampo('Campus do Coordenador', $row['CAMPUS_COORDENADOR']);
                exibirCampo('Área Temática', $row['MODALIDADE']);
                exibirCampo('Estado da Ação', $row['ESTADO_ACAO']);
                exibirCampo('Cidade da Ação', $row['CIDADE_ACAO']);
                exibirCampo('Zona da Ação', $row['ZONA_ACAO']);
                exibirCampo('Bairro da Ação', $row['BAIRRO_ACAO']);

                exibirCampo('Título', $row['titulo']);
                exibirCampo('Resumo', $row['RESUMO']);
                exibirCampo('Introdução', $row['INTRODUCAO']);
                exibirCampo('Justificativa', $row['JUSTIFICATIVA']);
                exibirCampo('Objetivos e Metas', $row['OBJETIVOS_METAS']);



                exibirCampo('Metodologia', $row['metodologia']);
                exibirCampo('Resultados Esperados', $row['RESULTADOS_ESPERADOS']);







                exibirCampo('Articulação com o Ensino', $row['ARTICULACAO_ENSINO']);
                exibirCampo('Indicadores e Sistemática', $row['INDICADORES_SISTEMATICA']);
                exibirCampo('Plano de Trabalho do Coordenador', $row['PLANO_TRABALHO_COORDENADOR']);
                exibirCampo('Plano de Trabalho do Discente', $row['PLANO_TRABALHO_DISCENTE']);
                exibirCampo('Relação com a Sociedade', $row['RELACAO_SOCIEDADE']);
                exibirCampo('Referências Bibliográficas', $row['referencias']);



                exibirCampo('Descrição do Público Interno', $row['publico_interno_descricao']);
                exibirCampo('Total de Público Interno', $row['publico_interno_numero']);
                exibirCampo('Descrição do Público Externo', $row['publico_externo_descricao']);
                exibirCampo('Total de Público Externo', $row['publico_externo_numero']);

                echo "<br>";
                echo "<div class='campo'><strong>Cronogrma de Execução</strong></div>";
                echo "<br>";

                exibirCampo('Inicio', $row['inicio']);
                exibirCampo('Fim', $row['fim']);
                exibirCampo('Carga Semanal', $row['carga_semanal']);
                exibirCampo('Carga Total', $row['carga_total']);
                echo "<br>";








                exibirCampo('PPC', $row['PPC']);
                exibirCampo('Anuência', $row['ANUENCIA']);
                exibirCampo('Abrangência', $row['ABRANGENCIA']);
                exibirCampo('Vínculo com Liga', $row['VINCULO_LIGA']);
                exibirCampo('Vínculo com Empresa Júnior', $row['VINCULO_EMPRESAJR']);
                exibirCampo('Beneficia Grupo Vulnerável', $row['BENEFICIA_GRUPOVUNERAVEL']);
                exibirCampo('Aprovada Fomento Público', $row['APROVADA_FOMENTO_PUBLICO']);
                exibirCampo('Parceria com Outras Instituições', $row['PARCERIA_OUTRA_INSTITUICOES']);

                echo "</div>";
                echo "<br>";
            }

            // Função para exibir um campo específico
            function exibirCampo($label, $conteudo)
            {
                echo "<div class='campo'><strong>{$label}:</strong> " . nl2br($conteudo) . "</div>";
            }
            ?>

            <form id="avaliacaoForm">

                <h2 class="subtitle">Orientações</h2>
                <h4><b>Diretrizes:</b> Prezado(a) avaliador(a), seguem abaixo os quesitos que devem ser avaliados nos projetos de extensão submetidos. <b>Sugere-se a leitura do projeto antes de iniciar o preenchimento e, ao fazê-lo, se necessário, o retorno à leitura de itens para maior clareza da proposta.</b> Solicitamos que avalie cada um dos quesitos, atribuindo uma nota de 0 a 10. <b>Ao final, deve somar todas as notas atribuídas e dividir por 10, para obter a média.</b> </h4>

                <br>

                <div class="field">
                    <label class="label">Área Temática</label>
                    <div class="control">
                        <div class="select is-fullwidth is-rounded">
                            <select name="area_tematica">
                                <option value="" disabled selected>Selecione a área temática</option>
                                <option> 01 - Comunicação</option>
                                <option> 02 - Cultura</option>
                                <option> 03 - Direitos Humanos e Justiça</option>
                                <option> 04 - Educação</option>
                                <option> 05 - Meio Ambiente</option>
                                <option> 06 - Saúde</option>
                                <option> 07 - Tecnologia e Produção</option>
                                <option> 08 - Trabalho</option>
                            </select>
                        </div>
                    </div>
                </div>


                <br>

                <h2 class="subtitle">Objetivos, Justificativa e Métodos</h2>

                <div class="field">
                    <label class="label">1. Como você avalia os objetivos? Considerar que estes devem descrever de forma clara o que se espera alcançar com a proposta de extensão apresentada</label>
                    <div class="control">
                        <label class="radio">
                            <input type="radio" name="Avaliaobjetivos" value="1">
                            1
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliaobjetivos" value="2">
                            2
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliaobjetivos" value="3">
                            3
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliaobjetivos" value="4">
                            4
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliaobjetivos" value="5">
                            5
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliaobjetivos" value="6">
                            6
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliaobjetivos" value="7">
                            7
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliaobjetivos" value="8">
                            8
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliaobjetivos" value="9">
                            9
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliaobjetivos" value="10">
                            10
                        </label>
                    </div>
                </div>

                <div class="field">
                    <label class="label">2. Como você avalia a justificativa? Considerar o público beneficiado externamente, a relevância social e situação-problema na qual o projeto de extensão se propõe a intervir</label>
                    <div class="control">
                        <label class="radio">
                            <input type="radio" name="Avaliajustificativa" value="1">
                            1
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliajustificativa" value="2">
                            2
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliajustificativa" value="3">
                            3
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliajustificativa" value="4">
                            4
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliajustificativa" value="5">
                            5
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliajustificativa" value="6">
                            6
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliajustificativa" value="7">
                            7
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliajustificativa" value="8">
                            8
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliajustificativa" value="9">
                            9
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliajustificativa" value="10">
                            10
                        </label>
                    </div>
                </div>

                <div class="field">
                    <label class="label">3. Como você avalia a metodologia? Considerar se a proposta permite o alcance dos objetivos apresentados</label>
                    <div class="control">
                        <label class="radio">
                            <input type="radio" name="Avaliametodologia" value="1">
                            1
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliametodologia" value="2">
                            2
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliametodologia" value="3">
                            3
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliametodologia" value="4">
                            4
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliametodologia" value="5">
                            5
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliametodologia" value="6">
                            6
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliametodologia" value="7">
                            7
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliametodologia" value="8">
                            8
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliametodologia" value="9">
                            9
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliametodologia" value="10">
                            10
                        </label>
                    </div>
                </div>

                <div class="field">
                    <label class="label">4. Como você avalia o protagonismo do/a(s/as) discente(s) na proposta de extensão apresentada?</label>
                    <div class="control">
                        <label class="radio">
                            <input type="radio" name="Avaliaprotagonismodiscente" value="1">
                            1
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliaprotagonismodiscente" value="2">
                            2
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliaprotagonismodiscente" value="3">
                            3
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliaprotagonismodiscente" value="4">
                            4
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliaprotagonismodiscente" value="5">
                            5
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliaprotagonismodiscente" value="6">
                            6
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliaprotagonismodiscente" value="7">
                            7
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliaprotagonismodiscente" value="8">
                            8
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliaprotagonismodiscente" value="9">
                            9
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliaprotagonismodiscente" value="10">
                            10
                        </label>
                    </div>
                </div>






                <br>
                <h2 class="subtitle">Impacto social e inserção regional</h2>
                <br>

                <div class="field">
                    <label class="label">5. Como você avalia a descrição e o protagonismo do público participante, externo à Univasf, que será beneficiado com a atividade?</label>
                    <div class="control">
                        <label class="radio">
                            <input type="radio" name="AvaliaprotagonismodoPublico" value="1">
                            1
                        </label>
                        <label class="radio">
                            <input type="radio" name="AvaliaprotagonismodoPublico" value="2">
                            2
                        </label>
                        <label class="radio">
                            <input type="radio" name="AvaliaprotagonismodoPublico" value="3">
                            3
                        </label>
                        <label class="radio">
                            <input type="radio" name="AvaliaprotagonismodoPublico" value="4">
                            4
                        </label>
                        <label class="radio">
                            <input type="radio" name="AvaliaprotagonismodoPublico" value="5">
                            5
                        </label>
                        <label class="radio">
                            <input type="radio" name="AvaliaprotagonismodoPublico" value="6">
                            6
                        </label>
                        <label class="radio">
                            <input type="radio" name="AvaliaprotagonismodoPublico" value="7">
                            7
                        </label>
                        <label class="radio">
                            <input type="radio" name="AvaliaprotagonismodoPublico" value="8">
                            8
                        </label>
                        <label class="radio">
                            <input type="radio" name="AvaliaprotagonismodoPublico" value="9">
                            9
                        </label>
                        <label class="radio">
                            <input type="radio" name="AvaliaprotagonismodoPublico" value="10">
                            10
                        </label>
                    </div>
                </div>

                <div class="field">
                    <label class="label">6. Como você avalia o impacto social e inserção regional e/ou local da proposta? Considerar o potencial transformador da proposta
                    </label>
                    <div class="control">
                        <label class="radio">
                            <input type="radio" name="Avaliaimpactosocial" value="1">
                            1
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliaimpactosocial" value="2">
                            2
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliaimpactosocial" value="3">
                            3
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliaimpactosocial" value="4">
                            4
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliaimpactosocial" value="5">
                            5
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliaimpactosocial" value="6">
                            6
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliaimpactosocial" value="7">
                            7
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliaimpactosocial" value="8">
                            8
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliaimpactosocial" value="9">
                            9
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliaimpactosocial" value="10">
                            10
                        </label>
                    </div>
                </div>


                <br>
                <h2 class="subtitle">Indissociabilidade/Interdisciplinaridade/Interprofissionalidade</h2>
                <br>


                <div class="field">
                    <label class="label">7. Como você avalia a indissociabilidade da atividade de extensão com o ensino e a pesquisa?
                        Considerar metas relacionadas a publicação de produção científica e as repercussões no aprendizado acadêmico dos discentes.
                    </label>
                    <div class="control">
                        <label class="radio">
                            <input type="radio" name="Avaliaindissociabilidade" value="1">
                            1
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliaindissociabilidade" value="2">
                            2
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliaindissociabilidade" value="3">
                            3
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliaindissociabilidade" value="4">
                            4
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliaindissociabilidade" value="5">
                            5
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliaindissociabilidade" value="6">
                            6
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliaindissociabilidade" value="7">
                            7
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliaindissociabilidade" value="8">
                            8
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliaindissociabilidade" value="9">
                            9
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliaindissociabilidade" value="10">
                            10
                        </label>
                    </div>
                </div>

                <br>
                <h2 class="subtitle">Cronograma, plano de trabalho e resultados esperados</h2>
                <br>

                <div class="field">
                    <label class="label">8. Como você avalia o cronograma de execução do projeto?
                        Considerar a realização de todas as atividades, compreendendo o período de execução do projeto
                    </label>
                    <div class="control">
                        <label class="radio">
                            <input type="radio" name="cronograma de execução" value="1">
                            1
                        </label>
                        <label class="radio">
                            <input type="radio" name="cronograma de execução" value="2">
                            2
                        </label>
                        <label class="radio">
                            <input type="radio" name="cronograma de execução" value="3">
                            3
                        </label>
                        <label class="radio">
                            <input type="radio" name="cronograma de execução" value="4">
                            4
                        </label>
                        <label class="radio">
                            <input type="radio" name="cronograma de execução" value="5">
                            5
                        </label>
                        <label class="radio">
                            <input type="radio" name="cronograma de execução" value="6">
                            6
                        </label>
                        <label class="radio">
                            <input type="radio" name="cronograma de execução" value="7">
                            7
                        </label>
                        <label class="radio">
                            <input type="radio" name="cronograma de execução" value="8">
                            8
                        </label>
                        <label class="radio">
                            <input type="radio" name="cronograma de execução" value="9">
                            9
                        </label>
                        <label class="radio">
                            <input type="radio" name="cronograma de execução" value="10">
                            10
                        </label>
                    </div>
                </div>

                <div class="field">
                    <label class="label">9. Como você avalia o Plano de Trabalho do/a bolsista?
                        Considerar a coerência entre a metodologia e cronograma apresentados no projeto
                    </label>
                    <div class="control">
                        <label class="radio">
                            <input type="radio" name="Avaliaplano de trabalho" value="1">
                            1
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliaplano de trabalho" value="2">
                            2
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliaplano de trabalho" value="3">
                            3
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliaplano de trabalho" value="4">
                            4
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliaplano de trabalho" value="5">
                            5
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliaplano de trabalho" value="6">
                            6
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliaplano de trabalho" value="7">
                            7
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliaplano de trabalho" value="8">
                            8
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliaplano de trabalho" value="9">
                            9
                        </label>
                        <label class="radio">
                            <input type="radio" name="Avaliaplano de trabalho" value="10">
                            10
                        </label>
                    </div>
                </div>

                <div class="field">
                    <label class="label">10. Como você avalia os resultados esperados?
                        Considerar os benefícios que o público beneficiado ou comunidade deve obter ao final das atividades do projeto
                    </label>
                    <div class="control">
                        <label class="radio">
                            <input type="radio" name="avaliaresultadosesperados" value="1">
                            1
                        </label>
                        <label class="radio">
                            <input type="radio" name="avaliaresultadosesperados" value="2">
                            2
                        </label>
                        <label class="radio">
                            <input type="radio" name="avaliaresultadosesperados" value="3">
                            3
                        </label>
                        <label class="radio">
                            <input type="radio" name="avaliaresultadosesperados" value="4">
                            4
                        </label>
                        <label class="radio">
                            <input type="radio" name="avaliaresultadosesperados" value="5">
                            5
                        </label>
                        <label class="radio">
                            <input type="radio" name="avaliaresultadosesperados" value="6">
                            6
                        </label>
                        <label class="radio">
                            <input type="radio" name="avaliaresultadosesperados" value="7">
                            7
                        </label>
                        <label class="radio">
                            <input type="radio" name="avaliaresultadosesperados" value="8">
                            8
                        </label>
                        <label class="radio">
                            <input type="radio" name="avaliaresultadosesperados" value="9">
                            9
                        </label>
                        <label class="radio">
                            <input type="radio" name="avaliaresultadosesperados" value="10">
                            10
                        </label>
                    </div>
                </div>








                <br>
                <h1 class="title has-text-centered has-text-weight-bold">Média Final: <span id="media-final-text"></span></h1>
                <br>

                <div class="field has-text-centered">
                    <div class="control">
                        <input type="text" class="input is-rounded" id="media-final" readonly style="display: none;">
                    </div>
                </div>



                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const radioInputs = document.querySelectorAll('input[type="radio"]');
                        const mediaFinalInput = document.getElementById('media-final');
                        const mediaFinalText = document.getElementById('media-final-text');

                        radioInputs.forEach(function(radioInput) {
                            radioInput.addEventListener('change', function() {
                                calcularMediaFinal();
                            });
                        });

                        function calcularMediaFinal() {
                            const total = Array.from(radioInputs).reduce(function(acc, radioInput) {
                                return acc + (radioInput.checked ? parseInt(radioInput.value, 10) : 0);
                            }, 0);

                            const mediaFinal = total / 10;

                            mediaFinalText.textContent = mediaFinal.toFixed(2);
                            mediaFinalInput.value = mediaFinal.toFixed(2);
                        }

                        calcularMediaFinal(); // Calcular a média ao carregar a página
                    });
                </script>








                <br>
                <h1 class="title has-text-centered has-text-weight-bold">PARECER</h1>
                <br>

                <div class="field has-text-centered">
                    <div class="control">
                        <label class="radio">
                            <input type="radio" name="recomendacao" value="aprovado">
                            Aprovado
                        </label>
                        <label class="radio">
                            <input type="radio" name="recomendacao" value="aprovado_apos_ajustes">
                            Aprovado após ajustes
                        </label>
                        <label class="radio">
                            <input type="radio" name="recomendacao" value="nao_aprovado">
                            Não aprovado
                        </label>
                    </div>
                </div>
                <br>

                <div class="field">
                    <label class="label">Conceito inferior a 7,00:
                        Todos os ítens com nota inferior a sete devem ter justificativa de maneira robusta..
                        Apontar o item, nota (abaixo de sete) e justificativa no quadro abaixo.
                    </label>
                    <br>
                    <div class="control">
                        <textarea class="textarea is-fullwidth is-rounded" placeholder=""></textarea>
                    </div>
                </div>

                <br>
                <div class="field">
                    <label class="label">Considerações finais: Solicitamos que detalhe abaixo os pontos relevantes e fragilidades da proposta.</label>
                    <br>
                    <div class="control">
                        <textarea class="textarea is-fullwidth is-rounded" placeholder=""></textarea>
                    </div>
                </div>

                <div class="field">
                    <label class="checkbox">
                        <input type="checkbox" name="conflitos_interesse" value="nao_tenho_conflitos">
                        Declaro não ter conflitos de interesse referentes a essa avaliação.
                    </label>
                </div>




                <div class="field is-grouped is-grouped-centered">

                    <p class="control">
                        <button class="button is-danger" onclick="window.location.href='menuavaliador.php'">Voltar para a Tela Inicial</button>
                    </p>
                    <p class="control">
                    <button class="button is-primary" onclick="mostrarAlerta(event)">Submeter a Avaliação</button>

                    </p>

                </div>

            </form>
        </div>
    </section>

    <script>
        function mostrarAlerta(e) {
            alert("Avaliação Computada com sucesso");
            window.location.href = "menuavaliador.php";
            e.preventDefault(); // Evitar o envio padrão do formulário
            return false;
        }
    </script>

</body>

</html>