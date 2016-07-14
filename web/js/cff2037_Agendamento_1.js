
$(document).ready(function() {
    setTimeout(function(){
        AgendaPedal.iniciar();
    },100);
});

var AgendaPedal = {

    $formulario: null,
    campos: [],
    dados: {},
    formularioIniciado: false,

    //PRIVADOS------------------------------------------------------------------------------------------------//

    iniciarCampos: function() {

        if (this.formularioIniciado !== false) {
            return;
        }
        $('select').material_select();

        this.$formulario     = $("#agendamentoFormulario");

        this.campos.nomePedal         = $("#nomePedal");
        this.campos.tipoPedal         = $("#tipoPedal");
        this.campos.ritmoPedal        = $("#ritmoPedal");
        this.campos.distanciaPedal    = $("#distanciaPedal");
        this.campos.estado            = $("#estado");
        this.campos.cidade            = $("#cidade");
        this.campos.apoioCarro        = $("#apoioCarro");
        this.campos.observacoes       = $("#observacoes");
        this.campos.salvar            = $("#enviar");
        this.campos.data              = $("#dataPedal");
        this.campos.hora              = $("#horaPedal");
        this.campos.localSaida        = $("#localSaida");
        this.campos.localDestino      = $("#localDestino");

        this.aplicarMascarasNosCampos();
    },

    aplicarMascarasNosCampos: function() {

        if (this.formularioIniciado !== false) {
            return;
        }
        this.aplicarTraducaoCalendario();
        this.campos.data.pickadate({
            format: 'dd/mm/yyyy',
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 1 // Creates a dropdown of 15 years to control year
        });
        this.campos.hora.pickatime({
            autoclose: false,
            twelvehour: false
        });
        this.campos.cidade.attr({'disabled': true});
    },

    aplicarTraducaoCalendario: function () {
        jQuery.extend( jQuery.fn.pickadate.defaults, {
            monthsFull: [ 'janeiro', 'fevereiro', 'março', 'abril', 'maio', 'junho', 'julho', 'agosto', 'setembro', 'outubro', 'novembro', 'dezembro' ],
            monthsShort: [ 'jan', 'fev', 'mar', 'abr', 'mai', 'jun', 'jul', 'ago', 'set', 'out', 'nov', 'dez' ],
            weekdaysFull: [ 'domingo', 'segunda-feira', 'terça-feira', 'quarta-feira', 'quinta-feira', 'sexta-feira', 'sábado' ],
            weekdaysShort: [ 'dom', 'seg', 'ter', 'qua', 'qui', 'sex', 'sab' ],
            today: 'Hoje',
            clear: 'Limpar',
            close: 'OK',
            format: 'dddd, d !de mmmm !de yyyy',
            formatSubmit: 'yyyy/mm/dd'
        });

        jQuery.extend( jQuery.fn.pickatime.defaults, {
            clear: 'limpar'
        });
    },

    iniciarBotoes: function() {

        var myself = this;

        if (this.formularioIniciado !== false) {
            return;
        }

        this.campos.salvar.click(function() {
            myself.salvar();
        });
    },

    //PUBLICOS------------------------------------------------------------------------------------------------//


    iniciar: function() {
        this.iniciarCampos();
        this.iniciarBotoes();
        this.changeEstados();
        this.formularioIniciado = true;
    },

    //FEITO: CARREGAR ESTADOS E CIDADES
    changeEstados: function() {
        if (this.formularioIniciado !== false) {
            return;
        }

        var myself = this;

        this.campos.estado.change(function() {
            myself.atualizarCidades();
        });
    },

    popularSelectBox: function(dados, selectBox) {
        var optSelecione = $("<OPTION>").attr({
                'value': ''
            }).html('Selecione'),
            max = dados.length;

        selectBox.html('').append(optSelecione);
        for (var i=0;i<max;i++) {
            selectBox.append(
                $("<OPTION>").attr({
                    'value': dados[i].id
                }).html(dados[i].nome)
            );
        }
    },

    atualizarCidades: function(callback) {

        var myself = this;
        callback = callback || function(){
            $('select').material_select();
        };

        this.popularSelectBox([], this.campos.cidade);
        this.campos.cidade.attr({'disabled': true});

        if (this.campos.estado.val() != '') {
            $.ajax({
                url: 'agendamento/cidadesPorEstado/'+this.campos.estado.val(),
                type: "get",
                cache: false,
                blockUI: true,
                data: {},
                success: function(response) {
                    myself.campos.cidade.attr({'disabled': false});
                    myself.popularSelectBox(response.cidades, myself.campos.cidade);
                    callback();
                }
            });
        }
    },
    // FIM CARREGAMENTO CIDADE E ESTADO

    //FEITO: SALVAR
    salvar: function() {
        var dadosFormulario = {};
        myself = this;

        for (var campo in this.campos) {
            if (this.campos[campo].attr('type') != 'radio') {
                dadosFormulario[this.campos[campo].attr('name')] = this.campos[campo].val();
            } else if (this.campos[campo].prop('checked')) {
                dadosFormulario[this.campos[campo].attr('name')] = this.campos[campo].val();
            }
        }
        if (this.campos.apoioCarro.prop('checked')) {
            dadosFormulario['apoioCarro'] = '1';
        } else {
            dadosFormulario['apoioCarro'] = '0';
        }
        $.ajax({
            url: 'agendamento/salvar',
            type: "post",
            cache: false,
            data: dadosFormulario,
            success: function(response) {
                console.log('cheguei');
            }
        });
    }
    // FIM SALVAR
};