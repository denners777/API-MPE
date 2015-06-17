/* Author:
 denner.fernandes - denners777@hotmail.com
 */

var LOCAL = 'http://intranet.grupompe.com.br/public/assets/';
var COD = 'http://intranet.grupompe.com.br/prod/';

$(document).ready(function () {

  $('.tooltips').tooltip();
  $('.datatable').dataTable({
    "aLengthMenu": [[10, 25, 50, 75, 100, -1], [10, 25, 50, 75, 100, "All"]],
    "iDisplayLength": 100
  });
  $(".datatable").tablecloth({
    theme: "stats",
    bordered: true,
    condensed: true,
    striped: true,
    sortable: true,
    clean: true,
    cleanElements: "th td",
    customClass: "table table-hover"
  });
  $('.datep').datepicker();
  $('.chosen').data({placeholder: 'Todos', autocomplete: 'on'}).chosen();
  $("#sobre").jqte();
});
function deletar($action, $ID, $direct) {

  vex.defaultOptions.className = 'vex-theme-os';
  vex.dialog.confirm({
    message: 'Deseja realmente deletar este registro?',
    className: 'vex-theme-flat-attack',
    callback: function (value) {
      if (value === false) {
        return;
      } else {
        $.ajax({
          type: 'POST',
          url: $action,
          data: 'id=' + $ID,
          context: document.body
        }).done(function () {
          show_stack_bar_top("success", "Sucesso", "Registro deletado com sucesso.");
        }).fail(function () {
          show_stack_bar_top("error", "Error", "Não foi possível deletar registro.");
        });
        setTimeout(function () {
          return $(location).attr('href', $direct);
        }, 3000);
      }
    }
  });
}
function action($action, $ID, $direct, $pergunta, $resposta) {

  vex.defaultOptions.className = 'vex-theme-os';
  vex.dialog.confirm({
    message: 'Deseja realmente ' + $pergunta + ' este usuário?',
    className: 'vex-theme-flat-attack',
    callback: function (value) {
      if (value === false) {
        return;
      } else {
        $.ajax({
          type: 'POST',
          url: $action,
          data: 'id=' + $ID,
          context: document.body
        }).done(function () {
          show_stack_bar_top('success', 'Sucesso', 'Usuário ' + $resposta + ' com sucesso.');
        }).fail(function () {
          show_stack_bar_top('error', 'Error', 'Não foi possível ' + $pergunta + ' esse usuário.');
        });
        setTimeout(function () {
          return $(location).attr('href', $direct);
        }, 3000);
      }
    }
  });
}

function overlay($in) {
  if ($in) {
    $('#overlay').fadeIn('slow');
  } else {
    $('#overlay').fadeOut('slow');
  }
}

function conferir($element) {

  $($element).toggle('slow');
}

function gerarExcel($dados) {
  overlay(true);
  $.post({
    type: 'POST',
    url: LOCAL + 'relatorio/imprimirRelatorio/',
    data: {dados: $dados}
  }).done(function (msg) {
    console.log("Data Saved: " + msg);
  }).fail(function () {
    alert("error");
  });
  overlay(false);
}

$('#chapa_usu').change(function () {
  overlay(true);
  $.ajax({
    type: 'POST',
    url: COD + 'nucleo/usuario/ajaxChapa',
    data: {
      chapa: $('#chapa_usu').val(),
      empresa: $('#empresa_usu').val(),
    },
    success: function (data) {

      if ($.type(data) === 'string' || $.type(data) === 'boolean') {
        $('#info_usuario').hide();
        $('#info_not_found').show();
      } else {
        $.each(data, function () {
          $('#info_usuario #nome').html(this.NM_NOME);
          $('#info_usuario #admissao').html(this.DT_DATAATDMISSAO);
          $('#info_usuario #funcao').html(this.DS_FUNCAO);
          $('#info_usuario #secao').html(this.CD_SECAO);
          $('#info_usuario #cpf').html(this.CD_CPF);
          $('#info_usuario #descricao').html(this.DS_DESCRICAOSECAO);
          $('#info_usuario #situacao').html(this.DS_SITUACAO);
          $('#info_usuario #tipo').html(this.DS_TIPO);
        });
        $('#info_not_found').hide();
        $('#info_usuario').show();
      }
    }
  }).fail(function () {
    alert("error");
  });
  overlay(false);
});

$('#tipo_importacoes').change(function () {
  overlay(true);
  $.ajax({
    type: 'POST',
    url: COD + 'importacoes/tipo/getTipo',
    data: {tabela: $('#tipo_importacoes').val()},
    success: function (obj) {

      var opt = '';
      $.each(obj, function () {
        opt += '<option value="' + this.COD + '|' + this.NOME + '">' + this.COD + ' - ' + this.NOME + '</option>';
      });
      $('#para_importacoes').html(opt);
    }
  }).fail(function () {
    alert("error");
  });
  overlay(false);
});

$('#usuarios_view').keyup(function () {

  if ($(this).val().length >= 3) {

    hide_hide_list();
    $.ajax({
      type: 'POST',
      url: COD + 'nucleo/acesso/ajaxUsuario',
      data: {usuario: $('#usuarios_view').val()},
      success: function (obj) {

        var opt = '<ul class="hide_list">';
        $.each(obj, function () {
          opt += '<li onclick="setUsuario(this);" data-key="' + this.ID_USUARIO + '">' + this.NM_NOME + '</li>';
        });
        opt += '</ul>';
        $('#hide_list').html(opt).css('display', 'block');
      }
    }).fail(function () {
      show_stack_bar_top("error", "Erro", "Não há registros")
    });
  } else {
    hide_hide_list();
  }
});

function hide_hide_list() {
  $('#hide_list').hide('slow');
}

function setUsuario(e) {
  $('#usuarios').val($(e).data('key'));
  $('#usuarios_view').val($(e).html());
  hide_hide_list();
}

$('#todos_usuarios').click(function () {

  $('#usuarios_view').val('');
  if ($('#usuarios_view').hasClass('disabled')) {
    $('#usuarios_view').removeClass('disabled');
    $('#usuarios_view').removeAttr('disabled');
    $('#usuarios').val('');
  } else {
    $('#usuarios_view').addClass('disabled');
    $('#usuarios_view').attr('disabled', 'disabled');
    $('#usuarios').val('ALL');
  }

});

$('#grafico').change(function () {
  if ($('#grafico').val() == 'encerradoAtendente' || $('#grafico').val() == 'encerradoDepartamento') {
    $('.grupo2').show('slow');
  } else {
    $('.grupo2').hide('slow');
  }
});

$('#tipo').change(function () {
  if ($('#tipo').val() == 'fechado') {
    $('.grupo2').show('slow');
  } else {
    $('.grupo2').hide('slow');
    $('input[type=month]').val('');
  }
});

$('#fila_atendimento').change(function () {
  if ($('#tipo').val() == 'aberto') {
    overlay(true);
    getResponsavel();
    getProprietario();
    getStatus();
    overlay(false);
  }
});

$('#fila_grafico').change(function () {
  if ($('#grafico').val().substr(0, 6) == 'aberto') {
    overlay(true);
    getResponsavel();
    getProprietario();
    getStatus();
    overlay(false);
  }
});

$('#dataate').change(function () {
  if ($('#datade').val() != '') {
    overlay(true);
    getResponsavel();
    getProprietario();
    if ($("#tipo").length) {
      getStatus();
    }
    overlay(false);
  }
});

$('#datade').change(function () {
  if ($('#dataate').val() != '') {
    overlay(true);
    getResponsavel();
    getProprietario();
    if ($("#tipo").length) {
      getStatus();
    }
    overlay(false);
  }
});

$('#responsavel').change(function () {
  overlay(true);
  getProprietario();
  if ($("#tipo").length) {
    getStatus();
  }
  overlay(false);
});

function getResponsavel() {

  var $grafico = null;
  var $fila = null;
  var $datade = null;
  var $dataate = null;

  if ($("#grafico").length) {
    $grafico = $('#grafico').val().substr(0, 6);
  } else {
    $grafico = $('#tipo').val();
  }

  if ($("#fila_grafico").length) {
    $fila = $('#fila_grafico').val();
  } else {
    $fila = $('#fila_atendimento').val();
  }

  if ($('#datade').val() != '' || $('#dataate').val() != '') {
    $datade = $('#datade').val();
    $dataate = $('#dataate').val();
  }

  $.ajax({
    type: 'POST',
    url: COD + 'atendimento/graficos/getResponsavel',
    data: {
      fila: $fila,
      datade: $datade,
      dataate: $dataate,
      grafico: $grafico
    },
    success: function (obj) {

      var opt = '<option value="ALL">Todos</option>';
      $.each(obj, function () {
        opt += '<option value="' + this.Responsavel + '">' + this.Responsavel + '</option>';
      });
      $('#responsavel').html(opt);
    }
  }).fail(function () {
    show_stack_bar_top("error", "Erro", "Não há registros")
  });

}

function getProprietario() {

  var $grafico = null;
  var $fila = null;
  var $datade = null;
  var $dataate = null;

  if ($("#grafico").length) {
    $grafico = $('#grafico').val().substr(0, 6);
  } else {
    $grafico = $('#tipo').val();
  }

  if ($("#fila_grafico").length) {
    $fila = $('#fila_grafico').val();
  } else {
    $fila = $('#fila_atendimento').val();
  }

  if ($('#datade').val() != '' || $('#dataate').val() != '') {
    $datade = $('#datade').val();
    $dataate = $('#dataate').val();
  }

  $.ajax({
    type: 'POST',
    url: COD + 'atendimento/graficos/getProprietario',
    data: {
      fila: $fila,
      datade: $datade,
      dataate: $dataate,
      responsavel: $('#responsavel').val(),
      grafico: $grafico
    },
    success: function (obj) {

      var opt = '';
      $.each(obj, function () {
        opt += '<option value="' + this.Proprietario + '">' + this.Proprietario + '</option>';
      });
      $('#proprietario').html(opt);
      $('#proprietario').removeClass('chzn-done');
      $('#proprietario_chzn').remove();
      $('.chosen').data({placeholder: 'Todos', autocomplete: 'on'}).chosen();
    }
  }).fail(function () {
    show_stack_bar_top("error", "Erro", "Não há registros")
  });

}

function getStatus() {

  var $grafico = null;
  var $fila = null;
  var $datade = null;
  var $dataate = null;

  if ($("#grafico").length) {
    $grafico = $('#grafico').val().substr(0, 6);
  } else {
    $grafico = $('#tipo').val();
  }

  if ($("#fila_grafico").length) {
    $fila = $('#fila_grafico').val();
  } else {
    $fila = $('#fila_atendimento').val();
  }

  if ($('#datade').val() != '' || $('#dataate').val() != '') {
    $datade = $('#datade').val();
    $dataate = $('#dataate').val();
  }

  $.ajax({
    type: 'POST',
    url: COD + 'atendimento/consulta/getStatus',
    data: {
      fila: $fila,
      datade: $datade,
      dataate: $dataate,
      responsavel: $('#responsavel').val(),
      grafico: $grafico
    },
    success: function (obj) {

      var opt = '<option value="ALL">Todos</option>';
      $.each(obj, function () {
        opt += '<option value="' + this.Status + '">' + this.Status + '</option>';
      });
      $('#status').html(opt);
    }
  }).fail(function () {
    show_stack_bar_top("error", "Erro", "Não há registros")
  });
}

(function ($) {

  addLinha = function (e) {
    var $linha = $(e).closest('tr').clone();
    var tr = $(e).closest('tr');

    tr.after($linha);
    $linha.find('input[type=text], input[type=hidden], select').val('');

    renumere();
  }

  removeLinha = function (e) {

    if ($(e).parents('tbody').find('tr').length != 1) {
      var tr = $(e).closest('tr');
      tr.fadeOut(400, function () {
        tr.remove();
        renumere();
      });
    } else {
      show_stack_bar_top("error", "Não Permitido", "Ação não permitida!")
    }
  }

  renumere = function () {
    var $celulas = $('.posicao');
    var $i = 1;

    $.each($celulas, function () {
      $(this).attr('value', $i);
      $i++;
    });

  }

  $('#item_layout').change(function () {
    getlayout();
  });

  getlayout = function () {
    $.ajax({
      type: 'POST',
      url: COD + 'importacoes/item/getItem',
      data: {
        id: $('#item_layout').val(),
      },
      success: function (obj) {

        $.each(obj, function () {
          $('#versao').val(this.DS_VERSAO);
          $('#delimitador').val(this.DS_DELIMITADOR);
        });
      }
    }).fail(function () {
      show_stack_bar_top("error", "Erro", "Não há registros")
    });
  }

  submit = function () {
    $.ajax({
      type: 'POST',
      url: COD + 'importacoes/layout/atualizar',
      data: {
        dados: $('#formulario').serialize(),
      },
      success: function (obj) {
      }
    })
  }

  forModal = function (e) {
    if (typeof $(e).data('value') === "number") {
      $('#emaildados').val($(e).data('value'));
    } else {
      $('#emaildados').val(JSON.stringify($(e).data('value')));
    }
  }

})(jQuery);