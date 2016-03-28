<?php

require_once('Util.php');
require_once('Cromossomo.php');

class AlgoritmosGeneticos {

    public $listaArtigos;

    public $geracaoAtual;
    public $populacao;

    // Parametros passados
    public $quantidadePopulacaoInicial; // Quantidade da população inicial.
    public $quantidadeGeracoes; // Quantidade de quantas vezes vai gerar população nova.
    public $quantidadeCrossover; // Quantidade da população que vai fazer Crossover.
    public $quantidadeMutacao; // Quantidade da população que vai sofrer Mutação.
    public $quantidadeBinarioMutacao; // Quantidade de quantas posições no vetor serão alteradas na Mutação.

    function __construct($dados) {

        $this->listaArtigos = Util::gerarListaArtigos();

        $this->geracaoAtual = 1;
        $this->populacao = array();

        // Parametros passados
        $this->quantidadePopulacaoInicial = (int) $dados['populacao_inicial'];
        $this->quantidadeGeracoes = (int) ($dados['quantidade_geracoes'] - 1);
        $this->quantidadeCrossover = (float) ($dados['quantidade_crossover'] / 100);
        $this->quantidadeMutacao = (float) ($dados['quantidade_mutacao'] / 100);
        $this->quantidadeBinarioMutacao = (int) $dados['quantidade_binario_mutacao'];
    }

    public function gerarPopulacaoInicial() {
        $tamanhoListaArtigos = count($this->listaArtigos);
        for ($i = 0; $i < $this->quantidadePopulacaoInicial; $i++) {
            $cromossomo = new Cromossomo($this->geracaoAtual);
            $cromossomo->gerarVetor($tamanhoListaArtigos);
            $cromossomo->calcularValores($this->listaArtigos);
            $cromossomo->calcularAptidaoTempoVida();
            array_push($this->populacao, $cromossomo);
        }
    }

    public function gerarNovaPopulacao() {

        $this->geracaoAtual++;

        $this->crossover();

        $this->mutacao();
    }

    public function crossover() {

        $populacaoCrossover = $this->geraPopulacaoCrossover();
        $tamanhoPopulacaoCrossover = count($populacaoCrossover);

        for ($i = 0; $i < $tamanhoPopulacaoCrossover; $i += 2) {
            $this->aplicarCrossover($populacaoCrossover[$i], $populacaoCrossover[$i+1]);
        }

        $this->populacao = array_merge($this->populacao, $populacaoCrossover);
        unset($populacaoCrossover);
    }

    public function geraPopulacaoCrossover() {
        $tamanhoPopulacao = count($this->populacao);
        $quantidadeCrossover = ceil($tamanhoPopulacao * $this->quantidadeCrossover);
        $totalCrossover = ($quantidadeCrossover % 2 == 0) ? $quantidadeCrossover : $quantidadeCrossover - 1;
        $populacaoCrossover = array();
        foreach (Util::gerarNumerosAleatoriosDiferentes(0, $tamanhoPopulacao - 1, $totalCrossover, 'DESC') AS $numero) {
            array_push($populacaoCrossover, $this->populacao[$numero]);
            unset($this->populacao[$numero]);
        }
        return $populacaoCrossover;
    }

    public function aplicarCrossover($cromossomo1, $cromossomo2) {

        $cromossomoFilho1 = new Cromossomo($this->geracaoAtual);
        $cromossomoFilho2 = new Cromossomo($this->geracaoAtual);

        $tamanhoListaArtigos = count($this->listaArtigos);
        $pontosCorte = Util::gerarNumerosAleatoriosDiferentes(1, $tamanhoListaArtigos - 1, 2, 'ASC');

        for ($i = 0; $i < $tamanhoListaArtigos; $i++) {
            if ($i >= $pontosCorte[0] && $i < $pontosCorte[1]) {
                $cromossomoFilho1->vetor[$i] = $cromossomo2->vetor[$i];
                $cromossomoFilho2->vetor[$i] = $cromossomo1->vetor[$i];
            } else {
                $cromossomoFilho1->vetor[$i] = $cromossomo1->vetor[$i];
                $cromossomoFilho2->vetor[$i] = $cromossomo2->vetor[$i];
            }
        }

        $cromossomoFilho1->calcularValores($this->listaArtigos);
        $cromossomoFilho1->calcularAptidaoTempoVida();

        $cromossomoFilho2->calcularValores($this->listaArtigos);
        $cromossomoFilho2->calcularAptidaoTempoVida();

        array_push($this->populacao, $cromossomoFilho1);
        array_push($this->populacao, $cromossomoFilho2);
    }

    public function mutacao() {
        $tamanhoPopulacao = count($this->populacao);
        $totalMutacao = ceil($tamanhoPopulacao * $this->quantidadeMutacao);
        foreach (Util::gerarNumerosAleatoriosDiferentes(0, $tamanhoPopulacao - 1, $totalMutacao, 'ASC') AS $numero) {
            $this->aplicarMutacao($this->populacao[$numero]);
        }
    }

    public function aplicarMutacao($cromossomo) {
        $tamanhoListaArtigos = count($this->listaArtigos);
        foreach (Util::gerarNumerosAleatoriosDiferentes(0, $tamanhoListaArtigos - 1, $this->quantidadeBinarioMutacao, 'ASC') AS $numero) {
            $cromossomo->vetor[$numero] = $cromossomo->vetor[$numero] == 1 ? 0 : 1;
        }
        $cromossomo->calcularValores($this->listaArtigos);
        $cromossomo->calcularAptidaoTempoVida();
        $cromossomo->setMutante(true);
    }

    public function atualizarVidaPopulacao() {
        foreach ($this->populacao AS $indice => $cromossomo) {
            $cromossomo->setIdade($cromossomo->getIdade() - 1);
            if ($cromossomo->getIdade() == 0) {
                unset($this->populacao[$indice]);
            }
        }
    }

    public function getMelhorCromossomo() {
        if (count($this->populacao) > 0) {
            $this->ordenarPopulacaoMaiorMenor();
            foreach ($this->populacao AS $cromossomo) {
                if ($cromossomo->getVolume() <= 125 && $cromossomo->getPeso() <= 125) {
                    return $cromossomo;
                }
            }
        }
        return null;
    }

    public function ordenarPopulacaoMaiorMenor() {
        if (!function_exists('ordenador')) {
            function ordenador($cromossomo1, $cromossomo2) {
                if ($cromossomo1->getAptidao() > $cromossomo2->getAptidao()) {
                    return -1;
                } elseif ($cromossomo1->getAptidao() < $cromossomo2->getAptidao()) {
                    return +1;
                }
                return 0;
            }
        }
        usort($this->populacao, 'ordenador');
    }
}