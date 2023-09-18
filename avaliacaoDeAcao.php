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
                    <label class="label">Avaliador</label>
                    <div class="control">
                        <div class="select is-fullwidth is-rounded">
                            <select>
                                <option>Selecione um avaliador</option>
                                <!-- Adicione as opções de avaliadores aqui -->
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
                        <input type="radio" name="contribuicao_desenvolvimento" value="atende">
                        Atende
                    </label>
                    <label class="radio">
                        <input type="radio" name="contribuicao_desenvolvimento" value="parcialmente">
                        Atende Parcialmente
                    </label>
                    <label class="radio">
                        <input type="radio" name="contribuicao_desenvolvimento" value="nao_atende">
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
                        <input type="radio" name="estrutura_projeto" value="consistente">
                        Consistente
                    </label>
                    <label class="radio">
                        <input type="radio" name="estrutura_projeto" value="parcialmente">
                        Parcialmente Consistente
                    </label>
                    <label class="radio">
                        <input type="radio" name="estrutura_projeto" value="inconsistente">
                        Inconsistente
                    </label>
                </div>
            </div>
            <div class="field">
                <label class="label">Considerações sobre o item “ESTRUTURA DO PROJETO” (opcional)</label>
                <div class="control">
                    <textarea class="textarea is-fullwidth is-rounded" placeholder="Digite suas considerações sobre o título aqui"></textarea>
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
                        <input type="radio" name="estrutura_projeto" value="consistente">
                        Consistente
                    </label>
                    <label class="radio">
                        <input type="radio" name="estrutura_projeto" value="parcialmente">
                        Parcialmente Consistente
                    </label>
                    <label class="radio">
                        <input type="radio" name="estrutura_projeto" value="inconsistente">
                        Inconsistente
                    </label>
                </div>
            </div>
            <div class="field">
                <label class="label">Considerações sobre o item “INTERAÇÃO DO CONHECIMENTO” (opcional)</label>
                <div class="control">
                    <textarea class="textarea is-fullwidth is-rounded" placeholder="Digite suas considerações sobre o título aqui"></textarea>
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
                        <input type="radio" name="estrutura_projeto" value="consistente">
                        Consistente
                    </label>
                    <label class="radio">
                        <input type="radio" name="estrutura_projeto" value="parcialmente">
                        Parcialmente Consistente
                    </label>
                    <label class="radio">
                        <input type="radio" name="estrutura_projeto" value="inconsistente">
                        Inconsistente
                    </label>
                </div>
            </div>
            <div class="field">
                <label class="label">Considerações sobre o item “PÚBLICO ALVO” (opcional)</label>
                <div class="control">
                    <textarea class="textarea is-fullwidth is-rounded" placeholder="Digite suas considerações sobre o título aqui"></textarea>
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
                        <input type="radio" name="estrutura_projeto" value="sim">
                        Sim
                    </label>
                    <label class="radio">
                        <input type="radio" name="estrutura_projeto" value="parcialmente">
                        Parcialmente
                    </label>
                    <label class="radio">
                        <input type="radio" name="estrutura_projeto" value="nao">
                        Não
                    </label>
                </div>
            </div>
            <div class="field">
                <label class="label">Considerações sobre o item “CRONOGRAMA” (opcional)</label>
                <div class="control">
                    <textarea class="textarea is-fullwidth is-rounded" placeholder="Digite suas considerações sobre o CRONOGRAMA aqui"></textarea>
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
                        <input type="radio" name="estrutura_projeto" value="consistente">
                        Consistente
                    </label>
                    <label class="radio">
                        <input type="radio" name="estrutura_projeto" value="parcialmente">
                        Parcialmente Consistente
                    </label>
                    <label class="radio">
                        <input type="radio" name="estrutura_projeto" value="inconsistente">
                        Inconsistente
                    </label>
                </div>
            </div>
            <div class="field">
                <label class="label">Considerações sobre o item “RECURSOS” (opcional)</label>
                <div class="control">
                    <textarea class="textarea is-fullwidth is-rounded" placeholder="Digite suas considerações sobre oS RECURSOS aqui"></textarea>
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
                        <input type="radio" name="estrutura_projeto" value="consistente">
                        Consistente
                    </label>
                    <label class="radio">
                        <input type="radio" name="estrutura_projeto" value="parcialmente">
                        Parcialmente Consistente
                    </label>
                    <label class="radio">
                        <input type="radio" name="estrutura_projeto" value="inconsistente">
                        Inconsistente
                    </label>
                </div>
            </div>
            <div class="field">
                <label class="label">Considerações sobre o item “RESULTADOS ESPERADOS” (opcional)</label>
                <div class="control">
                    <textarea class="textarea is-fullwidth is-rounded" placeholder="Digite suas considerações sobre oS RESULTADOS ESPERADOS aqui"></textarea>
                </div>
            </div>
            <br>
            <h3>10 - EXTENSÃO</h3>
            <br>

            <div class="field">
                <label class="label">A proposta apresentada realmente trata de atividade de extensão?</label>
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="estrutura_projeto" value="sim">
                        Sim
                    </label>
                    <label class="radio">
                        <input type="radio" name="estrutura_projeto" value="parcialmente">
                        Parcialmente
                    </label>
                    <label class="radio">
                        <input type="radio" name="estrutura_projeto" value="nao">
                        Não
                    </label>
                </div>
            </div>
            <div class="field">
                <label class="label">Considerações sobre o item “EXTENSÃO” (opcional)</label>
                <div class="control">
                    <textarea class="textarea is-fullwidth is-rounded" placeholder="Digite suas considerações sobre o EXTENSÃO aqui"></textarea>
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