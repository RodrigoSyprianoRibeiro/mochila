<?php

require_once('Log.php');
require_once('AlgoritmosGeneticos.php');

if ($_POST) {

    $inicioExecucao = date('Y-m-d H:i:s');

    $algoritimoGenetico = new AlgoritmosGeneticos($_POST);

    $algoritimoGenetico->gerarPopulacaoInicial();

    $geracoes = $algoritimoGenetico->quantidadeGeracoes;

    while ($geracoes > 0 && count($algoritimoGenetico->populacao) > 0) {

        $algoritimoGenetico->gerarNovaPopulacao();
        $algoritimoGenetico->atualizarVidaPopulacao();

        $geracoes--;
    }

    $melhorCromossomo = $algoritimoGenetico->getMelhorCromossomo();

    $fimExecucao = date('Y-m-d H:i:s');
    Log::escreveArquivo($inicioExecucao, $fimExecucao, $melhorCromossomo, $_POST);

    echo json_encode($melhorCromossomo);
}