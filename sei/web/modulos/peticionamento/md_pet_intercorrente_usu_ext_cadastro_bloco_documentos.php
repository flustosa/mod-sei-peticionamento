<?php

/**
 * Fieldset Documentos
 * @since  29/11/2016
 * @author Andr� Luiz <andre.luiz@castgroup.com.br>
 */

//Options dos Selects
$strSelectTipoConferencia = MdPetIntercorrenteINT::montarSelectTipoConferencia('null', '', $_POST['selTipoConferencia']);
//Fim Options

?>
<fieldset id="field_documentos" class="infraFieldset sizeFieldset form-control"
          style="display: none; height: auto">
    <legend class="infraLegend">&nbsp; Documentos &nbsp;</legend>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 texto">
            <label>Os documentos devem ser carregados abaixo, sendo de sua exclusiva responsabilidade a conformidade
                entre os dados informados e os documentos. Os N�veis de Acesso que forem indicados abaixo estar�o
                condicionados � an�lise por servidor p�blico, que poder� alter�-los a qualquer momento sem necessidade
                de pr�vio aviso.</label>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 infraAreaDados" id="divArquivo">
            <label class="infraLabelObrigatorio" for="fileArquivo">Documento (tamanho
                m�ximo: <?= is_int($tamanhoMaximo) ? $tamanhoMaximo . 'Mb' : $tamanhoMaximo; ?>):</label>
            <input type="file" name="fileArquivo" id="fileArquivo"
                   tabindex="<?= PaginaSEI::getInstance()->getProxTabDados(); ?>"/>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-5 col-lg-4 col-xl-3">
            <label class="infraLabelObrigatorio" for="selTipoDocumento">Tipo de Documento: <img
                        src="<?= PaginaSEI::getInstance()->getDiretorioSvgGlobal() ?>/ajuda.svg"
                        name="ajuda" <?= PaginaSEI::montarTitleTooltip($strMsgTooltipTipoDocumento, "Ajuda") ?>
                        alt="Ajuda"
                        class="infraImgModulo"/></label>
            <select id="selTipoDocumento" class="infraSelect form-control"
                    tabindex="<?= PaginaSEI::getInstance()->getProxTabDados(); ?>"></select>
        </div>
        <div class="col-sm-12 col-md-7 col-lg-6 col-xl-6">
            <label class="infraLabelObrigatorio" for="txtComplementoTipoDocumento">Complemento do Tipo de Documento:
                <img src="<?= PaginaSEI::getInstance()->getDiretorioSvgGlobal() ?>/ajuda.svg"
                     name="ajuda" <?= PaginaSEI::montarTitleTooltip($strMsgTooltipComplementoTipoDocumento, "Ajuda") ?>
                     alt="Ajuda" class="infraImgModulo"/></label>
            <input type="text" class="infraText form-control" id="txtComplementoTipoDocumento"
                   name="txtComplementoTipoDocumento"
                   maxlength="40" onkeypress="return infraMascaraTexto(this,event,40);"
                   tabindex="<?= PaginaSEI::getInstance()->getProxTabDados(); ?>"/>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-3" id="divBlcNivelAcesso">
            <label class="infraLabelObrigatorio" for="selNivelAcesso">
                N�vel de Acesso:
                <img id=imgNivelAcesso name=imgNivelAcesso
                     src="<?= PaginaSEI::getInstance()->getDiretorioSvgGlobal() ?>/ajuda.svg"
                     name="ajuda" onmouseover="" onmouseout="" alt="Ajuda" class="infraImgModulo"/>
            </label>
            <div id="divNivelAcesso"></div>
        </div>
        <?php if ($exibirHipoteseLegal): ?>
            <div class="col-sm-12 col-md-7 col-lg-6 col-xl-6" id="divBlcHipoteseLegal" style="display: none;">
                <label class="infraLabelObrigatorio" for="selHipoteseLegal">
                    Hip�tese Legal:
                    <img id=imgHipoteseLegal name=imgHipoteseLegal
                         src="<?= PaginaSEI::getInstance()->getDiretorioSvgGlobal() ?>/ajuda.svg"
                         name="ajuda" onmouseover="" onmouseout="" alt="Ajuda" class="infraImgModulo"/>
                </label>
                <div id="divHipoteseLegal">
                    <?php echo $selHipoteseLegal; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
            <label class="infraLabelObrigatorio">Formato: <img
                        src="<?= PaginaSEI::getInstance()->getDiretorioSvgGlobal() ?>/ajuda.svg"
                        name="ajuda" <?= PaginaSEI::montarTitleTooltip($strMsgTooltipFormato, "Ajuda") ?>
                        class="infraImgModulo"/></label><br/>
            <input type="radio" class="infraRadio" id="rdoNatoDigital" name="rdoFormato" value="N"
                   onclick="exibirTipoConferencia();"
                   tabindex="<?= PaginaSEI::getInstance()->getProxTabDados() + 2; ?>">
            <label for="rdoNatoDigital" class="infraLabelRadio">Nato-Digital</label>
            <input type="radio" class="infraRadio" id="rdoDigitalizado" name="rdoFormato" value="D"
                   onclick="exibirTipoConferencia();"
                   tabindex="<?= PaginaSEI::getInstance()->getProxTabDados() + 2; ?>">
            <label for="rdoDigitalizado" class="infraLabelRadio">Digitalizado</label>
        </div>
        <div class="col-sm-12 col-md-7 col-lg-6 col-xl-6" id="divTipoConferencia" style="display: none">
            <label class="infraLabelObrigatorio" for="selTipoConferencia">Confer�ncia com o documento
                digitalizado:</label>
            <select id="selTipoConferencia" name="selTipoConferencia" class="infraSelect form-control"
                    tabindex="<?= PaginaSEI::getInstance()->getProxTabDados() + 2; ?>"><?= $strSelectTipoConferencia ?></select>
        </div>
        <div class="col-sm-12 col-md-3 col-lg-2 col-xl-2">
            <button type="button" class="infraButton" id="btnAdicionarDocumento" onclick="adicionarDocumento();"
                    tabindex="<?= PaginaSEI::getInstance()->getProxTabDados() + 2; ?>">Adicionar
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <table width="99%" class="infraTable" id="tbDocumento" style="width:99%;">
                <tr>
                    <th class="infraTh" width="0" style="display: none;">ID Linha</th> <!--0-->
                    <th class="infraTh" width="0" style="display: none;">ID Tipo Documento</th> <!--1-->
                    <th class="infraTh" width="0" style="display: none;">Complemento Tipo Documento</th> <!--2-->
                    <th class="infraTh" width="0" style="display: none;">ID Nivel Acesso</th> <!--3-->
                    <th class="infraTh" width="0" style="display: none;">ID Hipotese Legal</th> <!--4-->
                    <th class="infraTh" width="0" style="display: none;">ID Formato</th> <!--5-->
                    <th class="infraTh" width="0" style="display: none;">ID Tipo Conferencia</th> <!--6-->
                    <th class="infraTh" width="0" style="display: none;">Nome Arquivo Hash</th> <!--7-->
                    <th class="infraTh" width="0" style="display: none;">Tamanho Arquivo</th> <!--8-->
                    <th class="infraTh" align="center" width="25%">Nome do Arquivo</th> <!--9-->
                    <th class="infraTh" align="center" width="15%">Data</th> <!--10-->
                    <th class="infraTh" align="center" width="10%">Tamanho</th> <!--11-->
                    <th class="infraTh" align="center" width="25%">Documento</th> <!--12-->
                    <th class="infraTh" align="center" width="10%">N�vel de Acesso</th> <!--13-->
                    <th class="infraTh" align="center" width="10%">Formato</th> <!--14-->
                    <th class="infraTh" align="center" width="5%">A��es</th> <!--15-->
                </tr>
            </table>
            <input type="hidden" name="hdnTbDocumento" value="" id="hdnTbDocumento" disabled tabindex="-1"/>
            <input type="hidden" value="0" id="hdnIdDocumento" disabled tabindex="-1"/>
            <input type="hidden" name="hdnIdProcedimento" id="hdnIdProcedimento" value="" disabled tabindex="-1"/>
        </div>
    </div>
</fieldset>