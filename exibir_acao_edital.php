<?php

include 'conexao.php'; 

// Sua consulta SQL
$sql = "SELECT * FROM acoes_edital";
$result = $conn->query($sql);

// Verifique se há resultados
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        exibirAcao($row);
    }
} else {
    echo "Nenhuma ação encontrada.";
}

// Lembre-se de fechar a conexão quando terminar de usá-la
$conn->close();

// Função para exibir um Acao
function exibirAcao($row) {
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
function exibirCampo($label, $conteudo) {
    echo "<div class='campo'><strong>{$label}:</strong> " . nl2br($conteudo) . "</div>";
}
?>
