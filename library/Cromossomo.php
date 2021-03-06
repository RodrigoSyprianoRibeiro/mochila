<?php

class Cromossomo
{
    const VOLUME_MAXIMO = 80;
    const PESO_MAXIMO = 80;

    public $vetor;
    public $volume;
    public $peso;
    public $valor;
    public $geracao;
    public $aptidao;
    public $idade;
    public $tempoVida;
    public $mutante;

    public $diferencaMaxima;

    function __construct($geracao) {
        $this->geracao = $geracao;
        $this->diferencaMaxima = Util::calcularDiferencaEntrePontos(0, 0, self::VOLUME_MAXIMO, self::PESO_MAXIMO);
        $this->mutante = false;
    }

    public function gerarVetor($tamanho) {
        for ($i = 0; $i < $tamanho; $i++) {
            $this->vetor[] = rand(0, 1);
        }
    }

    public function calcularValores($listaArtigos) {
        $this->volume = 0;
        $this->peso = 0;
        $this->valor = 0;
        foreach ($listaArtigos AS $indice => $artigo) {
            $this->volume += ($this->vetor[$indice] * $artigo->getVolume());
            $this->peso += ($this->vetor[$indice] * $artigo->getPeso());
            $this->valor += ($this->vetor[$indice] * $artigo->getValor());
        }
    }

    public function calcularAptidaoTempoVida($geracoes) {
        $diferenca = Util::calcularDiferencaEntrePontos($this->volume, $this->peso, self::VOLUME_MAXIMO, self::PESO_MAXIMO) / $this->diferencaMaxima;
        if ($this->volume > self::VOLUME_MAXIMO || $this->peso > self::PESO_MAXIMO) {
            $diferenca *= 2;
        }
        $this->aptidao = ceil($this->valor - $this->valor * $diferenca);
        $this->tempoVida = ceil($this->aptidao * ($geracoes / 100));
        $this->idade = $this->tempoVida;
    }

    function getVetor() {
        return $this->vetor;
    }

    function getVolume() {
        return $this->volume;
    }

    function getPeso() {
        return $this->peso;
    }

    function getValor() {
        return $this->valor;
    }

    function getGeracao() {
        return $this->geracao;
    }

    function getAptidao() {
        return $this->aptidao;
    }

    function getIdade() {
        return $this->idade;
    }

    function getTempoVida() {
        return $this->tempoVida;
    }

    function getMutante() {
        return $this->mutante;
    }

    function getDiferencaMaxima() {
        return $this->diferencaMaxima;
    }

    function setVetor($vetor) {
        $this->vetor = $vetor;
    }

    function setVolume($volume) {
        $this->volume = $volume;
    }

    function setPeso($peso) {
        $this->peso = $peso;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

    function setGeracao($geracao) {
        $this->geracao = $geracao;
    }

    function setAptidao($aptidao) {
        $this->aptidao = $aptidao;
    }

    function setIdade($idade) {
        $this->idade = $idade;
    }

    function setTempoVida($tempoVida) {
        $this->tempoVida = $tempoVida;
    }

    function setMutante($mutante) {
        $this->mutante = $mutante;
    }

    function setDiferencaMaxima($diferencaMaxima) {
        $this->diferencaMaxima = $diferencaMaxima;
    }
}