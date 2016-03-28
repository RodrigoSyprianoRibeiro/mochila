<?php

class Artigo
{
    public $artigo;
    public $volume;
    public $peso;
    public $valor;

    function __construct($artigo, $volume, $peso, $valor) {
        $this->artigo = $artigo;
        $this->volume = $volume;
        $this->peso = $peso;
        $this->valor = $valor;
    }

    function getArtigo() {
        return $this->artigo;
    }

    function setArtigo($artigo) {
        $this->artigo = $artigo;
    }

    function getVolume() {
        return $this->volume;
    }

    function setVolume($volume) {
        $this->volume = $volume;
    }

    function getPeso() {
        return $this->peso;
    }

    function setPeso($peso) {
        $this->peso = $peso;
    }

    function getValor() {
        return $this->valor;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }
}