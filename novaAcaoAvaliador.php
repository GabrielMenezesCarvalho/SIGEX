<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.tiny.cloud/1/s3zlvxi87b9m37cn8vukivxht0lpogsjccobx1rw0kul8z9u/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Formulário de Submissão de Ação de Extensão</title>
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
        }

        .custom-field .field {
            flex: 1;
        }

        .margem-desktop {
            margin-left: 12%;

            margin-right: 12%;
        }

        .artigo {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 20px;
        }

        .metodologia,
        .referencias,
        .conteudo {
            margin-top: 10px;
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

        <form method="post" action="processar.php" onsubmit="return salvarDados()">
            <div class="container">
                <h1 class="title has-text-centered has-text-weight-bold">Formulário de Submissão de Ação de Extensão</h1>

                <br>

                <h2 class="subtitle">Dados do Coordenador</h2>





                <div class="field custom-field">
                    <div class="field mr-2">
                        <label class="label">Nome Completo</label>
                        <div class="control">
                            <input class="input is-fullwidth is-rounded" type="text" placeholder="Nome Completo" name="nome_completo_avaliador">
                        </div>
                    </div>
                    <div class="field mr-2">
                        <label class="label">CPF</label>
                        <div class="control">
                            <input class="input is-fullwidth is-rounded" type="text" placeholder="CPF" name="CPF_COORDENADOR">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">E-mail</label>
                        <div class="control">
                            <input class="input is-fullwidth is-rounded" type="email" placeholder="E-mail" name="EMAIL_COORDENADOR">
                        </div>
                    </div>
                </div>




                <div class="field custom-field">
                    <div class="field mr-2">
                        <label class="label">Titulação</label>
                        <div class="control">
                            <div class="select is-fullwidth is-rounded">
                                <select name="TITULACAO_COORDENADOR">
                                    <option>Doutor</option>
                                    <option>Mestre</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field mr-2">
                        <label class="label">Telefone</label>
                        <div class="control">
                            <input class="input is-fullwidth is-rounded" type="text" placeholder="Telefone" name="TELEFONE_COORDENADOR">
                        </div>
                    </div>
                    <div class="field mr-2">
                        <label class="label">Colegiado/Setor</label>
                        <div class="control">
                            <div class="select is-fullwidth is-rounded">
                                <select name="COLEGIADO_COORDENADOR">
                                    <option>Colegiado de Engenharia de Computação</option>
                                    <option>Colegiado de Engenharia Elétrica</option>
                                    <option>Proex</option>
                                    <option>Proen</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Campus do Proponente</label>
                        <div class="control">
                            <div class="select is-fullwidth is-rounded">
                                <select name="CAMPUS_COORDENADOR">
                                    <option>Petrolina</option>
                                    <option>Juazeiro</option>
                                    <option>CCA</option>
                                    <option>Serra da Capivara</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>



            </div>

            <div class="field">
                <h2 class="subtitle">Dados da Ação</h2>
            </div>


            <label class="label">Modalidade (Saúde, Educação)</label>
            <div class="control">
                <div class="select is-fullwidth is-rounded">
                    <select name="MODALIDADE">
                        <option>Saúde</option>
                        <option>Educação</option>
                    </select>
                </div>
            </div>

            <div class="field custom-field">
                <div class="field mr-2">
                    <label class="label">Estado</label>
                    <div class="control">
                        <div class="select is-fullwidth is-rounded">
                            <select id="estados" class="is-fullwidth is-rounded" name="ESTADO_ACAO">
                                <option value="">Selecione um estado</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="field mr-2">
                    <label class="label">Cidade</label>
                    <div class="control">
                        <div class="select is-fullwidth is-rounded">
                            <select id="cidades" class="is-fullwidth is-rounded" name="CIDADE_ACAO">
                                <option value="">Selecione um estado primeiro</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="field mr-2">
                    <label class="label">Zona (Rural ou Urbana)</label>
                    <div class="control">
                        <div class="select is-fullwidth is-rounded">
                            <select name="ZONA_ACAO">
                                <option>Rural</option>
                                <option>Urbana</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Bairro ou Comunidade</label>
                    <div class="control">
                        <input class="input is-fullwidth is-rounded" type="text" placeholder="Bairro ou Comunidade" name="BAIRRO_ACAO">
                    </div>
                </div>
            </div>






            <div class="field">
                <label class="label">Título</label>
                <div class="control">
                    <input class="input is-fullwidth is-rounded" type="text" id="titulo" name="titulo" placeholder="Título">
                </div>
            </div>
















            <div class="field">
                <label class="label">Resumo</label>
                <div class="control">
                    <textarea class="textarea is-fullwidth tinymce" placeholder="Resumo" name="RESUMO"></textarea>
                </div>
            </div>

            <div class="field">
                <label class="label">Introdução</label>
                <div class="control">
                    <textarea class="textarea is-fullwidth" placeholder="Introdução" name="INTRODUCAO"></textarea>
                </div>
            </div>

            <div class="field">
                <label class="label">Justificativa</label>
                <div class="control">
                    <textarea class="textarea is-fullwidth tinymce" placeholder="Justificativa" name="JUSTIFICATIVA"></textarea>
                </div>
            </div>

            <div class="field">
                <label class="label">Objetivos e Metas</label>
                <div class="control">
                    <textarea class="textarea is-fullwidth tinymce" placeholder="Objetivos e Metas" name="OBJETIVOS_METAS"></textarea>
                </div>
            </div>

            <div class="field">
                <label class="label">Metodologia</label>
                <div class="control">
                    <textarea class="textarea is-fullwidth tinymce" placeholder="Metodologia" name="METODOLOGIA"></textarea>
                </div>
            </div>

            <div class="field">
                <label class="label">Resultados Esperados</label>
                <div class="control">
                    <textarea class="textarea is-fullwidth tinymce" placeholder="Resultados Esperados" name="RESULTADOS_ESPERADOS"></textarea>
                </div>
            </div>

            <div class="field">
                <label class="label">Articulação com o ensino e a pesquisa</label>
                <div class="control">
                    <textarea class="textarea is-fullwidth tinymce" placeholder="Articulação com o ensino e a pesquisa" name="ARTICULACAO_ENSINO"></textarea>
                </div>
            </div>

            <div class="field" id="indicadores-sistematica">
                <label class="label">INDICADORES E SISTEMÁTICA</label>
                <div class="control">
                    <textarea class="textarea is-fullwidth tinymce" placeholder="INDICADORES E SISTEMÁTICA" name="INDICADORES_SISTEMATICA"></textarea>
                </div>
            </div>

            <div class="field" id="plano-trabalho-coordenador">
                <label class="label">PLANO DE TRABALHO COORDENADOR</label>
                <div class="control">
                    <textarea class="textarea is-fullwidth tinymce" placeholder="PLANO DE TRABALHO COORDENADOR" name="PLANO_TRABALHO_COORDENADOR"></textarea>
                </div>
            </div>

            <div class="field" id="plano-trabalho-discentes">
                <label class="label">PLANO DE TRABALHO DOS DISCENTES</label>
                <div class="control">
                    <textarea class="textarea is-fullwidth tinymce" placeholder="PLANO DE TRABALHO DOS DISCENTES" name="PLANO_TRABALHO_DISCENTE"></textarea>
                </div>
            </div>

            <div class="field">
                <label class="label">Relação com a Sociedade - Indicadores de Impacto</label>
                <div class="control">
                    <textarea class="textarea is-fullwidth tinymce" placeholder="Relação com a Sociedade - Indicadores de Impacto" name="RELACAO_SOCIEDADE"></textarea>
                </div>
            </div>

            <div class="field">
                <label class="label">Referências Bibliográficas</label>
                <div class="control">
                    <textarea class="textarea is-fullwidth tinymce" placeholder="Referências Bibliográficas" name="referencias"></textarea>
                </div>
            </div>

            <!-- Início das tabelas -->

            <div class="field">
                <h2 class="subtitle">Público-Alvo e Número de Pessoas Beneficiadas</h2>
            </div>

            <div class="field">
                <table class="table is-fullwidth">
                    <thead>
                        <tr>
                            <th>Público-Alvo</th>
                            <th>Descrição</th>
                            <th>Previsão do Nº de Pessoas Beneficiadas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Publico interno</td>
                            <td>
                                <div class="control">
                                    <input class="input" type="text" placeholder="Descrição do público interno">
                                </div>
                            </td>
                            <td>
                                <div class="control">
                                    <input class="input" type="number" placeholder="Número de pessoas">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Publico Externo</td>
                            <td>
                                <div class="control">
                                    <input class="input" type="text" placeholder="Descrição do público externo">
                                </div>
                            </td>
                            <td>
                                <div class="control">
                                    <input class="input" type="number" placeholder="Número de pessoas">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td></td>
                            <td>
                                <div class="control">
                                    <input class="input" type="number" placeholder="Número de pessoas">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>




            <div class="field">
                <h2 class="subtitle">Cronograma de Execução</h2>
            </div>



            <div class="field custom-field">
                <div class="field mr-2">
                    <label class="label">Início</label>
                    <div class="control">
                        <input class="input" type="date" name="inicio">
                    </div>
                </div>

                <div class="field mr-2">
                    <label class="label">Fim</label>
                    <div class="control">
                        <input class="input" type="date" name="fim">
                    </div>
                </div>

                <div class="field mr-2">
                    <label class="label">Carga Horária Semanal</label>
                    <div class="control">
                        <input class="input" type="number" placeholder="Horas" name="carga_semanal">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Carga Horária Total</label>
                    <div class="control">
                        <input class="input" type="number" placeholder="Horas" name="carga_total">
                    </div>
                </div>
            </div>



            <table class="table is-fullwidth" id="dataTable">
                <thead>
                    <tr>
                        <th>Atividades Planejadas</th>
                        <th>Período</th>
                        <th>Local</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="control"><input type="text" class="input" name="atividade[]" placeholder="Atividades Planejadas"></div>
                        </td>
                        <td>
                            <div class="control"><input type="text" class="input" name="periodo[]" placeholder="Período"></div>
                        </td>
                        <td>
                            <div class="control"><input type="text" class="input" name="local[]" placeholder="Local"></div>
                        </td>
                    </tr>
                    <!-- Linhas da tabela serão adicionadas aqui dinamicamente -->
                </tbody>
            </table>

            <button class="button is-primary" type="button" onclick="adicionarLinha()">Adicionar mais uma atividade</button>







            <br><br>
            <div class="field">
                <h2 class="subtitle">Equipe de Execução</h2>
            </div>



            <table class="table is-fullwidth" id="equipe-execucao-table">
                <thead>
                    <tr>
                        <th>Nome Completo</th>
                        <th>CPF</th>
                        <th>Instituição</th>
                        <th>Colegiado/Setor</th>
                        <th>Categoria Profissional</th>
                        <th>Função no Projeto</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="control">
                                <input class="input" type="text" placeholder="Nome Completo">
                            </div>
                        </td>
                        <td>
                            <div class="control">
                                <input class="input" type="text" placeholder="CPF">
                            </div>
                        </td>
                        <td>
                            <div class="control">
                                <input class="input" type="text" placeholder="Instituição">
                            </div>
                        </td>
                        <td>
                            <div class="control">
                                <input class="input" type="text" placeholder="Colegiado/Setor">
                            </div>
                        </td>
                        <td>
                            <div class="control">
                                <input class="input" type="text" placeholder="Categoria Profissional">
                            </div>
                        </td>
                        <td>
                            <div class="control">
                                <input class="input" type="text" placeholder="Função no Projeto">
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- Botão para adicionar nova linha -->
            <div class="field">
                <div class="control">
                    <button type="button" class="button is-primary" id="addEquipeExecucaoRow">Adicionar Linha</button>
                </div>
            </div>







            <div class="field">
                <h2 class="subtitle">Proposta Orçamentária (Previsão)</h2>
            </div>

            <table class="table is-fullwidth">
                <thead>
                    <tr>
                        <th>Recursos</th>
                        <th>Justificativas</th>
                        <th>Custos Previstos</th>
                        <th>Origem do Recurso</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Bolsa de Extensão</td>
                        <td>
                            <div class="control">
                                <input class="input" type="text" placeholder="Justificativas">
                            </div>
                        </td>
                        <td>
                            <div class="control">
                                <input class="input custo-previsto" type="number" placeholder="Custos Previstos">
                            </div>
                        </td>
                        <td>
                            <div class="control">
                                <input class="input" type="text" placeholder="Origem do Recurso">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Material de Consumo</td>
                        <td>
                            <div class="control">
                                <input class="input" type="text" placeholder="Justificativas">
                            </div>
                        </td>
                        <td>
                            <div class="control">
                                <input class="input custo-previsto" type="number" placeholder="Custos Previstos">
                            </div>
                        </td>
                        <td>
                            <div class="control">
                                <input class="input" type="text" placeholder="Origem do Recurso">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Outros Serviços de Terceiros Pessoa Jurídica</td>
                        <td>
                            <div class="control">
                                <input class="input" type="text" placeholder="Justificativas">
                            </div>
                        </td>
                        <td>
                            <div class="control">
                                <input class="input custo-previsto" type="number" placeholder="Custos Previstos">
                            </div>
                        </td>
                        <td>
                            <div class="control">
                                <input class="input" type="text" placeholder="Origem do Recurso">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Outras Despesas</td>
                        <td>
                            <div class="control">
                                <input class="input" type="text" placeholder="Justificativas">
                            </div>
                        </td>
                        <td>
                            <div class="control">
                                <input class="input custo-previsto" type="number" placeholder="Custos Previstos">
                            </div>
                        </td>
                        <td>
                            <div class="control">
                                <input class="input" type="text" placeholder="Origem do Recurso">
                            </div>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td>Total</td>
                        <td></td>
                        <td>
                            <div class="control">
                                <input class="input" id="total-custos" type="number" placeholder="Total">
                            </div>
                        </td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>




            <div class="field">
                <h2 class="subtitle">Dados Complementares da Ação</h2>
            </div>

            <div class="field">
                <label class="label">Ação está no PPC do curso?</label>
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="PPC" value="sim">
                        Sim
                    </label>
                    <label class="radio">
                        <input type="radio" name="PPC" value="nao" checked>
                        Não
                    </label>
                </div>
            </div>

            <div class="field">
                <label class="label">Ação tem anuência do colegiado ou setor?</label>
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="ANUENCIA" value="sim">
                        Sim
                    </label>
                    <label class="radio">
                        <input type="radio" name="ANUENCIA" value="nao" checked>
                        Não
                    </label>
                </div>
            </div>

            <div class="field">
                <label class="label">Abrangência da Ação</label>
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="ABRANGENCIA" value="local" checked>
                        Local
                    </label>
                    <label class="radio">
                        <input type="radio" name="ABRANGENCIA" value="regional">
                        Regional
                    </label>
                    <label class="radio">
                        <input type="radio" name="ABRANGENCIA" value="nacional">
                        Nacional
                    </label>
                    <label class="radio">
                        <input type="radio" name="ABRANGENCIA" value="internacional">
                        Internacional
                    </label>
                </div>
            </div>

            <div class="field">
                <label class="label">Ação vinculada a Liga Acadêmica?</label>
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="VINCULO_LIGA" value="sim">
                        Sim
                    </label>
                    <label class="radio">
                        <input type="radio" name="VINCULO_LIGA" value="nao" checked>
                        Não
                    </label>
                </div>
            </div>

            <div class="field" id="ligaAcademicaDropdown" style="display: none;">
                <label class="label">Qual Liga Acadêmica?</label>
                <div class="control">
                    <div class="select is-fullwidth is-rounded">
                        <select>
                            <option value="EQUIVASF">EQUIVASF - Liga Acadêmica de Hipiatria</option>
                            <option value="LAAPA">EQUIVASF - Liga Acadêmica de Hipiatria</option>
                            <option value="LABiClin">LABiClin - Liga Acadêmica de Bioquímica Clinica </option>
                            <option value="opcao2">LACARPA - Liga Acadêmica de Cardiologia de Paulo Afonso</option>
                            <option value="opcao1">LACIPA - Liga Acadêmica de Cirurgia de Paulo Afonso</option>
                            <option value="opcao2">Tipo</option>


                        </select>
                    </div>
                </div>
            </div>

            <script>
                //caso sim, exibe a pergunta qual liga academica
                const ligaAcademicaRadio = document.querySelectorAll('input[name="VINCULO_LIGA"]');
                const ligaAcademicaDropdown = document.getElementById('ligaAcademicaDropdown');

                ligaAcademicaRadio.forEach(radio => {
                    radio.addEventListener('change', function() {
                        if (this.value === 'sim') {
                            ligaAcademicaDropdown.style.display = 'block';
                        } else {
                            ligaAcademicaDropdown.style.display = 'none';
                        }
                    });
                });
            </script>
            <div class="field">
                <label class="label">Ação vinculada a Empresa Júnior?</label>
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="VINCULO_EMPRESAJR" value="sim">
                        Sim
                    </label>
                    <label class="radio">
                        <input type="radio" name="VINCULO_EMPRESAJR" value="nao" checked>
                        Não
                    </label>
                </div>
            </div>

            <div class="field" id="empresaJuniorDropdown" style="display: none;">
                <label class="label">Qual Empresa Júnior?</label>
                <div class="control">
                    <div class="select is-fullwidth is-rounded">
                        <select>
                            <option value="opcao1">Opção 1</option>
                            <option value="opcao2">Opção 2</option>
                        </select>
                    </div>
                </div>
            </div>

            <script>
                const empresaJuniorRadio = document.querySelectorAll('input[name="VINCULO_EMPRESAJR"]');
                const empresaJuniorDropdown = document.getElementById('empresaJuniorDropdown');

                empresaJuniorRadio.forEach(radio => {
                    radio.addEventListener('change', function() {
                        if (this.value === 'sim') {
                            empresaJuniorDropdown.style.display = 'block';
                        } else {
                            empresaJuniorDropdown.style.display = 'none';
                        }
                    });
                });
            </script>
            <div class="field">
                <label class="label">Ação beneficia grupos sociais vulneráveis?</label>
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="BENEFICIA_GRUPOVUNERAVEL" value="sim">
                        Sim
                    </label>
                    <label class="radio">
                        <input type="radio" name="BENEFICIA_GRUPOVUNERAVEL" value="nao" checked>
                        Não
                    </label>
                </div>
            </div>

            <div class="field" id="gruposVulneraveisDropdown" style="display: none;">
                <label class="label">Qual Grupo Social Vulnerável?</label>
                <div class="control">
                    <div class="select is-fullwidth is-rounded">
                        <select>
                            <option value="opcao1">Opção 1</option>
                            <option value="opcao2">Opção 2</option>
                        </select>
                    </div>
                </div>
            </div>

            <script>
                const gruposVulneraveisRadio = document.querySelectorAll('input[name="BENEFICIA_GRUPOVUNERAVEL"]');
                const gruposVulneraveisDropdown = document.getElementById('gruposVulneraveisDropdown');

                gruposVulneraveisRadio.forEach(radio => {
                    radio.addEventListener('change', function() {
                        if (this.value === 'sim') {
                            gruposVulneraveisDropdown.style.display = 'block';
                        } else {
                            gruposVulneraveisDropdown.style.display = 'none';
                        }
                    });
                });
            </script>
            <div class="field">
                <label class="label">A ação foi aprovada em fomento externo público?</label>
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="APROVADA_FOMENTO_PUBLICO" value="sim">
                        Sim
                    </label>
                    <label class="radio">
                        <input type="radio" name="APROVADA_FOMENTO_PUBLICO" value="nao" checked>
                        Não
                    </label>
                </div>
            </div>

            <div class="field" id="fomentoExternoDropdown" style="display: none;">
                <label class="label">Qual Fomento Externo?</label>
                <div class="control">
                    <div class="select is-fullwidth is-rounded">
                        <select>
                            <option value="opcao1">Opção 1</option>
                            <option value="opcao2">Opção 2</option>
                        </select>
                    </div>
                </div>
            </div>

            <script>
                const fomentoExternoRadio = document.querySelectorAll('input[name="APROVADA_FOMENTO_PUBLICO"]');
                const fomentoExternoDropdown = document.getElementById('fomentoExternoDropdown');

                fomentoExternoRadio.forEach(radio => {
                    radio.addEventListener('change', function() {
                        if (this.value === 'sim') {
                            fomentoExternoDropdown.style.display = 'block';
                        } else {
                            fomentoExternoDropdown.style.display = 'none';
                        }
                    });
                });
            </script>

            <div class="field">
                <label class="label">Ação em parceria com outras instituições?</label>
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="PARCERIA_OUTRA_INSTITUICOES" value="sim">
                        Sim
                    </label>
                    <label class="radio">
                        <input type="radio" name="PARCERIA_OUTRA_INSTITUICOES" value="nao" checked>
                        Não
                    </label>
                </div>
            </div>

            <div class="field" id="parceriaInstituicoesDetalhes" style="display: none;">
                <label class="label">Tipo de instituição:</label>
                <div class="control">
                    <label class="radio">
                        <input type="radio" name="TIPO_INSTITUICAO" value="publicas">
                        Públicas
                    </label>
                    <label class="radio">
                        <input type="radio" name="TIPO_INSTITUICAO" value="privadas">
                        Privadas
                    </label>
                    <label class="radio">
                        <input type="radio" name="TIPO_INSTITUICAO" value="nao_governamentais">
                        Não Governamentais
                    </label>
                </div>
                <div class="field">
                    <label class="label">Nome da instituição:</label>
                    <div class="control">
                        <input class="input" type="text" id="nomeInstituicao" placeholder="Nome da instituição" name="NOME_INSTITUICAO">
                    </div>
                </div>
            </div>

            <div class="has-text-centered">
                <button type="button" class="button is-danger is-large" onclick="window.location.href='menuavaliador.php';">Voltar</button>
                <button type="submit" class="button is-success is-large">Salvar Ação</button>

            </div>

            <h2>Ações Cadastradas (temporariamente nessa página)</h2>
            <div>
                <?php
                // PHP para exibir os artigos
                include("exibir_acao_edital.php");
                ?>
            </div>
        </form>

        <script>
            const parceriaInstituicoesRadio = document.querySelectorAll('input[name="PARCERIA_OUTRA_INSTITUICOES"]');
            const parceriaInstituicoesDetalhes = document.getElementById('parceriaInstituicoesDetalhes');

            parceriaInstituicoesRadio.forEach(radio => {
                radio.addEventListener('change', function() {
                    if (this.value === 'sim') {
                        parceriaInstituicoesDetalhes.style.display = 'block';
                    } else {
                        parceriaInstituicoesDetalhes.style.display = 'none';
                    }
                });
            });
        </script>


        <script>
            // Função para calcular o total dos custos previstos
            function calcularTotalCustos() {
                const custoInputs = document.querySelectorAll('.custo-previsto');
                let total = 0;

                custoInputs.forEach(input => {
                    const custo = parseFloat(input.value) || 0;
                    total += custo;
                });

                // Atualize o valor total na página
                const totalCustosElement = document.getElementById('total-custos');
                totalCustosElement.value = total;
            }

            // Adicionar um ouvinte de evento para os campos de custos previstos
            const custoInputs = document.querySelectorAll('.custo-previsto');
            custoInputs.forEach(input => {
                input.addEventListener('input', calcularTotalCustos);
            });
        </script>
        <script>
            // Função para adicionar uma nova linha na tabela da equipe de execução
            document.getElementById('addEquipeExecucaoRow').addEventListener('click', function() {
                const tableBody = document.querySelector('#equipe-execucao-table tbody');
                const newRow = document.createElement('tr');
                newRow.innerHTML = `
                    <td>
                        <div class="control">
                            <input class="input" type="text" placeholder="Nome Completo">
                        </div>
                    </td>
                    <td>
                        <div class="control">
                            <input class="input" type="text" placeholder="CPF">
                        </div>
                    </td>
                    <td>
                        <div class="control">
                            <input class="input" type="text" placeholder="Instituição">
                        </div>
                    </td>
                    <td>
                        <div class="control">
                            <input class="input" type="text" placeholder="Colegiado/Setor">
                        </div>
                    </td>
                    <td>
                        <div class="control">
                            <input class="input" type="text" placeholder="Categoria Profissional">
                        </div>
                    </td>
                    <td>
                        <div class="control">
                            <input class="input" type="text" placeholder="Função no Projeto">
                        </div>
                    </td>
                `;
                tableBody.appendChild(newRow);
            });
        </script>

        <script>
            // Função para preencher o dropdown de estados
            function preencherEstados() {
                fetch('https://servicodados.ibge.gov.br/api/v1/localidades/estados')
                    .then(response => response.json())
                    .then(data => {
                        const estadosDropdown = document.getElementById('estados');
                        data.forEach(estado => {
                            const option = document.createElement('option');
                            option.value = estado.id;
                            option.textContent = estado.nome;
                            estadosDropdown.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Erro ao buscar estados:', error));
            }

            // Função para preencher o dropdown de cidades com base no estado selecionado
            function preencherCidades(estadoId) {
                fetch(`https://servicodados.ibge.gov.br/api/v1/localidades/estados/${estadoId}/municipios`)
                    .then(response => response.json())
                    .then(data => {
                        const cidadesDropdown = document.getElementById('cidades');
                        cidadesDropdown.innerHTML = '<option value="">Selecione uma cidade</option>';
                        data.forEach(cidade => {
                            const option = document.createElement('option');
                            option.value = cidade.id;
                            option.textContent = cidade.nome;
                            cidadesDropdown.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Erro ao buscar cidades:', error));
            }

            // Adicionar um ouvinte de evento para o dropdown de estados
            const estadosDropdown = document.getElementById('estados');
            estadosDropdown.addEventListener('change', function() {
                const estadoSelecionado = this.value;
                if (estadoSelecionado) {
                    preencherCidades(estadoSelecionado);
                } else {
                    const cidadesDropdown = document.getElementById('cidades');
                    cidadesDropdown.innerHTML = '<option value="">Selecione um estado primeiro</option>';
                }
            });

            // Preencher inicialmente o dropdown de estados
            preencherEstados();
        </script>

        <script>
            tinymce.init({
                selector: '.tinymce',
                height: 300,
                plugins: 'anchor autolink charmap codesample image link lists media searchreplace table visualblocks wordcount',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments |  a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                tinycomments_mode: 'embedded',
                // images_upload_url: 'upload.php',
                images_upload_handler: (blobInfo, progress) => new Promise((resolve, reject) => {
                    const xhr = new XMLHttpRequest();
                    xhr.withCredentials = false;
                    xhr.open('POST', 'upload.php');

                    xhr.upload.onprogress = (e) => {
                        progress(e.loaded / e.total * 100);
                    };

                    xhr.onload = () => {
                        if (xhr.status === 403) {
                            reject({
                                message: 'HTTP Error: ' + xhr.status,
                                remove: true
                            });
                            return;
                        }

                        if (xhr.status < 200 || xhr.status >= 300) {
                            console.log(xhr);
                            reject('HTTP Error: ' + xhr.status + ' ' + xhr.statusText);
                            return;
                        }

                        const json = JSON.parse(xhr.responseText);

                        if (!json || typeof json.location != 'string') {
                            reject('Invalid JSON: ' + xhr.responseText);
                            return;
                        }

                        resolve(json.location);
                    };

                    xhr.onerror = () => {
                        reject('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
                    };

                    const formData = new FormData();
                    formData.append('file', blobInfo.blob(), blobInfo.filename());

                    xhr.send(formData);
                })
            });

            // colocar imagem no tinymce
            const images = document.querySelectorAll('.image');
            images.forEach(image => {
                image.addEventListener('click', event => {
                    // tinymce.activeEditor.execCommand('mceInsertContent', false, image.outerHTML);
                    tinymce.get('image').execCommand('mceInsertContent', false, image.outerHTML);
                    // tinymce.activeEditor.setContent(image.outerHTML);
                    console.log(event);
                })
            })
        </script>





    </section>

    <!--Scripts para funcionar o resgate das tabelas-->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="script.js"></script>
</body>

</html>