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
    </style>
</head>

<body>

    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="menuavaliador.php">
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
                exibirCampo('Modalidade', $row['MODALIDADE']);
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

            <h2 class="subtitle">Identificação da Proposta</h2>

            <div class="custom-field">
                <div class="field">
                    <label class="label">Modalidade</label>
                    <div class="control">
                        <div class="select is-fullwidth is-rounded">
                            <select>
                                <option>Selecione a modalidade</option>
                                <option>Projeto</option>
                                <option>Empresa Junior</option>
                                <option>Liga Acadêmica</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Colegiado</label>
                    <div class="control">
                        <div class="select is-fullwidth is-rounded">
                            <select>
                                <option>Selecione um colegiado</option>
                                <!-- Adicione as opções de colegiados aqui -->
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <h2 class="subtitle">Título da Proposta</h2>

            <div class="field">
                <label class="label">Título condiz com a proposta apresentada?</label>
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="condiz" value="sim">
                        Sim
                    </label>
                    <label class="radio">
                        <input type="radio" name="condiz" value="nao">
                        Não
                    </label>
                </div>
            </div>


            <div class="field">
                <label class="label">Considerações sobre o título (opcional)</label>
                <div class="control">
                    <textarea class="textarea is-fullwidth is-rounded" placeholder="Digite suas considerações sobre o título aqui"></textarea>
                </div>
            </div>

            <div class="field">
                <label class="label">Considerações sobre os objetivos (geral e específicos)</label>
                <div class="control">
                    <textarea class="textarea is-fullwidth is-rounded" placeholder="Digite suas considerações sobre os objetivos aqui"></textarea>
                </div>
            </div>

            <br>

            <h2 class="subtitle">Análise do Mérito e Relevância Social do Projeto / Proposta</h2>
            <br>
            <h3>01 - NATUREZA ACADÊMICA</h3>
            <br>

            <div class="field">
                <label class="label">Quanto à contribuição para o aprimoramento e/ou reformulações de concepções e práticas curriculares da Universidade?</label>
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="contribuicao_curriculo" value="atende">
                        Atende
                    </label>
                    <label class="radio">
                        <input type="radio" name="contribuicao_curriculo" value="parcialmente">
                        Atende Parcialmente
                    </label>
                    <label class="radio">
                        <input type="radio" name="contribuicao_curriculo" value="nao_atende">
                        Não Atende
                    </label>
                </div>
            </div>



            <div class="field">
                <label class="label">Quanto à sistematização/divulgação do conhecimento produzido pela proposta</label>
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="sistematizacao_divulgacao" value="atende">
                        Atende
                    </label>
                    <label class="radio">
                        <input type="radio" name="sistematizacao_divulgacao" value="parcialmente">
                        Atende Parcialmente
                    </label>
                    <label class="radio">
                        <input type="radio" name="sistematizacao_divulgacao" value="nao_atende">
                        Não Atende
                    </label>
                </div>
            </div>

            <div class="field">
                <label class="label">Quanto ao cumprimento do preceito da indissociabilidade entre extensão, ensino e pesquisa, com o intuito de integrar as ações para atender as demandas da sociedade e/ou o público-alvo, de modo a demonstrar a natureza extensionista da proposta</label>
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="indissociabilidade_extensao" value="atende">
                        Atende
                    </label>
                    <label class="radio">
                        <input type="radio" name="indissociabilidade_extensao" value="parcialmente">
                        Atende Parcialmente
                    </label>
                    <label class="radio">
                        <input type="radio" name="indissociabilidade_extensao" value="nao_atende">
                        Não Atende
                    </label>
                </div>
            </div>

            <div class="field">
                <label class="label">Quanto à implementação do processo de socialização do conhecimento acadêmico de modo que os resultados oriundos das ações contribuam na formação técnico-científica, cultural, social e pessoal dos acadêmicos?</label>
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="implementacao_socializacao" value="atende">
                        Atende
                    </label>
                    <label class="radio">
                        <input type="radio" name="implementacao_socializacao" value="parcialmente">
                        Atende Parcialmente
                    </label>
                    <label class="radio">
                        <input type="radio" name="implementacao_socializacao" value="nao_atende">
                        Não Atende
                    </label>
                </div>
            </div>
            <div class="field">
                <label class="label">Considerações sobre o item "natureza acadêmica" (opcional)</label>
                <div class="control">
                    <textarea class="textarea is-fullwidth is-rounded" placeholder="Digite suas considerações sobre a natureza acadêmica aqui"></textarea>
                </div>
            </div>
            <br>
            <h3>02 - RELAÇÕES COM A SOCIEDADE</h3>
            <br>

            <div class="field">
                <label class="label">A ação propõe relação integradora e/ou transformadora entre a Universidade e a Sociedade, de forma que haja contribuição à inclusão de grupos sociais e ampliação de oportunidades educacionais?</label>
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="relacoes_sociedade" value="atende">
                        Atende
                    </label>
                    <label class="radio">
                        <input type="radio" name="relacoes_sociedade" value="parcialmente">
                        Atende Parcialmente
                    </label>
                    <label class="radio">
                        <input type="radio" name="relacoes_sociedade" value="nao_atende">
                        Não Atende
                    </label>
                </div>
            </div>

            <div class="field">
                <label class="label">A ação aponta mecanismos de diálogo entre o saber acadêmico e o saber popular, visando a geração de
                    novos conhecimentos?</label>
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="dialogo_saberes" value="atende">
                        Atende
                    </label>
                    <label class="radio">
                        <input type="radio" name="dialogo_saberes" value="parcialmente">
                        Atende Parcialmente
                    </label>
                    <label class="radio">
                        <input type="radio" name="dialogo_saberes" value="nao_atende">
                        Não Atende
                    </label>
                </div>
            </div>

            <div class="field">
                <label class="label">A ação propõe a contribuição para o desenvolvimento econômico, social e cultural priorizando especificidades
                    regionais, por meio de propostas, formulação e acompanhamento das políticas públicas?</label>
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="" value="atende">
                        Atende
                    </label>
                    <label class="radio">
                        <input type="radio" name="" value="parcialmente">
                        Atende Parcialmente
                    </label>
                    <label class="radio">
                        <input type="radio" name="" value="nao_atende">
                        Não Atende
                    </label>
                </div>
            </div>

            <div class="field">
                <label class="label">Considerações sobre o item "Relação com a Sociedade" (opcional)</label>
                <div class="control">
                    <textarea class="textarea is-fullwidth is-rounded" placeholder="Digite suas considerações sobre a relação com a sociedade aqui"></textarea>
                </div>
            </div>

            <br>
            <h3>03 - FUNDAMENTAÇÃO TEÓRICA</h3>
            <br>

            <div class="field">
                <label class="label">A base teórica que fundamenta a proposta encontra-se:</label>
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="base_teorica" value="consistente">
                        Consistente
                    </label>
                    <label class="radio">
                        <input type="radio" name="base_teorica" value="parcialmente">
                        Parcialmente Consistente
                    </label>
                    <label class="radio">
                        <input type="radio" name="base_teorica" value="inconsistente">
                        Inconsistente
                    </label>
                </div>
            </div>
            <div class="field">
                <label class="label">Considerações sobre o item "Fundamentação Teórica" (opcional)</label>
                <div class="control">
                    <textarea class="textarea is-fullwidth is-rounded" placeholder="Digite suas considerações sobre a fundamentação teórica aqui"></textarea>
                </div>
            </div>


            <br>
            <h3>04 - ESTRUTURA DO PROJETO</h3>
            <br>

            <div class="field">
                <label class="label">Quanto à estrutura e metodologia a proposta encontra-se:</label>
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="" value="consistente">
                        Consistente
                    </label>
                    <label class="radio">
                        <input type="radio" name="" value="parcialmente">
                        Parcialmente Consistente
                    </label>
                    <label class="radio">
                        <input type="radio" name="" value="inconsistente">
                        Inconsistente
                    </label>
                </div>
            </div>
            <div class="field">
                <label class="label">Considerações sobre o item “Estrutura do Projeto” (opcional)</label>
                <div class="control">
                    <textarea class="textarea is-fullwidth is-rounded" placeholder="Digite suas considerações sobre a estrutura do projeto aqui"></textarea>
                </div>
            </div>
            <br>
            <h3>05 - INTERAÇÃO DO CONHECIMENTO</h3>
            <br>

            <div class="field">
                <label class="label">Quanto à interdisciplinaridade e/ou multidiciplinaridade
                    a proposta encontra-se:</label>
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="" value="consistente">
                        Consistente
                    </label>
                    <label class="radio">
                        <input type="radio" name="" value="parcialmente">
                        Parcialmente Consistente
                    </label>
                    <label class="radio">
                        <input type="radio" name="" value="inconsistente">
                        Inconsistente
                    </label>
                </div>
            </div>
            <div class="field">
                <label class="label">Considerações sobre o item “Interação do conhecimento” (opcional)</label>
                <div class="control">
                    <textarea class="textarea is-fullwidth is-rounded" placeholder="Digite suas considerações sobre interação do conhecimento aqui"></textarea>
                </div>
            </div>
            <br>
            <h3>06 - PÚBLICO ALVO</h3>
            <br>

            <div class="field">
                <label class="label">Quanto à descrição e ao quantitativo do público alvo
                    a proposta encontra-se:</label>
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="" value="consistente">
                        Consistente
                    </label>
                    <label class="radio">
                        <input type="radio" name="" value="parcialmente">
                        Parcialmente Consistente
                    </label>
                    <label class="radio">
                        <input type="radio" name="" value="inconsistente">
                        Inconsistente
                    </label>
                </div>
            </div>
            <div class="field">
                <label class="label">Considerações sobre o item “Público Alvo” (opcional)</label>
                <div class="control">
                    <textarea class="textarea is-fullwidth is-rounded" placeholder="Digite suas considerações sobre o público alvo aqui"></textarea>
                </div>
            </div>
            <br>
            <h3>07 - CRONOGRAMA</h3>
            <br>

            <div class="field">
                <label class="label">Quanto a exequibilidade do cronograma em relação às
                    atividades da proposta para obtenção dos resultados
                    esperados, a proposição encontra-se adequeda e/ou
                    suficiente?</label>
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="" value="sim">
                        Sim
                    </label>
                    <label class="radio">
                        <input type="radio" name="" value="parcialmente">
                        Parcialmente
                    </label>
                    <label class="radio">
                        <input type="radio" name="" value="nao">
                        Não
                    </label>
                </div>
            </div>
            <div class="field">
                <label class="label">Considerações sobre o item “Cronograma” (opcional)</label>
                <div class="control">
                    <textarea class="textarea is-fullwidth is-rounded" placeholder="Digite suas considerações sobre o cronograma aqui"></textarea>
                </div>
            </div>
            <br>
            <h3>08 - RECURSOS </h3>
            <br>

            <div class="field">
                <label class="label">Quanto a exequibilidade do cronograma em relação às
                    atividades da proposta para obtenção dos resultados
                    esperados, a proposição encontra-se adequeda e/ou
                    suficiente?</label>
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="" value="consistente">
                        Consistente
                    </label>
                    <label class="radio">
                        <input type="radio" name="" value="parcialmente">
                        Parcialmente Consistente
                    </label>
                    <label class="radio">
                        <input type="radio" name="" value="inconsistente">
                        Inconsistente
                    </label>
                </div>
            </div>
            <div class="field">
                <label class="label">Considerações sobre o item “Recursos” (opcional)</label>
                <div class="control">
                    <textarea class="textarea is-fullwidth is-rounded" placeholder="Digite suas considerações sobre os recursos aqui"></textarea>
                </div>
            </div>
            <br>
            <h3>09 - RESULTADOS ESPERADOS</h3>
            <br>

            <div class="field">
                <label class="label">Quanto aos resultados esperados, bem como os benefícios
                    potenciais para a Sociedade a proposta encontra-se:</label>
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="" value="consistente">
                        Consistente
                    </label>
                    <label class="radio">
                        <input type="radio" name="" value="parcialmente">
                        Parcialmente Consistente
                    </label>
                    <label class="radio">
                        <input type="radio" name="" value="inconsistente">
                        Inconsistente
                    </label>
                </div>
            </div>
            <div class="field">
                <label class="label">Considerações sobre o item “Resultados esperados” (opcional)</label>
                <div class="control">
                    <textarea class="textarea is-fullwidth is-rounded" placeholder="Digite suas considerações sobre os resultados esperados aqui"></textarea>
                </div>
            </div>
            <br>
            <h3>10 - EXTENSÃO</h3>
            <br>

            <div class="field">
                <label class="label">A proposta apresentada realmente trata de atividade de extensão?</label>
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="" value="sim">
                        Sim
                    </label>
                    <label class="radio">
                        <input type="radio" name="" value="parcialmente">
                        Parcialmente
                    </label>
                    <label class="radio">
                        <input type="radio" name="" value="nao">
                        Não
                    </label>
                </div>
            </div>
            <div class="field">
                <label class="label">Considerações sobre o item “Extensão” (opcional)</label>
                <div class="control">
                    <textarea class="textarea is-fullwidth is-rounded" placeholder="Digite suas considerações sobre extensão aqui"></textarea>
                </div>
            </div>
            <br>
            <h1 class="title has-text-centered has-text-weight-bold">PARECER</h1>
            <br>

            <div class="field has-text-centered">
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="recomendacao" value="recomendado">
                        Recomendado
                    </label>
                    <label class="radio">
                        <input type="radio" name="recomendacao" value="recomendado_com_adequacoes">
                        Recomendado com Adequações
                    </label>
                    <label class="radio">
                        <input type="radio" name="recomendacao" value="nao_recomendado">
                        Não Recomendado
                    </label>
                </div>
            </div>
            <br>

            <div class="field">
                <label class="label has-text-centered has-text-weight-bold">FUDAMENTAÇÃO GERAL DA ANÁLISE DA
                    PROPOSTA (OBRIGATÓRIO)</label>
                <div class="control">
                    <textarea class="textarea is-fullwidth is-rounded" placeholder="Comente eventuais pontos fortes e frágeis da proposta avaliada, se for o caso, apresente sugestões que possam contribuir para a melhoria da ação, principalmente se seu parecer for “ Recomendado com Adequações”"></textarea>
                </div>
            </div>
            <div class="field is-grouped is-grouped-centered">

                <p class="control">
                    <button class="button is-danger" onclick="window.location.href='menuavaliador.php'">Voltar para a Tela Inicial</button>
                </p>
                <p class="control">
                    <button class="button is-primary" type="submit">Submeter a Avaliação</button>
                </p>

            </div>

        </div>
    </section>
</body>

</html>