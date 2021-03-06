<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Trabalho da disciplina Modelos Evolucionários e Tratamento de Incertezas da faculdade UNISUL, para resolver o problema da Mochila." />
    <meta name="author" content="Rodrigo Sypriano Ribeiro">
    <title>Mochila | Modelos Evolucionários e Tratamento de Incertezas</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/lightbox.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/ionslider/ion.rangeSlider.css" rel="stylesheet">
    <link href="css/ionslider/ion.rangeSlider.skinNice.css" rel="stylesheet">
    <link href="css/rainbow/blackboard.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
</head><!--/head-->

<body>

    <div class="carregando window">
        <img src="images/carregando.gif" alt="Carregando" />
    </div>
    <div id="mask"></div>

    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 overflow">
                   <div class="social-icons pull-right">
                        <ul class="nav nav-pills">
                            <li><a href="https://github.com/RodrigoSyprianoRibeiro/mochila" target="_blank"><i class="fa fa-github"></i></a></li>
                        </ul>
                    </div>
                </div>
             </div>
        </div>
        <div class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="">
                        <h1><img src="images/logo.png" alt="logo"> Mochila</h1>
                    </a>

                </div>
            </div>
        </div>
    </header>
    <!--/#header-->

    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul id="tab1" class="nav nav-tabs">
                        <li class="active"><a href="#tab1-item1" data-toggle="tab">Execução</a></li>
                        <li><a href="#tab1-item2" data-toggle="tab">Código</a></li>
                        <li><a href="#tab1-item3" data-toggle="tab">Sobre</a></li>
                        <li><a href="#tab1-item4" data-toggle="tab">Log</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="tab1-item1">
                            <div class="col-sm-3 wow fadeIn text-center padding" data-wow-duration="500ms" data-wow-delay="300ms">
                                <form id="parametros">
                                    <div class="form-group">
                                        <div class="knob-label">População inicial</div>
                                        <input type="text" id="populacao_inicial" name="populacao_inicial" value="" />
                                    </div>
                                    <div class="form-group">
                                        <div class="knob-label">Quantidade de gerações</div>
                                        <input type="text" id="quantidade_geracoes" name="quantidade_geracoes" value="" />
                                    </div>
                                    <div class="form-group">
                                        <div class="knob-label">% População para crossover</div>
                                        <input type="text" id="quantidade_crossover" name="quantidade_crossover" class="percentagem" data-from="100" value="" />
                                    </div>
                                    <div class="form-group">
                                        <div class="knob-label">% População para mutação</div>
                                        <input type="text" id="quantidade_mutacao" name="quantidade_mutacao" class="percentagem" data-from="1" value="" />
                                    </div>
                                    <div class="form-group">
                                        <div class="knob-label">Posições vetor serão alteradas na mutação</div>
                                        <input type="text" id="quantidade_binario_mutacao" name="quantidade_binario_mutacao" value="" />
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-6 wow fadeIn text-center padding" data-wow-duration="500ms" data-wow-delay="300ms">
                                <h2>Mochila</h2>
                                <div class="knob-label">Itens selecionados</div>
                                <div id="quadro"></div>
                                <h4>Volume: <b id="volume">0</b> / <b>80</b></h4>
                                <h4>Peso: <b id="peso">0</b> / <b>80</b></h4>
                                <h4>Valor: <b id="valor">0</b></h4>
                            </div>
                            <div class="col-sm-3 wow fadeIn text-center padding" data-wow-duration="500ms" data-wow-delay="300ms">
                                <div class="row margin-bottom">
                                    <button type="button" id="buscar" class="btn btn-lg btn-success">Buscar solução</button>
                                </div>
                                <div class="row">
                                    <button type="button" id="limpar" class="btn btn-lg btn-warning">Limpar Mochila</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab1-item2">
                            <div class="col-sm-12 wow fadeIn" data-wow-duration="500ms" data-wow-delay="300ms">
                                <h2 class="page-header">Código <strong>Fonte</strong></h2>
                                <a href="https://github.com/RodrigoSyprianoRibeiro/mochila" target="_blank"><i class="fa fa-github"></i> GitHub</a>
                                <div class="col-md-12">
                                    <ul id="tab2" class="nav nav-tabs">
                                        <li class="active"><a href="#tab2-item1" data-toggle="tab">HTML</a></li>
                                        <li><a href="#tab2-item2" data-toggle="tab">CSS</a></li>
                                        <li><a href="#tab2-item3" data-toggle="tab">JS</a></li>
                                        <li><a href="#tab2-item4" data-toggle="tab">executar.php</a></li>
                                        <li><a href="#tab2-item5" data-toggle="tab">AlgoritmosGeneticos.php</a></li>
                                        <li><a href="#tab2-item6" data-toggle="tab">Cromossomo.php</a></li>
                                        <li><a href="#tab2-item7" data-toggle="tab">Artigo.php</a></li>
                                        <li><a href="#tab2-item8" data-toggle="tab">Util.php</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade active in" id="tab2-item1">
                                            <pre><code data-language="html"><?php include 'docs/html.txt'; ?><</code></pre>
                                        </div>
                                        <div class="tab-pane fade" id="tab2-item2">
                                            <pre><code data-language="css"><?php include 'docs/css.txt'; ?></code></pre>
                                        </div>
                                        <div class="tab-pane fade" id="tab2-item3">
                                            <pre><code data-language="javascript"><?php include 'docs/js.txt'; ?></code></pre>
                                        </div>
                                        <div class="tab-pane fade" id="tab2-item4">
                                            <pre><code data-language="php"><?php include 'docs/executar.txt'; ?></code></pre>
                                        </div>
                                        <div class="tab-pane fade" id="tab2-item5">
                                            <pre><code data-language="php"><?php include 'docs/algoritmosgeneticos.txt'; ?></code></pre>
                                        </div>
                                        <div class="tab-pane fade" id="tab2-item6">
                                            <pre><code data-language="php"><?php include 'docs/cromossomo.txt'; ?></code></pre>
                                        </div>
                                        <div class="tab-pane fade" id="tab2-item7">
                                            <pre><code data-language="php"><?php include 'docs/artigo.txt'; ?></code></pre>
                                        </div>
                                        <div class="tab-pane fade" id="tab2-item8">
                                            <pre><code data-language="php"><?php include 'docs/util.txt'; ?></code></pre>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab1-item3">
                            <div class="col-sm-12 wow fadeIn" data-wow-duration="500ms" data-wow-delay="300ms">
                                <h2 class="page-header">Sobre o Problema da <strong>Mochila</strong></h2>
                                <blockquote>
                                    <p>O problema da mochila é um problema de optimização combinatória.
                                    O nome dá-se devido ao modelo de uma situação em que é necessário preencher
                                    uma mochila com objetos de diferentes pesos e valores. O objetivo é que se
                                    preencha a mochila com o maior valor possível, não ultrapassando o peso máximo.</p>
                                </blockquote>
                            </div>
                            <div class="col-sm-12 wow fadeIn" data-wow-duration="500ms" data-wow-delay="300ms">
                                <h2 class="page-header">Algoritmos <strong>Genéticos</strong></h2>
                                <blockquote>
                                    <p>Para resolver o problema foi utilizada as técnicas dos <b>Algoritmos Genéticos</b>.
                                    São algoritmos de busca baseados nos mecanismos de seleção natural e genética.</p>

                                    <p>Componentes dos <b>Algoritmos Genéticos:</b>
                                    <ul>
                                        <li>Representação (definição dos indivíduos)</li>
                                        <li>Função de avaliação (função fitness)</li>
                                        <li>População</li>
                                        <li>Mecanismo de seleção dos pais</li>
                                        <li>Operadores genéticos</li>
                                        <li>Mecanismo de seleção dos sobreviventes</li>
                                    </ul>
                                    </p>
                                </blockquote>
                            </div>
                            <div class="col-sm-12 wow fadeIn" data-wow-duration="500ms" data-wow-delay="300ms">
                                <h2 class="page-header"><strong>Autores</strong></h2>
                                <blockquote>
                                    <p>Rodrigo Ribeiro e Taynara Rechia.</p>

                                    <footer>Trabalho da disciplina <cite title="Modelos Evolucionários e Tratamento de Incertezas">Modelos Evolucionários e Tratamento de Incertezas</cite>
                                    do curso de Ciência da Computação da UNISUL (Universidade do Sul de Santa Catarina).</footer>
                                </blockquote>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab1-item4">
                            <div class="col-sm-12 wow fadeIn" data-wow-duration="500ms" data-wow-delay="300ms">
                                <h2 class="page-header">Log de <strong>Testes</strong></h2>
                                <pre><code id="log" data-language="shell"></code></pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#services-->

    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center bottom-separator">
                    <img src="images/home/under.png" class="img-responsive inline" alt="">
                </div>
                <div class="col-sm-12">
                    <div class="copyright-text text-center">
                        <p>&copy; Rodrigo Ribeiro 2016. All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/#footer-->

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/bootbox.js"></script>
    <script type="text/javascript" src="js/ion.rangeSlider.min.js"></script>
    <script type="text/javascript" src="js/algoritmos-geneticos.js"></script>
    <script type="text/javascript" src="js/rainbow/rainbow.min.js"></script>
    <script type="text/javascript" src="js/rainbow/language/css.js"></script>
    <script type="text/javascript" src="js/rainbow/language/generic.js"></script>
    <script type="text/javascript" src="js/rainbow/language/html.js"></script>
    <script type="text/javascript" src="js/rainbow/language/javascript.js"></script>
    <script type="text/javascript" src="js/rainbow/language/php.js"></script>
    <script type="text/javascript" src="js/rainbow/language/shell.js"></script>
</body>
</html>
