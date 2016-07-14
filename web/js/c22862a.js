
$(document).ready(function() {
    setTimeout(function(){
        AgendaPedal.iniciar();
    },100);
});

var AgendaPedal = {

    $formulario: null,
    campos: [],
    dados: {},
    validacaoLiberada: false,
    formularioValido: false,
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
        this.campos.observacoes       = $("#observacoes");
        this.campos.salvar            = $("#enviar");

        this.aplicarMascarasNosCampos();
    },

    aplicarMascarasNosCampos: function() {

        if (this.formularioIniciado !== false) {
            return;
        }

        console.log('Aplica Mascara se Houver');
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

    //FEITO: VALIDAÇÕES
    aplicarRegras: function() {
        console.log('Não Há Regras');
    },

    realizarValidacoes: function() {
        console.log('Não Há Parsley');
    },
    // FIM VALIDAÇÕES

    //FEITO: SALVAR
    salvar: function() {
        var dadosFormulario = {};
        myself = this;

        this.realizarValidacoes();

        if (this.formularioValido === false) {
            return;
        }

        for (var campo in this.campos) {
            if (this.campos[campo].attr('type') != 'radio') {
                dadosFormulario[this.campos[campo].attr('name')] = this.campos[campo].val();
            } else if (this.campos[campo].prop('checked')) {
                dadosFormulario[this.campos[campo].attr('name')] = this.campos[campo].val();
            }
        }

        $.ajax({
            url: window.BASE_URL+'agendamento-online/consultorio/convenio/salvar',
            type: "post",
            cache: false,
            blockUI: true,
            data: dadosFormulario,
            success: function(response) {
                window.location= window.BASE_URL+'agendamento-online/consultorio/convenio/lista'
            }
        });
    }
    // FIM SALVAR
};