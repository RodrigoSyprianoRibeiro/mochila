$(function () {

  montaMochila();

  function montaMochila() {
    var html = "<table id='mochila'>";
    for (y = 0; y < 5; y++) {
      html += "<tr>";
      for (x = 0; x < 5; x++) {
        html += "<td class='celula'></td>";
      }
      html += "</tr>";
    }
    html += "</table>";
    $("#quadro").html(html);
    rainhas = [];
  };

  // Ação do botão "Buscar solução" 
  $(document).on('click', '#buscar', function(e){
    e.preventDefault();
    buscarSolucao();
  });

  function buscarSolucao() {
    var dados = $('#parametros').serialize();
    $.ajax({
      dataType: "json",
      type: 'POST',
      url: 'library/executar.php',
      async: true,
      data: dados,
      success: function(response) {
        var mutante = response.mutante ? 'Sim' : 'Não';
        exibeEstado(response.vetor);
        modalAviso("<b>Melhor Cromossomo:</b>",
                   "<b>Volume: </b>" + response.volume + ". <b>Peso: </b>" + response.peso + ". <b>Valor: </b>" + response.valor + ". <br />" +
                   "<b>Geração: </b>" + response.geracao + ". <b>Tempo de Vida: </b>" + response.tempoVida + ". <br />" +
                   "<b>É mutante: </b>" + mutante + ".");
        $("#volume").text(response.volume);
        $("#peso").text(response.peso);
        $("#valor").text(response.valor);
        carregaLog();
      },
      beforeSend: function(){
        desabilitaBotoes();
        abreModalCarregando();
      },
      complete: function(){
        habilitaBotoes();
        fechaModalCarregando();
      }
    });
  };

  // Ação do botão "Limpar tabuleiro" 
  $(document).on('click', '#limpar', function(e){
    e.preventDefault();
    limparMochila();
  });

  function exibeEstado(vetor) { // atualiza tabuleiro na tela - retorna o número de conflitos
    limparMochila();
    var listaArtigos = [["A",  6,  2,  5],
                        ["B",  2,  9,  7],
                        ["C",  1,  9,  8],
                        ["D",  8,  7,  9],
                        ["E",  2,  2,  2],
                        ["F",  3,  2,  6],
                        ["G",  5,  3,  2],
                        ["H",  9,  4,  1],
                        ["I",  8,  4,  8],
                        ["J",  8,  7,  1],
                        ["K",  6,  7,  8],
                        ["L",  2,  3, 10],
                        ["M",  7,  7,  9],
                        ["N",  9,  7,  6],
                        ["O",  7,  3,  2],
                        ["P", 10,  4,  8],
                        ["Q",  2, 10,  6],
                        ["R",  9,  2,  5],
                        ["S",  1,  5,  2],
                        ["T",  9,  8,  7],
                        ["U",  3, 10,  8],
                        ["V",  9,  2,  7],
                        ["W",  9,  8,  9],
                        ["X",  2,  6,  5],
                        ["Y",  4,  7,  6]];
    var count = 65;
    $(".celula").each(function(index) {
      texto = (vetor[index] === 1) ? String.fromCharCode(count) : ' - ';
      $(this).html('<span title="'+listaArtigos[index][0]+' = {Volume = '+listaArtigos[index][1]+'. Peso = '+listaArtigos[index][2]+'. Valor = '+listaArtigos[index][3]+'.}">'+texto+'</span>');
      count++;
    });
  }

  function limparMochila() {
    $(".celula").text("");
    $("#volume").text(0);
    $("#peso").text(0);
    $("#valor").text(0);
  }

  function habilitaBotoes() {
    $(".btn-success").removeClass("disabled");
    $(".btn-warning").removeClass("disabled");
  }

  function desabilitaBotoes() {
    $(".btn-success").addClass("disabled");
    $(".btn-warning").addClass("disabled");
  }

  function modalAviso(titulo, mensagem) {
    bootbox.dialog({
      title: "<h3 class='smaller lighter no-margin'>"+titulo+"</h3>",
      message: mensagem,
      buttons: {
        danger: {
          label: "<i class='ace-icon fa fa-times'></i> Fechar",
          className: "btn btn-sm btn-danger pull-right"
        }
      }
    });
  }

  function abreModalCarregando() {
    $('html, body').animate({ scrollTop: $("body").offset().top }, 'slow');
    var id = '.carregando';
    var maskHeight = $(document).height();
    var maskWidth = $(window).width();
    $('#mask').css({'width':maskWidth,'height':maskHeight});
    $('#mask').fadeIn(1000);
    $('#mask').fadeTo("slow",0.8);
    var winH = $(window).height();
    var winW = $(window).width();
    $(id).css('top',  winH/2-$(id).height()/2);
    $(id).css('left', winW/2-$(id).width()/2);
    $(id).fadeIn(2000);
  };

  function fechaModalCarregando() {
    $('#mask').hide();
    $('.window').hide();
  };

  $("#populacao_inicial").ionRangeSlider({
    min: 0,
    max: 20,
    from: 10,
    type: 'single',
    step: 1,
    postfix: " indivíduos",
    prettify: false,
    hasGrid: true
  });

  $("#quantidade_geracoes").ionRangeSlider({
    min: 0,
    max: 20,
    from: 10,
    type: 'single',
    step: 1,
    postfix: " gerações",
    prettify: false,
    hasGrid: true
  });

  $(".percentagem").ionRangeSlider({
    min: 0,
    max: 100,
    type: 'single',
    step: 1,
    postfix: "%",
    prettify: false,
    hasGrid: true
  });

  $("#quantidade_binario_mutacao").ionRangeSlider({
    min: 1,
    max: 25,
    from: 5,
    type: 'single',
    step: 1,
    postfix: " posições",
    prettify: false,
    hasGrid: true
  });

  carregaLog();

  function carregaLog() {
    jQuery.get('log.txt', function(data) {
      $('#log').html(data.replace('n',''));
    });
  };
});