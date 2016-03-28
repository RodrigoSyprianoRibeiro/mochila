<?php

require_once('Artigo.php');

class Util
{
    public static function gerarListaArtigos() {
        $listaArtigos = array();
        $listaArtigos[] = new Artigo("A",  6,  2,  5);
        $listaArtigos[] = new Artigo("B",  2,  9,  7);
        $listaArtigos[] = new Artigo("C",  1,  9,  8);
        $listaArtigos[] = new Artigo("D",  8,  7,  9);
        $listaArtigos[] = new Artigo("E",  2,  2,  2);
        $listaArtigos[] = new Artigo("F",  3,  2,  6);
        $listaArtigos[] = new Artigo("G",  5,  3,  2);
        $listaArtigos[] = new Artigo("H",  9,  4,  1);
        $listaArtigos[] = new Artigo("I",  8,  4,  8);
        $listaArtigos[] = new Artigo("J",  8,  7,  1);
        $listaArtigos[] = new Artigo("K",  6,  7,  8);
        $listaArtigos[] = new Artigo("L",  2,  3, 10);
        $listaArtigos[] = new Artigo("M",  7,  7,  9);
        $listaArtigos[] = new Artigo("N",  9,  7,  6);
        $listaArtigos[] = new Artigo("O",  7,  3,  2);
        $listaArtigos[] = new Artigo("P", 10,  4,  8);
        $listaArtigos[] = new Artigo("Q",  2, 10,  6);
        $listaArtigos[] = new Artigo("R",  9,  2,  5);
        $listaArtigos[] = new Artigo("S",  1,  5,  2);
        $listaArtigos[] = new Artigo("T",  9,  8,  7);
        $listaArtigos[] = new Artigo("U",  3, 10,  8);
        $listaArtigos[] = new Artigo("V",  9,  2,  7);
        $listaArtigos[] = new Artigo("W",  9,  8,  9);
        $listaArtigos[] = new Artigo("X",  2,  6,  5);
        $listaArtigos[] = new Artigo("Y",  4,  7,  6);
        return $listaArtigos;
    }

    public static function calcularDiferencaEntrePontos($x1, $y1, $x2, $y2) {
        return sqrt(pow($x2 - $x1, 2) + pow($y2 - $y1, 2));
    }

    public static function gerarNumerosAleatoriosDiferentes($menor, $maior, $quantidade, $ordernacao) {
        $numeros = array();
        while (count($numeros) < $quantidade) {
            $numero = mt_rand($menor, $maior);
            if (!in_array($numero, $numeros)) {
                $numeros[] = $numero;
            }
        }
        if ($ordernacao == 'ASC') {
            sort($numeros);
        } else {
            rsort($numeros);
        }
        return $numeros;
    }
}