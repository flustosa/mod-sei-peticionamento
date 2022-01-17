<script type="text/javascript">
    //Processo
    var objLupaTipoProcesso = null;
    var objAutoCompletarTipoProcesso = null;
    var objAjaxIdNivelAcesso = null;

    function changeNivelAcesso() {
        document.getElementById('divNivelAcesso').style.display = "none";
        var padrao = document.getElementsByName('rdNivelAcesso[]')[1].checked;

        document.getElementById('selNivelAcesso').value = '';
        document.getElementById('selHipoteseLegal').value = '';
        document.getElementById('divHipoteseLegal').style.display = 'none';

        if (padrao) {
            document.getElementById('divNivelAcesso').style.display = "inherit";
        }
    }

    function changeSelectNivelAcesso() {
        document.getElementById('selHipoteseLegal').value = '';

        var valorSelectNivelAcesso = document.getElementById('selNivelAcesso').value;
        var valorHipoteseLegal = document.getElementById('hdnParametroHipoteseLegal').value;
        if (valorSelectNivelAcesso == 'I' && valorHipoteseLegal != '0') {
            document.getElementById('divHipoteseLegal').style.display = 'inherit';
        } else {
            document.getElementById('divHipoteseLegal').style.display = 'none';
        }
    }

    function inicializar() {
        if ('<?=$_GET['acao']?>' == 'md_pet_intercorrente_criterio_cadastrar') {
            carregarComponenteTipoProcessoNovo();
            document.getElementById('txtTipoProcesso').focus();
        } else if ('<?=$_GET['acao']?>' == 'md_pet_intercorrente_criterio_alterar') {
            carregarComponenteTipoProcessoAlterar();
            document.getElementById('txtTipoProcesso').focus();
        } else if ('<?=$_GET['acao']?>' == 'md_pet_intercorrente_criterio_consultar') {
            infraDesabilitarCamposAreaDados();
        }

        infraEfeitoTabelas();
    }

    function carregarComponenteTipoProcessoNovo() {
        objLupaTipoProcesso = new infraLupaSelect('selTipoProcesso', 'hdnIdTipoProcesso', '<?=$strLinkTipoProcessoSelecao?>');

        objLupaTipoProcesso.finalizarSelecao = function () {
            var options = document.getElementById('selTipoProcesso').options;
            if (options.length < 1) {
                return;
            }
            for (var i = 0; i < options.length; i++) {
                options[i].selected = true;
            }
            objLupaTipoProcesso.atualizar();
        };

        objAutoCompletarTipoProcesso = new infraAjaxAutoCompletar('hdnIdTipoProcesso', 'txtTipoProcesso', '<?=$strLinkAjaxTipoProcesso?>');
        objAutoCompletarTipoProcesso.limparCampo = false;
        objAutoCompletarTipoProcesso.tamanhoMinimo = 3;
        objAutoCompletarTipoProcesso.prepararExecucao = function () {
            var itensSelecionados = '';
            var options = document.getElementById('selTipoProcesso').options;

            if (options.length > 0) {
                for (var i = 0; i < options.length; i++) {
                    itensSelecionados += '&itens_selecionados[]=' + options[i].value;
                }
            }
            return 'palavras_pesquisa=' + document.getElementById('txtTipoProcesso').value + '&' + itensSelecionados;
        };

        objAutoCompletarTipoProcesso.processarResultado = function (id, descricao, complemento) {
            if (id != '') {
                var options = document.getElementById('selTipoProcesso').options;

                for (var i = 0; i < options.length; i++) {
                    if (options[i].value == id) {
                        self.setTimeout('alert(\'Tipo de Processo [' + descricao + '] j� consta na lista.\')', 100);
                        break;
                    }
                }

                if (i == options.length) {

                    for (i = 0; i < options.length; i++) {
                        options[i].selected = false;
                    }

                    opt = infraSelectAdicionarOption(document.getElementById('selTipoProcesso'), descricao, id);

                    objLupaTipoProcesso.atualizar();

                    opt.selected = true;
                }

                document.getElementById('txtTipoProcesso').value = '';
                document.getElementById('txtTipoProcesso').focus();
            }
        }
        objAutoCompletarTipoProcesso.selecionar('<?=$strIdTipoProcesso?>', '<?=PaginaSEI::getInstance()->formatarParametrosJavascript(PaginaSEI::tratarHTML($strNomeRemetente));?>');
    }

    function carregarComponenteTipoProcessoAlterar() {
        objLupaTipoProcesso = new infraLupaText('txtTipoProcesso', 'hdnIdTipoProcesso', '<?=$strLinkTipoProcessoSelecao?>');

        objLupaTipoProcesso.finalizarSelecao = function () {
            objAutoCompletarTipoProcesso.selecionar(document.getElementById('hdnIdTipoProcesso').value, document.getElementById('txtTipoProcesso').value);
        }

        objAutoCompletarTipoProcesso = new infraAjaxAutoCompletar('hdnIdTipoProcesso', 'txtTipoProcesso', '<?=$strLinkAjaxTipoProcesso?>');
        objAutoCompletarTipoProcesso.limparCampo = false;
        objAutoCompletarTipoProcesso.tamanhoMinimo = 3;
        objAutoCompletarTipoProcesso.prepararExecucao = function () {
            return 'palavras_pesquisa=' + document.getElementById('txtTipoProcesso').value;
        };

        objAutoCompletarTipoProcesso.processarResultado = function (id, descricao, complemento) {
            if (id != '') {
                document.getElementById('hdnIdTipoProcesso').value = id;
                document.getElementById('txtTipoProcesso').value = descricao;
            }
        }
        objAutoCompletarTipoProcesso.selecionar('<?=$strIdTipoProcesso?>', '<?=PaginaSEI::getInstance()->formatarParametrosJavascript(PaginaSEI::tratarHTML($strNomeRemetente));?>');
    }

    function removerProcessoAssociado(remover) {
        if (remover === '1') {
            objLupaTipoProcesso.remover();
        }
    }

    function validarCadastro() {
        objLupaTipoProcesso.atualizar();

        var valorHipoteseLegal = document.getElementById('hdnParametroHipoteseLegal').value;

        if (document.getElementById('selTipoProcesso').options < 1) {
            alert('Informe o Tipo de Processo.');
            return false;
        }

        //Validar N�vel Acesso
        var elemsNA = document.getElementsByName("rdNivelAcesso[]");

        var validoNA = false, valorNA = 0;

        for (var i = 0; i < elemsNA.length; i++) {
            if (elemsNA[i].checked === true) {
                validoNA = true;
                valorNA = parseInt(elemsNA[i].value);
            }
        }

        if (validoNA === false) {
            alert('Informe o N�vel de Acesso.');
            return false;
        }

        if (infraTrim(document.getElementById('selNivelAcesso').value) == '' && valorNA != 1) {
            alert('Informe o N�vel de Acesso.');
            document.getElementById('selNivelAcesso').focus();
            return false;
        } else if (document.getElementById('selNivelAcesso').value == 'I' && valorHipoteseLegal != '0') {

            //validar hipotese legal
            if (document.getElementById('selHipoteseLegal').value == '') {
                alert('Informe a Hip�tese legal padr�o.');
                document.getElementById('selHipoteseLegal').focus();
                return false;
            }
        }

        if (valorNA == 2) {
            var validacaoSelNivelAcesso = false;
            $.ajax({
                url: '<?=$strUrlAjaxValidarNivelAcesso?>',
                type: 'POST',
                dataType: 'XML',
                data: $('form#frmCriterioCadastro').serialize(),
                async: false,
                success: function (r) {
                    if ($(r).find('MensagemValidacao').text()) {
                        alert($(r).find('MensagemValidacao').text());
                    } else {
                        validacaoSelNivelAcesso = true;
                    }
                },
                error: function (e) {
                    if ($(e.responseText).find('MensagemValidacao').text()) {
                        alert($(e.responseText).find('MensagemValidacao').text());
                    }
                }
            });

            if (validacaoSelNivelAcesso == false) {
                return validacaoSelNivelAcesso;
            }
        }

        return true;
    }

    function OnSubmitForm() {
        return validarCadastro();
    }

    function getPercentTopStyle(element) {
        var parent = element.parentNode,
            computedStyle = getComputedStyle(element),
            value;

        parent.style.display = 'none';
        value = computedStyle.getPropertyValue('top');
        parent.style.removeProperty('display');

        if (value != '') {
            valor = value.replace('%', '');
            return parseInt(valor);
        }

        return false;
    }
</script>