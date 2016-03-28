<?php

class Log {

  public static function mostraTempoExecucao($inicioExecucao, $fimExecucao) {

        $dateTime = new DateTime($inicioExecucao);
        $diferenca = $dateTime->diff(new DateTime($fimExecucao));

        $texto = "";
        $texto .= $diferenca->h > 0 ? $diferenca->h . ' hora(s), ' : '';
        $texto .= $diferenca->i > 0 ? $diferenca->i . ' minuto(s) e ' : '';
        $texto .= $diferenca->s . ' segundo(s)';

        return $texto;
    }

    public static function escreveArquivo($inicioExecucao, $fimExecucao, $melhorCromossomo, $dados) {
        $mutante = $melhorCromossomo->getMutante() == true ? "Sim" : "Não";
        $log = fopen("../log.txt", "a");
        $texto  = "Execução: ".self::formatoDataHoraPadrao($inicioExecucao, true)." - ".self::formatoDataHoraPadrao($fimExecucao, true)." (Duração: ".self::mostraTempoExecucao($inicioExecucao, $fimExecucao).") \n";
        $texto .= "Melhor Cromossomo: \n";
        $texto .= "Volume: ".$melhorCromossomo->getVolume().". ";
        $texto .= "Peso: ".$melhorCromossomo->getPeso().". ";
        $texto .= "Valor: ".$melhorCromossomo->getValor().".\n";
        $texto .= "Geração: ".$melhorCromossomo->getGeracao().". ";
        $texto .= "Tempo de Vida: ".$melhorCromossomo->getTempoVida()." Gerações.\n";
        $texto .= "É mutante: ".$mutante."\n";
        $texto .= "Parâmetros: \n";
        $texto .= "População inicial: ".$dados['populacao_inicial']."\n";
        $texto .= "Quantidade de Gerações: ".$dados['quantidade_geracoes']."\n";
        $texto .= "Quantidade da população que vai fazer Crossover: ".$dados['quantidade_crossover']."%\n";
        $texto .= "Quantidade da população que vai sofrer Mutação: ".$dados['quantidade_mutacao']."%\n";
        $texto .= "Quantidade de posições vetor serão alteradas na Mutação: ".$dados['quantidade_binario_mutacao']."\n";
        fwrite($log, $texto . "\n");
        fclose($log);
    }

    public static function formatoDataHoraPadrao($dataHora,$exibirHora=true) {
        $novaDataHora = explode(' ', $dataHora);
        $novaData = explode('-', $novaDataHora[0]);
        $novaHora = $exibirHora === true ? $novaDataHora[1] : "";
        return $novaData[2]."/".$novaData[1]."/".$novaData[0]." ".$novaHora;
    }
}