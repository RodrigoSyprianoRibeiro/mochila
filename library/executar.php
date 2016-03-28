<?php

require_once('Log.php');
require_once('AlgoritmosGeneticos.php');

if ($_POST) {

    $inicioExecucao = date('Y-m-d H:i:s');

    $algoritimoGenetico = new AlgoritmosGeneticos($_POST);

    $algoritimoGenetico->gerarPopulacaoInicial();

    while ($algoritimoGenetico->quantidadeGeracoes > 0 && count($algoritimoGenetico->populacao) > 0) {

        $algoritimoGenetico->gerarNovaPopulacao();
        $algoritimoGenetico->atualizarVidaPopulacao();

        $melhorUltimoCromossomo = $algoritimoGenetico->getMelhorCromossomo();

        if ($melhorUltimoCromossomo !== null) {
            $melhorCromossomo = $melhorUltimoCromossomo;
        }

        $algoritimoGenetico->quantidadeGeracoes--;
    }

    $fimExecucao = date('Y-m-d H:i:s');
    Log::escreveArquivo($inicioExecucao, $fimExecucao, $melhorCromossomo, $_POST);

    echo json_encode($melhorCromossomo);
}