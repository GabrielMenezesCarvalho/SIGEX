<?php

include 'conexao.php';

$titulo = $_POST['titulo'];
$metodologia = $_POST['METODOLOGIA'];
$referencias = $_POST['referencias'];
$nome_completo_avaliador = $_POST['nome_completo_avaliador'];
$CPF_COORDENADOR = $_POST['CPF_COORDENADOR'];
$EMAIL_COORDENADOR = $_POST['EMAIL_COORDENADOR'];
$TITULACAO_COORDENADOR = $_POST['TITULACAO_COORDENADOR'];
$TELEFONE_COORDENADOR = $_POST['TELEFONE_COORDENADOR'];
$COLEGIADO_COORDENADOR = $_POST['COLEGIADO_COORDENADOR'];
$CAMPUS_COORDENADOR = $_POST['CAMPUS_COORDENADOR'];
$MODALIDADE = $_POST['MODALIDADE'];
$ESTADO_ACAO = $_POST['ESTADO_ACAO'];
$CIDADE_ACAO = $_POST['CIDADE_ACAO'];
$ZONA_ACAO = $_POST['ZONA_ACAO'];
$BAIRRO_ACAO = $_POST['BAIRRO_ACAO'];
$RESUMO = $_POST['RESUMO'];
$INTRODUCAO = $_POST['INTRODUCAO'];
$JUSTIFICATIVA = $_POST['JUSTIFICATIVA'];
$OBJETIVOS_METAS = $_POST['OBJETIVOS_METAS'];
$RESULTADOS_ESPERADOS = $_POST['RESULTADOS_ESPERADOS'];
$ARTICULACAO_ENSINO = $_POST['ARTICULACAO_ENSINO'];
$INDICADORES_SISTEMATICA = $_POST['INDICADORES_SISTEMATICA'];
$PLANO_TRABALHO_COORDENADOR = $_POST['PLANO_TRABALHO_COORDENADOR'];
$PLANO_TRABALHO_DISCENTE = $_POST['PLANO_TRABALHO_DISCENTE'];
$RELACAO_SOCIEDADE = $_POST['RELACAO_SOCIEDADE'];
$PPC = $_POST['PPC'];
$ANUENCIA = $_POST['ANUENCIA'];
$ABRANGENCIA = $_POST['ABRANGENCIA'];
$VINCULO_LIGA = $_POST['VINCULO_LIGA'];
$VINCULO_EMPRESAJR = $_POST['VINCULO_EMPRESAJR'];
$BENEFICIA_GRUPOVUNERAVEL = $_POST['BENEFICIA_GRUPOVUNERAVEL'];
$APROVADA_FOMENTO_PUBLICO = $_POST['APROVADA_FOMENTO_PUBLICO'];
$PARCERIA_OUTRA_INSTITUICOES = $_POST['PARCERIA_OUTRA_INSTITUICOES'];

// Novos campos para o público-alvo e número de pessoas beneficiadas
$publico_interno_descricao = $_POST['publico_interno_descricao'];
$publico_interno_numero = $_POST['publico_interno_numero'];
$publico_externo_descricao = $_POST['publico_externo_descricao'];
$publico_externo_numero = $_POST['publico_externo_numero'];
$total_pessoas_beneficiadas = $_POST['total_pessoas_beneficiadas'];
$inicio = $_POST['inicio'];
$fim = $_POST['fim'];
$carga_semanal = $_POST['carga_semanal'];
$carga_total = $_POST['carga_total'];

$sql = "INSERT INTO acoes_edital (
    titulo,
    METODOLOGIA,
    referencias,
    nome_completo_avaliador,
    CPF_COORDENADOR,
    EMAIL_COORDENADOR,
    TITULACAO_COORDENADOR,
    TELEFONE_COORDENADOR,
    COLEGIADO_COORDENADOR,
    CAMPUS_COORDENADOR,
    MODALIDADE,
    ESTADO_ACAO,
    CIDADE_ACAO,
    ZONA_ACAO,
    BAIRRO_ACAO,
    RESUMO,
    INTRODUCAO,
    JUSTIFICATIVA,
    OBJETIVOS_METAS,
    RESULTADOS_ESPERADOS,
    ARTICULACAO_ENSINO,
    INDICADORES_SISTEMATICA,
    PLANO_TRABALHO_COORDENADOR,
    PLANO_TRABALHO_DISCENTE,
    RELACAO_SOCIEDADE,
    PPC,
    ANUENCIA,
    ABRANGENCIA,
    VINCULO_LIGA,
    VINCULO_EMPRESAJR,
    BENEFICIA_GRUPOVUNERAVEL,
    APROVADA_FOMENTO_PUBLICO,
    PARCERIA_OUTRA_INSTITUICOES,
    publico_interno_descricao,
    publico_interno_numero,
    publico_externo_descricao,
    publico_externo_numero,
    total_pessoas_beneficiadas,
    inicio,
    fim,
    carga_semanal,
    carga_total
) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    // Verificar se houve um erro na preparação da consulta
    echo "Erro na preparação da consulta: " . $conn->error;
    exit;
}

$stmt->bind_param(
    "ssssssssssssssssssssssssssssssssssssssssii",
    $titulo,
    $metodologia,
    $referencias,
    $nome_completo_avaliador,
    $CPF_COORDENADOR,
    $EMAIL_COORDENADOR,
    $TITULACAO_COORDENADOR,
    $TELEFONE_COORDENADOR,
    $COLEGIADO_COORDENADOR,
    $CAMPUS_COORDENADOR,
    $MODALIDADE,
    $ESTADO_ACAO,
    $CIDADE_ACAO,
    $ZONA_ACAO,
    $BAIRRO_ACAO,
    $RESUMO,
    $INTRODUCAO,
    $JUSTIFICATIVA,
    $OBJETIVOS_METAS,
    $RESULTADOS_ESPERADOS,
    $ARTICULACAO_ENSINO,
    $INDICADORES_SISTEMATICA,
    $PLANO_TRABALHO_COORDENADOR,
    $PLANO_TRABALHO_DISCENTE,
    $RELACAO_SOCIEDADE,
    $PPC,
    $ANUENCIA,
    $ABRANGENCIA,
    $VINCULO_LIGA,
    $VINCULO_EMPRESAJR,
    $BENEFICIA_GRUPOVUNERAVEL,
    $APROVADA_FOMENTO_PUBLICO,
    $PARCERIA_OUTRA_INSTITUICOES,
    $publico_interno_descricao,
    $publico_interno_numero,
    $publico_externo_descricao,
    $publico_externo_numero,
    $total_pessoas_beneficiadas,
    $inicio,
    $fim,
    $carga_semanal,
    $carga_total
);

if ($stmt->execute()) {
    // Obter o ID da ação recém-inserida
    $id_acao = $stmt->insert_id;

    // Inserir as atividades planejadas
    $atividades = $_POST['atividade'];
    $periodos = $_POST['periodo'];
    $locais = $_POST['localidade'];

    // Verificar se as arrays têm o mesmo comprimento
    if (!empty($atividades) && count($atividades) == count($periodos) && count($atividades) == count($locais)) {
        $sql_atividades = "INSERT INTO atividades_planejadas (id_acao, atividade, periodo, localidade) VALUES (?, ?, ?, ?)";
        $stmt_atividades = $conn->prepare($sql_atividades);

        // Verificar se a preparação da consulta foi bem-sucedida
        if (!$stmt_atividades) {
            echo "Erro na preparação da consulta de atividades_planejadas: " . $conn->error;
            exit;
        }

        // Iterar sobre as atividades e inserir na tabela atividades_planejadas
        for ($i = 0; $i < count($atividades); $i++) {
            $stmt_atividades->bind_param("isss", $id_acao, $atividades[$i], $periodos[$i], $locais[$i]);
            $stmt_atividades->execute();
        }

        $stmt_atividades->close();
    } else {
        echo "<script>
            alert('Erro: As arrays de atividades, períodos e locais não têm o mesmo comprimento.');
        </script>";
        echo "Count Atividades: " . count($atividades) . " / Count Períodos: " . count($periodos) . " / Count Locais: " . count($locais);
    }

    $equipe_execucao = $_POST['equipe_execucao'];

    if (!empty($equipe_execucao['nome_completo']) && is_array($equipe_execucao['nome_completo']) && count($equipe_execucao['nome_completo']) > 0) {
        $sql_equipe = "INSERT INTO equipe_execucao (id_acao, nome_completo, cpf, instituicao, colegiado_setor, categoria_profissional, funcao_projeto) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt_equipe = $conn->prepare($sql_equipe);

        if (!$stmt_equipe) {
            echo "Erro na preparação da consulta de equipe_execucao: " . $conn->error;
            exit;
        }

        foreach ($equipe_execucao['nome_completo'] as $index => $nome_completo) {
            $stmt_equipe->bind_param(
                "issssss",
                $id_acao,
                $nome_completo,
                $equipe_execucao['cpf'][$index],
                $equipe_execucao['instituicao'][$index],
                $equipe_execucao['colegiado_setor'][$index],
                $equipe_execucao['categoria_profissional'][$index],
                $equipe_execucao['funcao_projeto'][$index]
            );
            $stmt_equipe->execute();
        }

        $stmt_equipe->close();
    } else {
        echo "<script>alert('Erro: A equipe de execução não foi fornecida ou está vazia.');</script>";
    }
    // Inserir proposta orçamentária
$stmt_proposta = null;  // Inicializar $stmt_proposta fora do bloco condicional

if (is_array($_POST['proposta_orcamentaria'])) {
    $propostas_orcamentarias = $_POST['proposta_orcamentaria'];

    // Não é mais necessário verificar 'recurso'
    $sql_proposta = "INSERT INTO proposta_orcamentaria (id_acao, recurso, justificativas, custos_previstos, origem_recurso) VALUES (?, ?, ?, ?, ?)";
    $stmt_proposta = $conn->prepare($sql_proposta);

    if (!$stmt_proposta) {
        echo "Erro na preparação da consulta de proposta_orcamentaria: " . $conn->error;
        exit;
    }

    // Array de valores padrão para 'recurso'
    $recursos_padrao = array("Bolsa de Extensão", "Material de Consumo", "Outros Serviços de Terceiros Pessoa Jurídica", "Outras Despesas");

    foreach ($propostas_orcamentarias['justificativas'] as $index => $justificativa) {
        $custo_previsto = $propostas_orcamentarias['custos_previstos'][$index];
        $origem_recurso = $propostas_orcamentarias['origem_recurso'][$index];

        // Obtém o valor padrão correspondente ao índice atual
        $recurso_padrao = $recursos_padrao[$index];

        if (!$stmt_proposta->bind_param("sssds", $id_acao, $recurso_padrao, $justificativa, $custo_previsto, $origem_recurso)) {
            echo "Erro ao vincular parâmetros: " . $stmt_proposta->error;
            exit;
        }
        
        
        if (!$stmt_proposta->execute()) {
            echo "Erro ao executar a consulta de proposta_orcamentaria: " . $stmt_proposta->error;
            exit;
        }
    }
} else {
    echo "<script>alert('Erro: A chave proposta_orcamentaria não está presente no array \$_POST.');</script>";
}

// Fechar a declaração apenas se ela foi criada
if ($stmt_proposta) {
    $stmt_proposta->close();
}
echo "<script>alert('Ação salva com sucesso!');</script>";
echo '<script>window.location.href = "novaAcaoAvaliador.php";</script>';


} else {
    echo "<script>alert('Erro ao salvar a ação: " . $stmt->error . "');</script>";
}

$stmt->close();
$conn->close();
