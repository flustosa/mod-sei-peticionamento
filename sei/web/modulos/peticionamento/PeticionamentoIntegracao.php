<?

/**
 * ANATEL
 *
 * 23/11/2016 - criado por marcelo.bezerra - CAST
 *
 */
require_once dirname(__FILE__) . '/util/MdPetDataUtils.php';

class PeticionamentoIntegracao extends SeiIntegracao {

    //variavel de instancia, usada para identificar quais documentos tiveram seu acesso autorizado pelo modulo 
    private $arrDocumentosLiberados = array();
    private $arrProcessosLiberados = array();

    public function __construct() {
        
    }

    public function getNome() {
        return 'Peticionamento e Intima��o Eletr�nicos';
    }

    public function getVersao() {
        return '3.0.0';
    }

    public function getInstituicao() {
        return 'ANATEL (Projeto Colaborativo no Portal do SPB)';
    }

    public function inicializar($strVersaoSEI) {
        
    }

    public function processarControlador($strAcao) {

        switch ($strAcao) {

            case 'md_pet_extensoes_arquivo_cadastrar' :
                require_once dirname(__FILE__) . '/md_pet_extensoes_arquivo_cadastro.php';
                return true;

            case 'md_pet_tamanho_arquivo_cadastrar' :
                require_once dirname(__FILE__) . '/md_pet_tamanho_arquivo_cadastro.php';
                return true;

            case 'md_pet_indisponibilidade_listar' :
            case 'md_pet_indisponibilidade_desativar' :
            case 'md_pet_indisponibilidade_reativar' :
            case 'md_pet_indisponibilidade_excluir' :
                require_once dirname(__FILE__) . '/md_pet_indisponibilidade_lista.php';
                return true;

            case 'md_pet_indisponibilidade_cadastrar':
            case 'md_pet_indisponibilidade_consultar':
            case 'md_pet_indisponibilidade_alterar':
            case 'md_pet_indisponibilidade_upload_anexo':
            case 'md_pet_indisponibilidade_download':
                require_once dirname(__FILE__) . '/md_pet_indisponibilidade_cadastro.php';
                return true;

            case 'md_pet_tipo_processo_listar' :
            case 'md_pet_tipo_processo_desativar' :
            case 'md_pet_tipo_processo_reativar':
            case 'md_pet_tipo_processo_excluir':
                require_once dirname(__FILE__) . '/md_pet_tipo_processo_lista.php';
                return true;

            case 'md_pet_tipo_processo_cadastrar':
            case 'md_pet_tipo_processo_alterar':
            case 'md_pet_tipo_processo_consultar':
            case 'md_pet_tipo_processo_salvar':
                require_once dirname(__FILE__) . '/md_pet_tipo_processo_cadastro.php';
                return true;

            case 'md_pet_tipo_processo_cadastrar_orientacoes':
                require_once dirname(__FILE__) . '/md_pet_tipo_processo_cadastro_orientacoes.php';
                return true;

            case 'md_pet_serie_selecionar':
                require_once dirname(__FILE__) . '/md_pet_serie_lista.php';
                return true;

            case 'md_pet_pessoa_fisica':
                require_once dirname(__FILE__) . '/md_pet_pessoa_fisica.php';
                return true;

            case 'md_pet_pessoa_juridica':
                require_once dirname(__FILE__) . '/md_pet_pessoa_juridica.php';
                return true;

            case 'md_pet_menu_usu_ext_listar' :
            case 'md_pet_menu_usu_ext_desativar' :
            case 'md_pet_menu_usu_ext_reativar':
            case 'md_pet_menu_usu_ext_excluir':
                require_once dirname(__FILE__) . '/md_pet_menu_usu_ext_lista.php';
                return true;

            case 'md_pet_menu_usu_ext_cadastrar':
            case 'md_pet_menu_usu_ext_alterar':
            case 'md_pet_menu_usu_ext_consultar':
                require_once dirname(__FILE__) . '/md_pet_menu_usu_ext_cadastro.php';
                return true;

            case 'md_pet_pagina_conteudo_externo':
                require_once dirname(__FILE__) . '/md_pet_pagina_conteudo_externo.php';
                return true;

            case 'md_pet_tp_ctx_contato_cadastrar':
                require_once dirname(__FILE__) . '/md_pet_tp_ctx_contato_cadastro.php';
                return true;

            case 'md_pet_hipotese_legal_nl_acesso_cadastrar':
                require_once dirname(__FILE__) . '/md_pet_hipotese_legal_nl_acesso_cadastro.php';
                return true;

            case 'md_pet_hipotese_legal_selecionar':
                require_once dirname(__FILE__) . '/md_pet_hipotese_legal_lista.php';
                return true;

            //ADMINISTRA��O DE CRIT�RIOS PARA INTERCORRENTE
            case 'md_pet_intercorrente_criterio_listar' :
            case 'md_pet_intercorrente_criterio_desativar' :
            case 'md_pet_intercorrente_criterio_reativar':
            case 'md_pet_intercorrente_criterio_excluir':
                require_once dirname(__FILE__) . '/md_pet_intercorrente_criterio_lista.php';
                return true;

            case 'md_pet_intercorrente_criterio_cadastrar':
            case 'md_pet_intercorrente_criterio_alterar':
            case 'md_pet_intercorrente_criterio_consultar':
                require_once dirname(__FILE__) . '/md_pet_intercorrente_criterio_cadastro.php';
                return true;

            case 'md_pet_intercorrente_criterio_padrao':
                require_once dirname(__FILE__) . '/md_pet_intercorrente_criterio_padrao.php';
                return true;

            case 'md_pet_arquivo_extensao_selecionar':
                require_once dirname(__FILE__) . '/md_pet_arquivo_extensao_lista.php';
                return true;

            //intimacao
            case 'md_pet_int_prazo_tacita_cadastrar':
            case 'md_pet_int_prazo_tacita_alterar':
                require_once dirname(__FILE__) . '/md_pet_int_prazo_tacita_cadastro.php';
                return true;

            //EU 8611
            case 'md_pet_int_serie_cadastrar':
                require_once dirname(__FILE__) . '/md_pet_int_serie_cadastro.php';
                return true;

            //EU 8612
            case 'md_pet_int_tipo_resp_cadastrar':
            case 'md_pet_int_tipo_resp_alterar':
            case 'md_pet_int_tipo_resp_consultar':
                require_once dirname(__FILE__) . '/md_pet_int_tipo_resp_cadastro.php';
                return true;

            case 'md_pet_int_tipo_resp_listar':
            case 'md_pet_int_tipo_resp_desativar':
            case 'md_pet_int_tipo_resp_reativar':
            case 'md_pet_int_tipo_resp_excluir':
            case 'md_pet_int_tipo_resp_selecionar':
                require_once dirname(__FILE__) . '/md_pet_int_tipo_resp_lista.php';
                return true;

            case 'md_pet_int_tipo_intimacao_cadastrar':
            case 'md_pet_int_tipo_intimacao_alterar':
            case 'md_pet_int_tipo_intimacao_consultar':
                require_once dirname(__FILE__) . '/md_pet_int_tipo_intimacao_cadastro.php';
                return true;

            case 'md_pet_int_tipo_intimacao_selecionar':
            case 'md_pet_int_tipo_intimacao_listar':
            case 'md_pet_int_tipo_intimacao_desativar':
            case 'md_pet_int_tipo_intimacao_reativar':
            case 'md_pet_int_tipo_intimacao_excluir':
                require_once dirname(__FILE__) . '/md_pet_int_tipo_intimacao_lista.php';
                return true;

            case 'md_pet_orientacoes_tipo_destinatario':
                require_once dirname(__FILE__) . '/md_pet_vinc_orientacoes_tipo_destinatario.php';
                return true;

            case 'md_pet_intimacao_cadastrar':
                require_once dirname(__FILE__) . '/md_pet_intimacao_cadastro.php';
                return true;

            case 'md_pet_intimacao_cadastro_confirmar':
                require_once dirname(__FILE__) . '/md_pet_intimacao_cadastro_confirmar.php';
                return true;

            case 'md_pet_intimacao_consultar':
                require_once dirname(__FILE__) . '/md_pet_intimacao_consulta.php';
                return true;

            case 'md_pet_intimacao_eletronica_listar':
                require_once dirname(__FILE__) . '/md_pet_intimacao_eletronica_lista.php';
                return true;

            case 'md_pet_intimacao_consulta':
                require_once dirname(__FILE__) . '/md_pet_intimacao_consulta.php';
                return true;

            case 'md_pet_int_relatorio_listar':
                require_once dirname(__FILE__) . '/md_pet_int_relatorio_acoes.php';
                return true;

            case 'md_pet_int_relatorio_ht_listar':
                require_once dirname(__FILE__) . '/md_pet_int_relatorio_ht_lista.php';
                return true;

            case 'md_pet_int_relatorio_exp_excel':
                require_once dirname(__FILE__) . '/md_pet_int_relatorio_exp_excel.php';
                return true;

            // tela 9275 Novo tipo processo vincula��o usu ext pj
            case 'md_pet_vinc_tp_processo_cadastrar':
                require_once dirname(__FILE__) . '/md_pet_vinc_tp_processo_cadastro.php';
                return true;

            case 'md_pet_integracao_alterar':
                require_once dirname(__FILE__) . '/md_pet_integracao_cadastro.php';
                return true;

            case 'md_pet_integracao_cadastrar':
                require_once dirname(__FILE__) . '/md_pet_integracao_cadastro.php';
                return true;

            case 'md_pet_integracao_consultar':
                require_once dirname(__FILE__) . '/md_pet_integracao_cadastro.php';
                return true;

            case 'md_pet_integracao_listar':
                require_once dirname(__FILE__) . '/md_pet_integracao_lista.php';
                return true;

            case 'md_pet_integracao_desativar':
                require_once dirname(__FILE__) . '/md_pet_integracao_lista.php';
                return true;

            case 'md_pet_integracao_excluir':
                require_once dirname(__FILE__) . '/md_pet_integracao_lista.php';
                return true;

            case 'md_pet_integracao_reativar':
                require_once dirname(__FILE__) . '/md_pet_integracao_lista.php';
                return true;

            case 'md_pet_vinculo_procuracao_visualizar':
                require_once dirname(__FILE__) . '/md_pet_vinculo_procuracao_visualizacao.php';
                return true;

            /** 9277 */
            /**
             * 9287
             *
             * Tela listagem relat�rio
             */
            case 'md_pet_adm_vinc_listar':
            case 'md_pet_adm_vinc_consultar':
                require_once dirname(__FILE__) . '/md_pet_adm_vinc_lista.php';
                return true;

            /*
             * Tela 6 - Cconsulta de documentos gerados no vinculo
             */
            case 'md_pet_vinpj_doc_procuracao_consultar':
                require_once dirname(__FILE__) . '/md_pet_vinc_doc_procuracao_consulta.php';
                return true;


            // 9276
            // Tela "Administrar V�nculos a Pessoas Jur�dicas e Procura��es Eletr�nicas"
            case 'md_pet_vinc_listar':
                require_once dirname(__FILE__) . '/md_pet_vinc_lista.php';
                return true;

            // Tela "Alterar Respons�vel Legal por Pessoa Jur�dica"
            case 'md_pet_vinc_responsavel_cadastrar':
                require_once dirname(__FILE__) . '/md_pet_vinc_responsavel_cadastro.php';
                return true;

            case 'md_pet_vinc_usu_ext_pe_cadastrar':
                die('Erro PeticionamentoIntegracao line: 274');
                require_once dirname(__FILE__) . '/md_pet_vinc_responsavel_cadastro.php';
                return true;

            case 'md_pet_vinc_pessoa_cadastrar':
                require_once dirname(__FILE__) . '/md_pet_vinc_pessoa_cadastro.php';
                return true;

            case 'md_pet_vinc_suspender_restabelecer_concluir':
            case 'md_pet_vinc_responsavel_concluir_alt':
                require_once dirname(__FILE__) . '/md_pet_vinc_pe_suspender_restabelecer_concluir.php';
                return true;

            case 'md_pet_vinc_suspender_restabelecer':
                require_once dirname(__FILE__) . '/md_pet_vinc_pe_suspender_restabelecer.php';
                return true;


            case 'md_pet_int_orientacoes_destinatario':
                require_once dirname(__FILE__) . '/md_pet_int_orientacoes_tp_destinatario.php';
                return true;

            case 'md_pet_intimacao_cadastro_fisica':
                require_once dirname(__FILE__) . '/md_pet_intimacao_cadastro_fisica.php';
                return true;

            case 'md_pet_intimacao_cadastro_juridica':
                require_once dirname(__FILE__) . '/md_pet_intimacao_cadastro_juridica.php';
                return true;
        }

        return false;
    }

    public function processarControladorAjax($strAcao) {

        $xml = null;

        switch ($_GET['acao_ajax']) {

            case 'md_pet_serie_auto_completar':
                $arrObjSerieDTO = MdPetSerieINT::autoCompletarSeries($_POST['palavras_pesquisa'], $_POST['tipoDoc']);
                $xml = InfraAjax::gerarXMLItensArrInfraDTO($arrObjSerieDTO, 'IdSerie', 'Nome');
                break;

            case 'md_pet_tipo_processo_auto_completar':
                $arrObjTipoProcessoDTO = TipoProcedimentoINT::autoCompletarTipoProcedimento($_POST['palavras_pesquisa']);
                $xml = InfraAjax::gerarXMLItensArrInfraDTO($arrObjTipoProcessoDTO, 'IdTipoProcedimento', 'Nome');
                break;

            case 'md_pet_intercorrente_tipo_processo_auto_completar':
                $arrObjTipoProcessoDTO = MdPetTipoProcessoINT::autoCompletarTipoProcedimento($_POST['palavras_pesquisa'], $_POST['itens_selecionados']);
                $xml = InfraAjax::gerarXMLItensArrInfraDTO($arrObjTipoProcessoDTO, 'IdTipoProcedimento', 'Nome');
                break;

            case 'md_pet_unidade_auto_completar':
                $arrObjUnidadeDTO = UnidadeINT::autoCompletarUnidades($_POST['palavras_pesquisa'], true, '');
                $xml = InfraAjax::gerarXMLItensArrInfraDTO($arrObjUnidadeDTO, 'IdUnidade', 'Sigla');
                break;

            case 'md_pet_tipo_processo_nivel_acesso_auto_completar':
                $arrObjNivelAcessoDTO = MdPetTipoProcessoINT::montarSelectNivelAcesso(null, null, null, $_POST['idTipoProcesso']);
                $xml = InfraAjax::gerarXMLSelect($arrObjNivelAcessoDTO);
                break;

            case 'md_pet_tipo_processo_nivel_acesso_validar':
                $xml = MdPetTipoProcessoINT::validarNivelAcesso($_POST);
                break;

            case 'md_pet_tp_ctx_contato_listar':
                $arrObjTipoContextoDTO = MdPetTpCtxContatoINT::montarSelectNome(null, null, $_POST['extensao']);
                $xml = InfraAjax::gerarXMLItensArrInfraDTO($arrObjTipoContextoDTO, 'IdTipoContato', 'Nome');
                break;

            case 'md_pet_hipotese_rest_auto_completar':
                $arrObjHipoteseLegalDTO = MdPetHipoteseLegalINT::autoCompletarHipoteseLegal($_POST['palavras_pesquisa'], ProtocoloRN::$NA_RESTRITO);
                $xml = InfraAjax::gerarXMLItensArrInfraDTO($arrObjHipoteseLegalDTO, 'IdHipoteseLegal', 'Nome');
                break;

            case 'md_pet_arquivo_extensao_listar_todos':
                $arrObjMdPetArquivoExtensaoDTO = MdPetArquivoExtensaoINT::autoCompletarExtensao($_POST['extensao']);
                $xml = InfraAjax::gerarXMLItensArrInfraDTO($arrObjMdPetArquivoExtensaoDTO, 'IdArquivoExtensao', 'Extensao');
                break;

            //Intimacao
            //EU8612
            case 'integracao_tipo_resposta':
                $strOptions = MdPetIntTipoRespINT::montarSelectTipoRespostaEU8612($_POST['tipoResposta']);
                $xml = InfraAjax::gerarXMLSelect($strOptions);
                break;

            case 'busca_tipo_resposta':
                $xml = MdPetIntTipoRespINT::buscaTipoResposta($_POST['id']);
                break;

            case 'md_pet_int_usuario_auto_completar_juridica':
                $objMdPetIntimacaoRN = new MdPetIntimacaoRN();
                $arrContatosDTO = $objMdPetIntimacaoRN->filtrarContatosPesquisaIntimacaoJuridica($_POST);
                if ($arrContatosDTO > 0) {
                    $xml = MdPetContatoINT::getContatosNomeAutoCompleteJuridico($arrContatosDTO);
                } else {
                    $xml = '';
                }

                break;

            case 'md_pet_int_usuario_auto_completar':
                $objMdPetIntimacaoRN = new MdPetIntimacaoRN();
                $arrContatosDTO = $objMdPetIntimacaoRN->filtrarContatosPesquisaIntimacao($_POST);

                if ($arrContatosDTO > 0) {
                    $xml = MdPetContatoINT::getContatosNomeAutoCompletePF($arrContatosDTO);
                } else {
                    $xml = '';
                }

                break;

            case 'busca_tipo_resposta_intimacao':
                $xml = MdPetIntTipoIntimacaoINT::montaSelectTipoRespostaIntimacao($_POST['paramsBusca']);
                break;

            case 'usuario_dados_tabela':
                $xml = $total = MdPetContatoINT::getDadosContatos($_POST['paramsBusca'], $_POST['paramsIdDocumento']);
                break;

            case 'usuario_dados_tabela_juridica':
                $xml = $total = MdPetContatoINT::getDadosContatosJuridico($_POST['paramsBusca'], $_POST['paramsIdDocumento']);
                break;

            case 'md_pet_int_serie_auto_completar':
                $arrObjSerieDTO = MdPetSerieINT::autoCompletarSeriesIntimacao($_POST['palavras_pesquisa']);
                $xml = InfraAjax::gerarXMLItensArrInfraDTO($arrObjSerieDTO, 'IdSerie', 'Nome');
                break;

            case 'md_pet_int_validar_cadastro':
                $xml = MdPetIntimacaoINT::validarCadastro(array($_POST['hdnDadosUsuario'], $_POST['tpAcessoSelecao'], $_POST['idProcedimento'], $_POST['stringDocAnex'], $_POST['idDocumento'], $_POST['tipoPessoa']));
                break;

            case 'md_pet_indisp_validar_num_sei':
                $xml = MdPetIndisponibilidadeINT::validarNumeroSEI($_POST['numeroSEI']);
                break;

            case 'md_pet_indisp_validar_periodo':
                $xml = MdPetIndisponibilidadeINT::validarPeriodoIndisp($_POST['dataInicio'], $_POST['dataFim']);
                break;

            case 'md_pet_tp_int_auto_completar':
                $arrObjDTO = MdPetIntTipoIntimacaoINT::autoCompletarTipoIntimacao($_POST['palavras_pesquisa'], true, '');
                $xml = InfraAjax::gerarXMLItensArrInfraDTO($arrObjDTO, 'IdMdPetIntTipoIntimacao', 'Nome');
                break;

            case 'md_pet_integracao_busca_operacao_wsdl':
                $xml = MdPetIntegracaoINT::montarXMLBuscarOperacaoWSDL($_POST['endereco_wsdl']);
                break;
            case 'md_pet_integracao_busca_parametro_wsdl':
                $xml = MdPetIntegracaoINT::montarXMLBuscarOperacaoWSDLParametro($_POST['endereco_wsdl'], $_POST['operacao_wsdl'], $_POST['tipo_parametro']);
                break;

            // 9276
            //Valida��o via webservice de cpf de Respons�vel Legal (equivalente processarControladorAjaxExterno->md_pet_vinc_usu_ext_usuario_externo)
            case 'md_pet_vinc_responsavellegal_cpf_consultar' :
                $xml = MdPetIntegracaoRN::consultarContatoCpf($_POST);
                break;

            case 'md_pet_validar_num_sei':
                $xml = MdPetIndisponibilidadeINT::validarNumeroSEI($_POST['numeroSEI']);
                break;
        }

        return $xml;
    }

    public function processarControladorPublicacoes($strAcao) {

        switch ($strAcao) {

            case 'abc_publicacao_exemplo':
                require_once dirname(__FILE__) . '/publicacao_exemplo.php';
                return true;
        }

        return false;
    }

    public function processarControladorAjaxExterno($strAcaoAjax) {
        $xml = null;

        switch ($strAcaoAjax) {
            case 'md_pet_intercorrente_usu_ext_remover_upload_arquivo':
                $xml = MdPetIntercorrenteProcessoRN::removerArquivoIntecorrenteTemp($_POST['hdnTbDocumento']);
                break;
            case 'md_pet_usu_ext_remover_upload_arquivo':
                $xml = MdPetIntercorrenteProcessoRN::removerArquivoTemp($_POST['hdnTbDocumento']);
                break;
            case 'md_pet_vinc_usu_ext_consulta_receita' :
                $objMdPetIntegracaoRN = new MdPetIntegracaoRN();
                $xml = $objMdPetIntegracaoRN->consultarReceitaWsResponsavelLegal($_POST);
                break;
            case 'md_pet_vinc_usu_ext_consulta_vinculo' :
                $xml = MdPetVinculoINT::validarExistenciaVinculoCnpj($_POST);
                break;
            case 'md_pet_vinc_usu_ext_dados_usuario' :
                $xml = MdPetVincUsuarioExternoINT::consultarDadosUsuario($_POST);
                break;
            case 'md_pet_vinc_usu_ext_dados_usuario_externo' :
                $xml = MdPetVincUsuarioExternoINT::consultarDadosUsuarioExterno($_POST);
                break;
            case 'md_pet_vinc_usu_ext_autocompletar' :
                $objMdPetIntimacaoRN = new MdPetIntimacaoRN();
                $post = $_POST;
                $post['sessao_externa'] = 1;
                $arrContatosDTO = $objMdPetIntimacaoRN->filtrarContatosPesquisaIntimacao($post);
                if ($arrContatosDTO > 0) {
                    $strOptions = MdPetContatoINT::getContatosNomeAutoComplete($arrContatosDTO);

                    $xml = InfraAjax::gerarXMLItensArrInfraDTO($strOptions, 'IdContato', 'Nome', 'Email');
                } else {
                    $xml = '';
                }
                break;
            case 'md_pet_vinc_usu_ext_consulta_contato' :
                $objMdPetContatoRN = new MdPetContatoRN();
                $xml = $objMdPetContatoRN->consultarContato($_POST);
                break;
            case 'md_pet_vinc_usu_ext_usuario_externo' :
                $xml = MdPetIntegracaoRN::consultarContatoCpf($_POST);
                break;
            case 'md_pet_vinc_validar_representante' :
                $xml = MdPetVincRepresentantINT::validarUsuarioResponsavelLegal($_POST);
                break;
            case 'md_pet_vinc_consulta_usuext_valido' :
                $xml = MdPetVincUsuarioExternoINT::consultarUsuarioValido($_POST);
                break;
            case 'md_pet_validar_resposta':
                $xml = MdPetIntRelTipoRespINT::montarSelectTipoRespostaAjax($_POST);
                $xml = InfraAjax::gerarXMLItensArrInfraDTO($xml, 'IdMdPetIntRelTipoResp', 'Nome');
                break;
            case 'md_pet_consultar_contato_intimacao':
                $xml = MdPetIntRelDestinatarioINT::consultarIntimacao($_POST);
                //$xml = InfraAjax::gerarXMLItensArrInfraDTO($xml, 'IdContato');
                
                break;
        }

        return $xml;
    }

    public function processarControladorExterno($strAcao) {

        switch ($strAcao) {

            case 'md_pet_pagina_conteudo_externo':
                require_once dirname(__FILE__) . '/md_pet_pagina_conteudo_externo.php';
                return true;

            case 'md_pet_usu_ext_indisponibilidade_listar' :
                require_once dirname(__FILE__) . '/md_pet_usu_ext_indisponibilidade_lista.php';
                return true;

            case 'md_pet_usu_ext_indisponibilidade_consultar':
            case 'md_pet_usu_ext_indisponibilidade_download':
                require_once dirname(__FILE__) . '/md_pet_usu_ext_indisponibilidade_cadastro.php';
                return true;

            //peticionamento intercorrente
            case 'md_pet_intercorrente_usu_ext_cadastrar':
                require_once dirname(__FILE__) . '/md_pet_intercorrente_usu_ext_cadastro.php';
                return true;

            case 'md_pet_intercorrente_usu_ext_concluir':
            case 'md_pet_intercorrente_usu_ext_assinar':
            case 'md_pet_responder_intimacao_usu_ext_concluir':
            case 'md_pet_responder_intimacao_usu_ext_assinar':

            // Vincula��o Pessoa Jur�dica - Nova
            case 'md_pet_vinc_usu_ext_concluir':
            case 'md_pet_vinc_usu_ext_assinar':
                require_once dirname(__FILE__) . '/md_pet_intercorrente_usu_ext_concluir.php';
                return true;

            //novo peticionamento - 5152
            case 'md_pet_usu_ext_iniciar':
                require_once dirname(__FILE__) . '/md_pet_usu_ext_inicio.php';
                return true;

            case 'md_pet_usu_ext_cadastrar':
                require_once dirname(__FILE__) . '/md_pet_usu_ext_cadastro.php';
                return true;

            case 'peticionamento_usuario_externo_concluir':
                require_once dirname(__FILE__) . '/md_pet_usu_ext_concluir.php';
                return true;

            //peticionamento intercorrente - Janela de concluir peticionamento
            case 'md_pet_intercorrente_usu_ext_concluir':
                require_once dirname(__FILE__) . '/md_pet_intercorrente_usu_ext_conclusao.php';
                return true;

            //consulta de recibo - 5153
            case 'md_pet_usu_ext_recibo_listar':
                require_once dirname(__FILE__) . '/md_pet_usu_ext_recibo_lista.php';
                return true;

            case 'md_pet_usu_ext_recibo_consultar':
                require_once dirname(__FILE__) . '/md_pet_usu_ext_recibo_consulta.php';
                return true;

            //Consulta de Recibo - EU7050
            case 'md_pet_intercorrente_usu_ext_recibo_consultar':
                require_once dirname(__FILE__) . '/md_pet_intercorrente_usu_ext_recibo_consulta.php';
                return true;

            case 'md_pet_interessado_cadastro':
                require_once dirname(__FILE__) . '/md_pet_interessado_cadastro.php';
                return true;

            case 'md_pet_contato_selecionar':
                require_once dirname(__FILE__) . '/md_pet_contato_selecionar.php';
                return true;

            case 'md_pet_usu_ext_upload_anexo':
                if (isset($_FILES['fileArquivoEssencial'])) {
                    PaginaSEIExterna::getInstance()->processarUpload('fileArquivoEssencial', DIR_SEI_TEMP, true);
                }
                die;

            case 'md_pet_usu_ext_upload_doc_principal':

                if (isset($_FILES['fileArquivoPrincipal'])) {

                    PaginaSEIExterna::getInstance()->processarUpload('fileArquivoPrincipal', DIR_SEI_TEMP, false);
                }
                die;

            case 'md_pet_usu_ext_upload_doc_essencial':

                if (isset($_FILES['fileArquivoEssencial'])) {

                    PaginaSEIExterna::getInstance()->processarUpload('fileArquivoEssencial', DIR_SEI_TEMP, false);
                }
                die;

            case 'md_pet_usu_ext_upload_doc_complementar':

                if (isset($_FILES['fileArquivoComplementar'])) {

                    PaginaSEIExterna::getInstance()->processarUpload('fileArquivoComplementar', DIR_SEI_TEMP, false);
                }
                die;

            case 'md_pet_usu_ext_download':
                require_once dirname(__FILE__) . '/md_pet_usu_ext_cadastro.php';
                return true;

            case 'md_pet_editor_montar':
            case 'md_pet_editor_imagem_upload':
                require_once dirname(__FILE__) . '/md_pet_editor_usuario_externo_processar.php';
                return true;

            case 'md_pet_validar_documento_principal':

                $conteudo = "";

                if (SessaoSEIExterna::getInstance()->isSetAtributo('docPrincipalConteudoHTML')) {
                    $conteudo = SessaoSEIExterna::getInstance()->getAtributo('docPrincipalConteudoHTML');
                }

                echo $conteudo;
                return true;

            case 'md_pet_contato_cpf_cnpj':

                $cpfcnpj = $_POST['cpfcnpj'];
                $cpfcnpj = str_replace(".", "", $cpfcnpj);
                $cpfcnpj = str_replace("-", "", $cpfcnpj);
                $cpfcnpj = str_replace("/", "", $cpfcnpj);

                $objContextoContatoDTO = MdPetContatoINT::getTotalContatoByCPFCNPJ($cpfcnpj);

                if (count($objContextoContatoDTO) > 0) {
                    $objContato = new stdClass();
                    $objContato->usuario = $objContextoContatoDTO[0]->getNumIdUsuarioCadastro();
                    $objContato->nome = utf8_encode($objContextoContatoDTO[0]->getStrNome());
                    $objContato->id = utf8_encode($objContextoContatoDTO[0]->getNumIdContato());
                    $objContato->nomeTratado = utf8_encode(PaginaSEI::tratarHTML($objContextoContatoDTO[0]->getStrNome()));
                    $json = json_encode($objContato, JSON_FORCE_OBJECT);
                } else {
                    $json = null;
                }

                echo $json;
                return true;
                break;

            //EU7050
            case 'md_pet_processo_validar_numero':
                $xml = MdPetIntercorrenteINT::gerarXMLvalidacaoNumeroProcesso($_POST['txtNumeroProcesso']);
                echo $xml;

                return true;

            case 'md_pet_usu_ext_upload_arquivo':
                if (isset($_FILES['fileArquivo'])) {
                    PaginaSEIExterna::getInstance()->processarUpload('fileArquivo', DIR_SEI_TEMP, false);
                }
                die;

            case 'md_pet_montar_select_tipo_documento':
                $strOptions = MdPetIntercorrenteINT::montarSelectTipoDocumento('null', ' ', 'null');
                $xml = InfraAjax::gerarXMLSelect($strOptions);
                InfraAjax::enviarXML($xml);

                return true;

            case 'md_pet_montar_select_nivel_acesso':
                $strOptions = MdPetTipoProcessoINT::montarSelectNivelAcesso('null', '', 'null', $_POST['id_tipo_procedimento']);
                $xml = InfraAjax::gerarXMLSelect($strOptions);
                InfraAjax::enviarXML($xml);

                return true;

            case 'md_pet_verificar_criterio_intercorrente':
                $arrNivelAcessoHipoteseLegal = MdPetIntercorrenteINT::verificarCriterioIntercorrente($_POST['idTipoProcedimento']);
                echo json_encode($arrNivelAcessoHipoteseLegal);
                return true;

            //INTIMACAO Inicio

            case 'md_pet_intimacao_usu_ext_listar':
                require_once dirname(__FILE__) . '/md_pet_intimacao_usu_ext_lista.php';

                return true;

            case 'md_pet_responder_intimacao_usu_ext':
                require_once dirname(__FILE__) . '/md_pet_responder_intimacao_usu_ext.php';

                return true;

            //acao para upload de arquivo do resposta a intima�ao
            case 'md_pet_usu_ext_resposta_upload_anexo':
                if (isset($_FILES['fileArquivo'])) {
                    PaginaSEIExterna::getInstance()->processarUpload('fileArquivo', DIR_SEI_TEMP, true);
                }
                die;

            //acao para upload de arquivo na vincula��o da pessoa juridica
            case 'md_pet_vinc_usu_ext_upload_anexo':
                if (isset($_FILES['fileArquivo'])) {
                    PaginaSEIExterna::getInstance()->processarUpload('fileArquivo', DIR_SEI_TEMP, true);
                }
                die;

            //Modal de Aceite de Intima��o
            case 'md_pet_intimacao_usu_ext_confirmar_aceite':
                require_once dirname(__FILE__) . '/md_pet_intimacao_usu_ext_confirmar_aceite.php';
                return true;

            //INTIMACAO Fim

            /* 9277 - Vinculacoes* */
            /**
             * Tela 1 - EU9277_Vincula��o a Pessoas Jur�dicas
             */
            case 'md_pet_vinculacao_listar':
                require_once dirname(__FILE__) . '/md_pet_vinculacao_lista.php';
                return true;
            /**
             * Tela 2 - Nova Vincula��o a PJ COM Integra��o
             */
            case 'md_pet_vinc_usu_ext_cadastrar':
            case 'md_pet_vinc_usu_ext_alterar':
            case 'md_pet_vinc_usu_ext_consultar':
            case 'md_pet_vinc_usu_ext_salvar':
                require_once dirname(__FILE__) . '/md_pet_vinc_usu_ext_cadastro.php';
                return true;

            case 'md_pet_vinc_pessoa_cadastrar':
                require_once dirname(__FILE__) . '/md_pet_vinc_pessoa_cadastro.php';
                return true;

            /**
             * Tela 3 - EU9277 Procura��es Eletr�nicas Especiais
             */
            case 'md_pet_vinc_usu_ext_pe_listar':
                require_once dirname(__FILE__) . '/md_pet_vinc_usu_ext_lista.php';
                return true;

            /**
             * Tela 4 - Nova Procura��o eletronica
             */
            case 'md_pet_vinc_usu_ext_pe_cadastrar':
                require_once dirname(__FILE__) . '/md_pet_procuracao_especial_cadastro.php';
                return true;

            /**
             * tela 5 - Justificativa para revogar ou renunciar um procura��o eletronica
             */
            case 'processo_eletronico_responder_motivo_revogar':
            case 'processo_eletronico_responder_motivo_renunciar':

                require_once dirname(__FILE__) . '/md_pet_processo_eletronico_motivo.php';
                return true;

            case 'md_pet_vinc_pe_desvinculo_concluir':
                require_once dirname(__FILE__) . '/md_pet_vinc_pe_desvinculo_concluir.php';
                return true;
            /**
             * Tela 6 - Cconsulta de documentos gerados atrav�s ed uma nova procura��o
             */
            case 'md_pet_vinpj_doc_procuracao_consultar':
                require_once dirname(__FILE__) . '/md_pet_vinc_doc_procuracao_consulta.php';
                return true;

            /**
             * 9277 - Tela de conclus�o
             */
            case 'md_pet_usuario_ext_vinc_pj_concluir_cad':
            case 'md_pet_usuario_ext_vinc_pj_concluir_alt':
                require_once dirname(__FILE__) . '/md_pet_vinc_usu_externo_concluir.php';
                return true;

            case 'peticionamento_usuario_externo_vinc_pe':
                require_once dirname(__FILE__) . '/md_pet_vinc_pe_usu_externo_concluir.php';
                return true;

            case 'md_pet_vincpf_usu_ext_bloco_orientacoes':
                require_once dirname(__FILE__) . '/md_pet_vinc_usu_ext_bloco_orientacoes.php';
                return true;
        }

        return false;
    }

    public function montarIconeProcesso(ProcedimentoAPI $objProcedimentoAPI) {
        $arrObjArvoreAcaoItemAPI = array();
        $dblIdProcedimento = $objProcedimentoAPI->getIdProcedimento();
        $arrRetDadosIcones = $this->retornarArrDadosParaIcones($dblIdProcedimento);
        if (is_array($arrRetDadosIcones) && count($arrRetDadosIcones) > 0) {
            $recibo = $arrRetDadosIcones['recibo'];
            $data = MdPetDataUtils::setFormat($recibo->getDthDataHoraRecebimentoFinal(), 'dd/mm/yyyy');
            $numeroDocPrincipal = $recibo->getStrTextoDocumentoPrincipalIntimac();
            $title = "";
            $icone = "";
            $id = "";
            $tipo = "";

            //recibo mais atual � de resposta a intima�ao
            if ($recibo->getStrStaTipoPeticionamento() == MdPetReciboRN::$TP_RECIBO_RESPOSTA_INTIMACAO) {

                $tipo = 'PETICIONAMENTO';
                $id = 'PET' . $dblIdProcedimento;
                $title = 'Peticionamento Eletr�nico\nResposta a Intima��o: ' . $data . '\n(Documento Principal: SEI n� ' . $numeroDocPrincipal . ')';
                $icone = 'modulos/peticionamento/imagens/peticionamento_resposta_a_intimacao.png';
            } //recibo mais atual � de pet intercorrente
            else if ($recibo->getStrStaTipoPeticionamento() == MdPetReciboRN::$TP_RECIBO_INTERCORRENTE) {

                $title = 'Peticionamento Eletr�nico\nIntercorrente: ' . $data;
                $tipo = 'PETICIONAMENTO';
                $id = 'PET' . $dblIdProcedimento;
                $icone = 'modulos/peticionamento/imagens/peticionamento_intercorrente.png';
            } //recibo mais atual � de pet de processo novo
            else if ($recibo->getStrStaTipoPeticionamento() == MdPetReciboRN::$TP_RECIBO_NOVO) {

                $data = MdPetDataUtils::setFormat($recibo->getDthDataHoraRecebimentoFinal(), 'dd/mm/yyyy');
                $title = 'Peticionamento Eletr�nico\nProcesso Novo: ' . $data;
                $tipo = 'PETICIONAMENTO';
                $id = 'PET' . $dblIdProcedimento;
                $icone = 'modulos/peticionamento/imagens/peticionamento_processo_novo.png';
            }

            $objArvoreAcaoItemAPI = new ArvoreAcaoItemAPI();
            $objArvoreAcaoItemAPI->setTipo($tipo);
            $objArvoreAcaoItemAPI->setId($id);
            $objArvoreAcaoItemAPI->setIdPai($dblIdProcedimento);
            $objArvoreAcaoItemAPI->setTitle($title);
            $objArvoreAcaoItemAPI->setIcone($icone);
            $objArvoreAcaoItemAPI->setTarget(null);
            $objArvoreAcaoItemAPI->setHref('javascript:;');
            $objArvoreAcaoItemAPI->setSinHabilitado('S');
            $arrObjArvoreAcaoItemAPI[] = $objArvoreAcaoItemAPI;
        }

        return $arrObjArvoreAcaoItemAPI;
    }

    //m�todo geral para apoio na montagem de icones para as 3 telas (Controle de Processos, Tela interna/arvore do processo e Acompanhamento Especial)
    private function retornarArrDadosParaIcones($idProcedimento) {

        $reciboRN = new MdPetReciboRN();
        $arrDados = array();

        //pegar o recibo mais atual disponivel (caso haja um) e verificar se � de resposta a intima��o, intercorrente ou de peticionamento de processo novo e aplicar icone+tooltip correspondente

        $reciboIntercorrenteDTO = new MdPetReciboDTO();
        $reciboIntercorrenteDTO->setNumMaxRegistrosRetorno(1);
        $reciboIntercorrenteDTO->retNumIdProtocolo();
        $reciboIntercorrenteDTO->retStrStaTipoPeticionamento();
        $reciboIntercorrenteDTO->retDthDataHoraRecebimentoFinal();
        $reciboIntercorrenteDTO->retStrTextoDocumentoPrincipalIntimac();
        $reciboIntercorrenteDTO->setNumIdProtocolo($idProcedimento);
        $reciboIntercorrenteDTO->setOrd('DataHoraRecebimentoFinal', InfraDTO::$TIPO_ORDENACAO_DESC);
        $arrRecibosResposta = $reciboRN->listar($reciboIntercorrenteDTO);

        if ($arrRecibosResposta != null && count($arrRecibosResposta) > 0) {

            $reciboDTO = $arrRecibosResposta[0];

            $data = MdPetDataUtils::setFormat($reciboDTO->getDthDataHoraRecebimentoFinal(), 'dd/mm/yyyy');
            $linhaDeCima = '';
            $linhaDeBaixo = '';
            $img = '';

            //recibo mais atual � de resposta a intima�ao
            if ($reciboDTO->getStrStaTipoPeticionamento() == MdPetReciboRN::$TP_RECIBO_RESPOSTA_INTIMACAO) {

                $data = MdPetDataUtils::setFormat($reciboDTO->getDthDataHoraRecebimentoFinal(), 'dd/mm/yyyy');
                $numeroDocPrincipal = $reciboDTO->getStrTextoDocumentoPrincipalIntimac();
                $linhaDeCima = '"Peticionamento Eletr�nico"';
                $linhaDeBaixo = '"Resposta a Intima��o: ' . $data . ' (Documento Principal: SEI n� ' . $numeroDocPrincipal . ')"';

                $img = "<img src='modulos/peticionamento/imagens/peticionamento_resposta_a_intimacao.png' onmouseout='return infraTooltipOcultar();' onmouseover='return infraTooltipMostrar(" . $linhaDeBaixo . "," . $linhaDeCima . ");' />";
            } //recibo mais atual � de peticionamento intercorrente
            else if ($reciboDTO->getStrStaTipoPeticionamento() == MdPetReciboRN::$TP_RECIBO_INTERCORRENTE) {

                $linhaDeCima = '"Peticionamento Eletr�nico"';
                $linhaDeBaixo = '"Intercorrente: ' . $data . '"';

                $img = "<img src='modulos/peticionamento/imagens/peticionamento_intercorrente.png' onmouseout='return infraTooltipOcultar();' onmouseover='return infraTooltipMostrar(" . $linhaDeBaixo . "," . $linhaDeCima . ");' />";
            } //recibo mais atual � de peticionamento de processo novo
            else if ($reciboDTO->getStrStaTipoPeticionamento() == MdPetReciboRN::$TP_RECIBO_NOVO) {

                $linhaDeCima = '"Peticionamento Eletr�nico"';
                $linhaDeBaixo = '"Processo Novo: ' . $data . '"';

                $img = "<img src='modulos/peticionamento/imagens/peticionamento_processo_novo.png' onmouseout='return infraTooltipOcultar();' onmouseover='return infraTooltipMostrar(" . $linhaDeBaixo . "," . $linhaDeCima . ");' />";
            }

            $arrDados['recibo'] = $reciboDTO;
            $arrDados['data'] = $data;
            $arrDados['linhaDeCima'] = $linhaDeCima;
            $arrDados['linhaDeBaixo'] = $linhaDeBaixo;
            $arrDados['img'] = $img;
        }

        return $arrDados;
    }

    //Icone exibido na tela "Controle de Processos"
    public function montarIconeControleProcessos($arrObjProcedimentoDTO) {

        $arrParam = array();

        if ($arrObjProcedimentoDTO != null && count($arrObjProcedimentoDTO) > 0) {

            foreach ($arrObjProcedimentoDTO as $objProcedimentoAPI) {

                $arrRetDadosIcones = $this->retornarArrDadosParaIcones($objProcedimentoAPI->getIdProcedimento());

                if (is_array($arrRetDadosIcones) && count($arrRetDadosIcones) > 0) {
                    $arrParam[$objProcedimentoAPI->getIdProcedimento()] = array($arrRetDadosIcones['img']);
                }
            }
        } //fim do foor de ArrProcedimentoApi

        return $arrParam;
    }

    //Icone exibido na tela "Acompanhamento Especial"
    public function montarIconeAcompanhamentoEspecial($arrObjProcedimentoDTO) {

        $arrParam = array();

        if ($arrObjProcedimentoDTO != null && count($arrObjProcedimentoDTO) > 0) {

            foreach ($arrObjProcedimentoDTO as $procDTO) {

                $arrRetDadosIcones = $this->retornarArrDadosParaIcones($procDTO->getIdProcedimento());

                if (is_array($arrRetDadosIcones) && count($arrRetDadosIcones) > 0) {
                    $arrParam[$procDTO->getIdProcedimento()] = array($arrRetDadosIcones['img']);
                }
            }
        }

        return $arrParam;
    }

    public function montarMenuUsuarioExterno() {
        $menuExternoRN = new MdPetMenuUsuarioExternoRN();
        $menuExternoDTO = new MdPetMenuUsuarioExternoDTO();
        $menuExternoDTO->retTodos();
        $menuExternoDTO->setStrSinAtivo('S');

        $menuExternoDTO->setOrd("Nome", InfraDTO::$TIPO_ORDENACAO_ASC);

        $objLista = $menuExternoRN->listar($menuExternoDTO);
        $numRegistros = count($objLista);

        //utilizado para ordena��o
        $urlBase = ConfiguracaoSEI::getInstance()->getValor('SEI', 'URL');
        $arrMenusNomes = array();

        $arrMenusNomes["Peticionamento"] = $urlBase . '/controlador_externo.php?acao=md_pet_usu_ext_iniciar';

        $arrMenusNomes["Recibos Eletr�nicos de Protocolo"] = $urlBase . '/controlador_externo.php?acao=md_pet_usu_ext_recibo_listar';

        $arrMenusNomes['Intima��es Eletr�nicas'] = $urlBase . '/controlador_externo.php?acao=md_pet_intimacao_usu_ext_listar';

        if (is_array($objLista) && $numRegistros > 0) {

            for ($i = 0; $i < $numRegistros; $i++) {

                $item = $objLista[$i];

                if ($item->getStrTipo() == MdPetMenuUsuarioExternoRN::$TP_EXTERNO) {
                    $link = "javascript:";
                    $link .= "var a = document.createElement('a'); ";
                    $link .= "a.href='" . $item->getStrUrl() . "'; ";
                    $link .= "a.target = '_blank'; ";
                    $link .= "document.body.appendChild(a); ";
                    $link .= "a.click(); ";
                    $arrMenusNomes[$item->getStrNome()] = $link;
                } else if ($item->getStrTipo() == MdPetMenuUsuarioExternoRN::$TP_CONTEUDO_HTML) {

                    $idItem = $item->getNumIdMenuPeticionamentoUsuarioExterno();
                    $strLinkMontado = SessaoSEIExterna::getInstance()->assinarLink($urlBase . '/controlador_externo.php?acao=md_pet_pagina_conteudo_externo&id_md_pet_usu_externo_menu=' . $idItem);
                    $arrMenusNomes[$item->getStrNome()] = $strLinkMontado;
                }
            }
        }

        //Configurado: Tipo de Processo de Vincula��o
        $objMdPetVincTpProcessoRN = new MdPetVincTpProcessoRN();
        $objMdPetVincTpProcessoDTO = new MdPetVincTpProcessoDTO();
        $objMdPetVincTpProcessoDTO->retNumIdMdPetVincTpProcesso();
        $objMdPetVincTpProcessoDTO->setNumMaxRegistrosRetorno(1);
        $objMdPetVincUsuExtPj = $objMdPetVincTpProcessoRN->consultar($objMdPetVincTpProcessoDTO);

        //Configurado: "Integra��o" com funcionalidade "Consultar Dados CNPJ Receita Federal"
        $objMdPetIntegFuncionalidRN = new MdPetIntegFuncionalidRN();
        $arrIdMdPetIntegFuncionalidUtilizado = $objMdPetIntegFuncionalidRN->verificarMdPetIntegFuncionalidUtilizado(null, null, 'Consultar Dados CNPJ Receita Federal');

        if (count($objMdPetVincUsuExtPj) > 0 && !is_null($arrIdMdPetIntegFuncionalidUtilizado)) {
            $arrMenusNomes["Pessoas Jur�dicas"] = '';
        }

        $arrLink = array();
        $numRegistrosMenu = count($arrMenusNomes);

        $objMdPetTipoProcessoRN = new MdPetTipoProcessoRN();
        $objMdPetTipoProcessoDTO = new MdPetTipoProcessoDTO();
        $objMdPetTipoProcessoDTO->setStrSinAtivo('S');
        $objMdPetTipoProcessoDTO->retTodos();
        
        $arrObjMdPetTipoProcessoDTO = $objMdPetTipoProcessoRN->listar($objMdPetTipoProcessoDTO);
        
        $objMdPetTipoProcessoDTO = count($arrObjMdPetTipoProcessoDTO) > 0 ? current($arrObjMdPetTipoProcessoDTO) : null;
        
        $objMdPetCriterioRN = new MdPetCriterioRN();
        $objMdPetCriterioDTO = new MdPetCriterioDTO();
        $objMdPetCriterioDTO->setStrSinCriterioPadrao('S');
        $objMdPetCriterioDTO->setStrSinAtivo('S');
        $objMdPetCriterioDTO->retTodos();
        $arrObjMdPetCriterioDTO = $objMdPetCriterioRN->listar($objMdPetCriterioDTO);
        $objMdPetCriterioDTO = count($arrObjMdPetCriterioDTO) > 0 ? current($arrObjMdPetCriterioDTO) : null;

        if (is_array($arrMenusNomes) && $numRegistrosMenu > 0) {

            foreach ($arrMenusNomes as $key => $value) {

                $urlLink = $arrMenusNomes[$key];
                $nomeMenu = $key;

                switch ($nomeMenu) {
                    case 'Peticionamento' :
                        $urlLinkIntercorrente = $urlBase . '/controlador_externo.php?acao=md_pet_intercorrente_usu_ext_cadastrar';
                        if ($objMdPetTipoProcessoDTO || !is_null($objMdPetCriterioDTO)){
                            $arrLink[] = '-^#^^' . $nomeMenu . '^';
                        }
                        if($objMdPetTipoProcessoDTO) {
                            $arrLink[] = '--^' . $urlLink . '^^' . 'Processo Novo' . '^';
                        }

                        if (!is_null($objMdPetCriterioDTO)) {
                            $arrLink[] = '--^' . $urlLinkIntercorrente . '^^' . 'Intercorrente' . '^';
                        }
                        break;
                    case 'Pessoas Jur�dicas' :
                        $arrLink[] = '-^#^^' . $nomeMenu . '^';
                        $arrLink[] = '--^' . $urlBase . '/controlador_externo.php?acao=md_pet_vinculacao_listar' . '^^' . 'Vincula��o a Pessoas Jur�dicas' . '^';
                        $arrLink[] = '--^' . $urlBase . '/controlador_externo.php?acao=md_pet_vinc_usu_ext_pe_listar' . '^^' . 'Procura��es Eletr�nicas' . '^';
                        break;
                    default :
                        $arrLink[] = '-^' . $urlLink . '^^' . $nomeMenu . '^';
                        break;
                }
            }
        }

        return $arrLink;
    }

    public function montarBotaoAcessoExternoAutorizado(ProcedimentoAPI $objProcedimentoAPI) {

        $array = array();

        $id_usuario_externo = SessaoSEIExterna::getInstance()->getNumIdUsuarioExterno();

        //o botao so aparece se houver usuario externo logado (usuario de acesso externo avulso nao visualiza o botao)
        if ($id_usuario_externo != null && $id_usuario_externo != "") {

            $strParam = 'acao=md_pet_intercorrente_usu_ext_cadastrar&id_orgao_acesso_externo=0';
            $hash = md5($strParam . '#' . SessaoSEIExterna::getInstance()->getNumIdUsuarioExterno() . '@' . SessaoSEIExterna::getInstance()->getAtributo('RAND_USUARIO_EXTERNO'));

            $urlBase = ConfiguracaoSEI::getInstance()->getValor('SEI', 'URL');

            $link = $urlBase . '/controlador_externo.php?acao=md_pet_intercorrente_usu_ext_cadastrar&id_orgao_acesso_externo=0&infra_hash=' . $hash;
            $id_procedimento = $_GET['id_procedimento'];

            $array[] = "<script> function criarForm(){ 
            var f = document.createElement(\"form\");
        f.setAttribute('method',\"post\");
        f.setAttribute('action',\"$link\");
        
        var i = document.createElement(\"input\"); 
        i.setAttribute('type',\"hidden\");
        i.setAttribute('name',\"id_procedimento\");
        i.setAttribute('value',\"$id_procedimento\");
    
        f.appendChild(i);
        document.getElementsByTagName('body')[0].appendChild(f);
        f.submit();
    }</script>";
            $array[] = '<button type="button" accesskey="i" name="btnPetIntercorrente" value="Peticionamento Intercorrente" onclick="criarForm();" class="infraButton">Peticionamento <span class="infraTeclaAtalho">I</span>ntercorrente</button>';
        }

        return $array;
    }

    public function montarTipoTarjaAssinaturaCustomizada() {
        $objArrTipoDTO = array();

        $objTipoDTO = new TipoDTO();
        $objTipoDTO->setStrStaTipo(MdPetAssinaturaRN::$TT_ASSINATURA_SENHA_PETICIONAMENTO);
        $objTipoDTO->setStrDescricao('Assinatura Eletr�nica por Usu�rios Externos');
        $objArrTipoDTO[] = $objTipoDTO;

        return $objArrTipoDTO;
    }

    /**
     * Valida se o Documento que est� sendo cancelado foi peticionado
     *
     * @access public
     * @author Jaqueline Mendes <jaqueline.mendes@castgroup.com.br>
     * @param  DocumentoAPI $objDocumentoAPI
     * @return mixed
     */
    public function cancelarDocumento(DocumentoAPI $objDocumentoAPI) {
        $numRecibo = '';
        $idDoc = $_GET['id_documento'];


        $objReciboDocAnexPetDTO = new MdPetRelReciboDocumentoAnexoDTO();
        $objReciboDocAnexPetDTO->setNumIdDocumento($idDoc);

        $objReciboDocAnexPetRN = new MdPetRelReciboDocumentoAnexoRN();
        $cont = $objReciboDocAnexPetRN->contar($objReciboDocAnexPetDTO);

        if ($cont > 0) {
            $objReciboDocAnexPetDTO->retNumIdReciboPeticionamento();
            $objReciboDocAnexPetDTO = $objReciboDocAnexPetRN->consultar($objReciboDocAnexPetDTO);

            $objReciboPetDTO = new MdPetReciboDTO();
            $objReciboPetDTO->setNumIdReciboPeticionamento($objReciboDocAnexPetDTO->getNumIdReciboPeticionamento());
            $objReciboPetDTO->retStrNumeroProcessoFormatadoDoc();

            $objReciboPetRN = new MdPetReciboRN();
            $objReciboPetDTO = $objReciboPetRN->consultar($objReciboPetDTO);

            if ($objReciboPetDTO) {
                $numRecibo = $objReciboPetDTO->getStrNumeroProcessoFormatadoDoc();
            }

            $msg = 'N�o � permitido cancelar este documento, pois ele � oriundo de Peticionamento Eletr�nico, conforme Recibo Eletr�nico de Protocolo SEI n� ' . $numRecibo . '.';
            $objInfraException = new InfraException();
            $objInfraException->adicionarValidacao($msg);
            $objInfraException->lancarValidacoes();
            return null;
        }

        // Rotina para verificar se o documento � objeto de intima��o e impedir o cancelamento, caso o seja
        $dto = new MdPetIntProtocoloDTO();
        $dto->retTodos();
        $dto->setDblIdDocumento($objDocumentoAPI->getIdDocumento());

        $rn = new MdPetIntProtocoloRN();
        $total = $rn->contar($dto);

        if ($total > 0) {

            $msg = 'N�o � permitido cancelar este documento, pois ele faz parte de Intima��o Eletr�nica.';
            $objInfraException = new InfraException();
            $objInfraException->adicionarValidacao($msg);
            $objInfraException->lancarValidacoes();
            return null;
        }

        $mdPetRegrasGeraisRN = new MdPetRegrasGeraisRN();
        $msg = $mdPetRegrasGeraisRN->verificarDocumentoIndisponibilidade(array($objDocumentoAPI, 'cancelar'));

        // condi��o para saber  o documento est� sendo utilizado em um indisponibilidade
        if ($msg != '') {
            $objInfraException = new InfraException();
            $objInfraException->lancarValidacao($msg);
            return null;
        }

        return parent::cancelarDocumento($objDocumentoAPI);
    }

    //nao permite mover documento que compoe intimacao (doc principal, doc anexo E doc de resposta a intima��o incluindo certidoes e recibos)
    public function moverDocumento(DocumentoAPI $objDocumentoAPI, ProcedimentoAPI $objProcedimentoAPIOrigem, ProcedimentoAPI $objProcedimentoAPIDestino) {

        //procura entre docs principais
        $dto = new MdPetIntProtocoloDTO();
        $dto->retTodos();
        $dto->setDblIdProtocolo($objDocumentoAPI->getIdDocumento());

        $rn = new MdPetIntProtocoloRN();
        $total = $rn->contar($dto);

        //procura entre docs anexos
        $dtoDocDisponivel = new MdPetIntProtDisponivelDTO();
        $dtoDocDisponivel->retTodos();
        $dtoDocDisponivel->setDblIdProtocolo($objDocumentoAPI->getIdDocumento());

        $rnDocDisponivel = new MdPetIntProtDisponivelRN();
        $totalDocDisponivel = $rnDocDisponivel->contar($dtoDocDisponivel);

        if ($total > 0 || $totalDocDisponivel > 0) {

            $msg = 'N�o � permitido mover este documento, pois ele faz parte de Intima��o Eletr�nica.';
            $objInfraException = new InfraException();
            $objInfraException->adicionarValidacao($msg);
            $objInfraException->lancarValidacoes();
            return null;
        } else {

            return parent::moverDocumento($objDocumentoAPI, $objProcedimentoAPIOrigem, $objProcedimentoAPIDestino);
        }
    }

    //Intimacao Eletronica - Monta icone na pagina inicial do Usuario Externo
    public function montarAcaoControleAcessoExterno($arrObjAcessoExternoAPI) {

        $arrIcones = array();
        $objUsuarioDTO = new UsuarioDTO();
        $objUsuarioDTO->retNumIdContato();
        $objUsuarioDTO->setNumIdUsuario(SessaoSEIExterna::getInstance()->getNumIdUsuarioExterno());
        $objUsuarioRN = new UsuarioRN();
        $objUsuarioDTO = $objUsuarioRN->consultarRN0489($objUsuarioDTO);

        foreach ($arrObjAcessoExternoAPI as $objAcessoExternoAPI) {
            $conteudoHtml = '';
            $idAcessoExt = $objAcessoExternoAPI->getIdAcessoExterno();

            $objMdPetIntRelDestRN = new MdPetIntRelDestinatarioRN();
            $objMdPetIntRelDestDTO = new MdPetIntRelDestinatarioDTO();
            $objMdPetIntRelDestDTO->setNumIdAcessoExterno($idAcessoExt);
            $objMdPetIntRelDestDTO->setNumIdContatoParticipante($objUsuarioDTO->getNumIdContato());
            $objMdPetIntRelDestDTO->retNumIdMdPetIntimacao();
            $objMdPetIntRelDestDTO->retNumIdMdPetIntRelDestinatario();
            $objMdPetIntRelDestDTO->retDblIdDocumento();
            $objMdPetIntRelDestDTO->setStrSinPrincipalDoc('S');
            $objMdPetIntRelDestDTO->retDblIdProcedimento();
            $objMdPetIntRelDestDTO->retDblIdProtocolo();
            $objMdPetIntRelDestDTO->retStrProtocoloFormatadoDocumento();
            $objMdPetIntRelDestDTO->retDthDataCadastro();
            $objMdPetIntRelDestDTO->setDblIdProcedimento($objAcessoExternoAPI->getProcedimento()->getIdProcedimento());
            $objMdPetIntRelDestDTO->setProcedimentoDocTIPOFK(InfraDTO::$TIPO_FK_OBRIGATORIA);

            $arrObjMdPetIntRelDestDTO = $objMdPetIntRelDestRN->listar($objMdPetIntRelDestDTO);

            SessaoSEIExterna::getInstance()->configurarAcessoExterno($objAcessoExternoAPI->getIdAcessoExterno());

            foreach ($arrObjMdPetIntRelDestDTO as $objMdPetIntRelDestDTO) {
                $strLink = '';
                if (is_array(explode(' ', $objMdPetIntRelDestDTO->getDthDataCadastro()))) {
                    $dtIntimacao = explode(' ', $objMdPetIntRelDestDTO->getDthDataCadastro());
                    $dtIntimacao = $dtIntimacao[0];
                } else {
                    $dtIntimacao = $objMdPetIntRelDestDTO->getDthDataCadastro();
                }

                $numeroDocumento = $objMdPetIntRelDestDTO->getStrProtocoloFormatadoDocumento();

                //Obter informacoes do Documento Principal da Intimacao
                $objMdPetIntDocumentoRN = new MdPetIntProtocoloRN();
                $objMdPetIntDocumentoDTO = new MdPetIntProtocoloDTO();
                $objMdPetIntDocumentoDTO->retTodos();
                $objMdPetIntDocumentoDTO->retDblIdProtocolo();
                $objMdPetIntDocumentoDTO->retDblIdDocumento();
                $objMdPetIntDocumentoDTO->retStrNumeroDocumento();
                $objMdPetIntDocumentoDTO->retNumIdSerie();
                $objMdPetIntDocumentoDTO->retStrNomeSerie();
                $objMdPetIntDocumentoDTO->retStrProtocoloFormatadoDocumento();

                $objMdPetIntDocumentoDTO->setNumIdMdPetIntimacao($objMdPetIntRelDestDTO->getNumIdMdPetIntimacao());
                $objMdPetIntDocumentoDTO->setStrSinPrincipal('S');
                $objMdPetIntDocumentoDTO->setNumMaxRegistrosRetorno(1);
                $objMdPetIntDocumentoDTO = $objMdPetIntDocumentoRN->consultar($objMdPetIntDocumentoDTO);

                //Icone Sinalizador do Processo com Intimacao Eletronica
                $strMsgTooltipSinalizadorProcesso = "Intima��o Eletr�nica: expedida em {$dtIntimacao}\n";
                $strMsgTooltipSinalizadorProcesso .= "Documento Principal: ";
                $strMsgTooltipSinalizadorProcesso .= $objMdPetIntDocumentoDTO->getStrNomeSerie() . ' ';
                if ($objMdPetIntDocumentoDTO->getStrNumeroDocumento()) {
                    $strMsgTooltipSinalizadorProcesso .= $objMdPetIntDocumentoDTO->getStrNumeroDocumento() . ' ';
                }
                $strMsgTooltipSinalizadorProcesso .= "(SEI n� {$numeroDocumento})";

                $strMsgTooltipTextoSinalizadorProcesso = 'Clique para acessar o processo e consultar a Intima��o.';

                $strLinkProcedimento = SessaoSEIExterna::getInstance()->assinarLink('processo_acesso_externo_consulta.php?id_acesso_externo=' . $objAcessoExternoAPI->getIdAcessoExterno() . '&id_procedimento=' . $objAcessoExternoAPI->getProcedimento()->getIdProcedimento());

                $strLink = '<a href="javascript:void(0);" onclick="window.open(\'' . $strLinkProcedimento . '\');"><img src="modulos/peticionamento/imagens/intimacao_controle_de_acessos_externos_destaque.png" class="infraImg" ';
                $strLink .= str_replace('\n', '<br/>', PaginaSEI::montarTitleTooltip($strMsgTooltipTextoSinalizadorProcesso, $strMsgTooltipSinalizadorProcesso));
                $strLink .= '/></a>&nbsp;';

                $conteudoHtml .= ' ' . $strLink;
            }

            $arrIcones[$objAcessoExternoAPI->getIdAcessoExterno()][] = $conteudoHtml;
        }

        return $arrIcones;
    }

    public function montarBotaoProcesso(ProcedimentoAPI $objProcedimentoAPI) {

        $arrBotoes = array();

        if (!(SessaoSEI::getInstance()->verificarPermissao('md_pet_int_documento_listar'))) {
            return $arrBotoes;
        }

        $objMdPetIntDocumentoDTO = new MdPetIntProtocoloDTO();
        $objMdPetIntDocumentoDTO->setDblIdProcedimento($objProcedimentoAPI->getIdProcedimento());
        $objMdPetIntDocumentoDTO->retTodos(true);
        $objMdPetIntDocumentoRN = new MdPetIntProtocoloRN();
        $intQntdIntimacao = $objMdPetIntDocumentoRN->contar($objMdPetIntDocumentoDTO);

        $intUnidadeGeradora = $objProcedimentoAPI->getIdUnidadeGeradora();
        $intIdUnidadeAtual = SessaoSEI::getInstance()->getNumIdUnidadeAtual();

        //encontrou o tipo de documento na parametrizacao do sistema e o perfil possui o recurso
        if ($intQntdIntimacao > 0 && SessaoSEI::getInstance()->verificarPermissao('md_pet_intimacao_eletronica_listar')) {
            $arrBotoes[] = '<a href="' . SessaoSEI::getInstance()->assinarLink('controlador.php?acao=md_pet_intimacao_eletronica_listar&id_procedimento=' . $objProcedimentoAPI->getIdProcedimento()) . '" class="botaoSEI" tabindex="' . PaginaSEI::getInstance()->getProxTabBarraComandosSuperior() . '"><img src="modulos/peticionamento/imagens/intimacao_eletronica_ver.svg" class="infraCorBarraSistema" alt="Ver Intima��es Eletr�nicas" title="Ver Intima��es Eletr�nicas"/></a>';
        }

        if (!SessaoSEI::getInstance()->verificarPermissao('md_pet_adm_vinc_consultar') && $objProcedimentoAPI->getCodigoAcesso() > 0)
            return array();

        // Vincula��o � Pessoa Jur�dica
        $objMdPetVinculoRN = new MdPetVinculoRN();
        $arrObjMdPetVinculoDTO = $objMdPetVinculoRN->consultarProcedimentoVinculo(array($objProcedimentoAPI->getIdProcedimento(), 'retornoDTO' => true));

        if ($arrObjMdPetVinculoDTO && count($arrObjMdPetVinculoDTO) > 0) {
            $arrBotoes [] = '<a href="' . SessaoSEI::getInstance()->assinarLink('controlador.php?acao=md_pet_adm_vinc_consultar&acao_origem=procedimento_visualizar&acao_retorno=arvore_visualizar&id_procedimento=' . $objProcedimentoAPI->getIdProcedimento() . '&arvore=1') . '" tabindex="' . PaginaSEI::getInstance()->getProxTabBarraComandosSuperior() . '" class="botaoSEI"><img class="infraCorBarraSistema" src="modulos/peticionamento/imagens/VinculoPJ.png" alt="Visualizar V�nculos e Procura��es Eletr�nicas" title="Visualizar V�nculos e Procura��es Eletr�nicas" /></a>';
        }

        return $arrBotoes;
    }

    //encapsulamento da logica de inclusao de botoes na coluna "A��es" da tela de processo do usuario externo
    //a mesma logica aqui � chamada pelo ponto de extensao dos documentos autorizados (ponto de ext antigo) e 
    //pelo ponto de extensao dos documentos negados (ponto de ext novo, adicionado no SEI 3.0.7)
    private function montarBotaoAcessoExternoPeticionamento($arrObjProtocoloAPI2, $isProcedimento = false) {
        $objMdPetAcessoExtDocRN = new MdPetIntAcessoExternoDocumentoRN();

        $idAcessoExterno = $_GET['id_acesso_externo'];
        $idOrgAcessoExterno = $_GET['id_orgao_acesso_externo'];
        $idProcedimento = $_GET['id_procedimento'];
        $idProcAnex = $_GET['id_procedimento_anexado'];
        $arrIcones = array();

        $id_usuario_externo = SessaoSEIExterna::getInstance()->getNumIdUsuarioExterno();

        //os botoes so aparecem se houver usuario externo logado (usuario de acesso externo avulso nao visualiza esses botoes)
        if ($id_usuario_externo != null && $id_usuario_externo != "") {
            //lista os documentos do SEI
            $arrIdsProtocolo = $objMdPetAcessoExtDocRN->getArrDocumentosAPI(array($idAcessoExterno, $idProcAnex, $isProcedimento));
            if ($arrIdsProtocolo) {
                foreach ($arrIdsProtocolo as $idProtocolo) {
                    $conteudoHtml = '';
                    $conteudoHtml .= $this->montarAcaoBotaoCumprir($idProtocolo, $idAcessoExterno, $idProcedimento, $isProcedimento);
                    $conteudoHtml .= $this->montarAcaoBotaoCertidao($idProtocolo, $idAcessoExterno);
                    $conteudoHtml .= $this->montarAcaoBotaoResposta($idProtocolo, $idAcessoExterno, $idProcedimento);
                    $conteudoHtml .= $this->montarAcaoBotaoRecibo($idProtocolo, $idAcessoExterno, $idProcedimento);

                    $arrIcones[$idProtocolo][] = $conteudoHtml . '<br/>';

                    if ($isProcedimento) {
                        $this->arrProcessosLiberados[] = $idProtocolo;
                    } else {
                        $this->arrDocumentosLiberados[] = $idProtocolo;
                    }
                }
            }
        }
        return $arrIcones;
    }

    public function montarAcaoBotaoRecibo($idProtocolo, $idAcessoExterno, $idProcedimento) {
        $objMdPetIntRN = new MdPetIntimacaoRN();
        $objMdPetIntDocumentoDTO = new MdPetIntProtocoloDTO();
        $objMdPetIntRelDestRN = new MdPetIntRelDestinatarioRN();
        $objMdPetIntReciboRN = new MdPetIntReciboRN();
        $objMdPetIntAceiteRN = new MdPetIntAceiteRN();
        $objMdPetAcessoExtDocRN = new MdPetIntAcessoExternoDocumentoRN();
        $objMdPetIntProtocoloRN = new MdPetIntProtocoloRN();

        $objMdPetIntDocumentoDTO->setDblIdProtocolo($idProtocolo);
        $objMdPetIntDocumentoDTO->retDblIdDocumento();
        $objMdPetIntDocumentoDTO->retStrSinPrincipal();
        $objMdPetIntDocumentoDTO->retNumIdMdPetIntimacao();
        $listaDocs = $objMdPetIntProtocoloRN->listar($objMdPetIntDocumentoDTO);
        foreach ($listaDocs as $objRelIntDoc) {
            
            $existeInt = false;
            $idIntimacao = $objRelIntDoc ? $objRelIntDoc->getNumIdMdPetIntimacao() : null;
            $objContato = $objMdPetIntAceiteRN->retornaObjContatoIdUsuario(array(SessaoSEIExterna::getInstance()->getNumIdUsuarioExterno()));
            $arrDados = null;
            $arrDados = $objMdPetIntAceiteRN->existeAceiteIntimacaoAcao(array($idIntimacao, true));
            if (count($arrDados) > 0) {
                foreach ($arrDados as $aceite) {
                    $existeInt = $aceite['INT'];

                    $objMdPetIntRelDestDTO = new MdPetIntRelDestinatarioDTO();
                    $objMdPetIntRelDestDTO->setNumIdMdPetIntimacao($idIntimacao);
                    $objMdPetIntRelDestDTO->retDthDataCadastro();
                    $objMdPetIntRelDestDTO->retNumIdMdPetIntRelDestinatario();
                    $objMdPetIntRelDestDTO->setNumIdContatoParticipante($objContato->getNumIdContato());
                    $objMdPetIntRelDestDTO->retStrStaSituacaoIntimacao();
                    $objMdPetIntRelDestDTO->retStrSinPessoaJuridica();
                    $objMdPetIntRelDestDTO->retNumIdContato();
                    $objMdPetIntRelDestDTO->retDblCnpjContato();
                    $objMdPetIntRelDestDTO->retStrNomeContato();

                    $idAcessoExternoValido = $objMdPetAcessoExtDocRN->verificarAcessoExternoValido(array($idIntimacao, $objContato->getNumIdContato(), $idAcessoExterno));
                    if (!is_null($idAcessoExternoValido)) {
                        $objMdPetIntRelDestDTO->setNumIdAcessoExterno($idAcessoExterno);
                    }

                    $objMdPetIntRelDestDTO = $objMdPetIntRelDestRN->listar($objMdPetIntRelDestDTO);
                    if (!empty($objMdPetIntRelDestDTO)) {
                        $arrDados = array($objRelIntDoc->getNumIdMdPetIntimacao());
                        $retorno = $objMdPetIntRN->retornaDadosDocPrincipalIntimacao($arrDados);

                        if (!is_null($retorno)) {
                            $docPrinc = $retorno[0];
                            $docTipo = $retorno[1];
                            $docNum = $retorno[4];
                        }

                        if ($existeInt) {
                            foreach ($objMdPetIntRelDestDTO as $obj) {
                                //Bot�o
                                $idMdPetDest = $obj->getNumIdMdPetIntRelDestinatario();
                                $sitIntimacao = $obj->getStrStaSituacaoIntimacao();

                                $objDestinatarioDTO = new MdPetIntRelDestinatarioDTO();
                                $objDestinatarioDTO->retTodos();
                                $objDestinatarioDTO->setNumIdMdPetIntRelDestinatario($idMdPetDest);
                                $objDestinatarioDTO->setNumIdMdPetIntimacao($idIntimacao);
                                $objDestinatarioRN = new MdPetIntRelDestinatarioRN();
                                $arrDestinatarioDTO = $objDestinatarioRN->listar($objDestinatarioDTO);
                                $arrContatos = InfraArray::converterArrInfraDTO($arrDestinatarioDTO, 'IdContato');

                                $objUsuarioDTO = new UsuarioDTO();
                                $objUsuarioDTO->retNumIdContato();
                                $objUsuarioDTO->setNumIdUsuario(SessaoSEIExterna::getInstance()->getNumIdUsuarioExterno());
                                $objUsuarioRN = new UsuarioRN();
                                $arrIds = $objUsuarioRN->listarRN0490($objUsuarioDTO);

                                $dtoMdPetVincReptDTO = new MdPetVincRepresentantDTO();
                                $dtoMdPetVincReptDTO->setNumIdContatoVinc($arrContatos, InfraDTO::$OPER_IN);
                                $dtoMdPetVincReptDTO->retNumIdContatoVinc();
                                $dtoMdPetVincReptDTO->retStrNomeProcurador();
                                $dtoMdPetVincReptDTO->retStrRazaoSocialNomeVinc();
                                $dtoMdPetVincReptDTO->retStrTipoRepresentante();
                                $dtoMdPetVincReptDTO->retStrCNPJ();
                                $dtoMdPetVincReptDTO->retStrEmail();
                                $dtoMdPetVincReptDTO->setNumIdContatoProcurador($arrIds[0]->getNumIdContato());
                                $dtoMdPetVincReptDTO->retNumIdContatoProcurador();
                                $dtoMdPetVincReptDTO->setStrSinAtivo('S');
                                $dtoMdPetVincReptDTO->retStrStaEstado();
                                $rnMdPetVincRepRN = new MdPetVincRepresentantRN();
                                $arrMdPetVincRepRN = $rnMdPetVincRepRN->listar($dtoMdPetVincReptDTO);

                                if ($sitIntimacao == MdPetIntimacaoRN::$INTIMACAO_RESPONDIDA) {
                                    $objMdPetReciboDTO = new MdPetReciboDTO();
                                    $objMdPetReciboDTO->retTodos();

                                    $objInfraParametro = new InfraParametro(BancoSEI::getInstance());
                                    $strVersaoModuloPeticionamento = $objInfraParametro->getValor('VERSAO_MODULO_PETICIONAMENTO', false);

                                    if ($obj->getStrSinPessoaJuridica() == MdPetIntRelDestinatarioRN::$PESSOA_JURIDICA) {
                                        $mdPetVinculoRN = new MdPetVinculoRN();
                                        $mdPetVinculoDTO = new MdPetVinculoDTO();
                                        $mdPetVinculoDTO->setNumIdContato($obj->getNumIdContato());
                                        $mdPetVinculoDTO->retNumIdContatoRepresentante();
                                        $mdPetVinculoDTO->retNumIdUsuario();
                                        $mdPetVinculoDTO->retStrStaEstado();
                                        $mdPetVinculoDTO->retDthDataEncerramento();
                                        $arrMdPetVinculoDTO = $mdPetVinculoRN->listar($mdPetVinculoDTO);
                                        $arrRepresentantes = InfraArray::converterArrInfraDTO($arrMdPetVinculoDTO, 'IdUsuario');
                                    } else {
                                        $arrRepresentantes = array(SessaoSEIExterna::getInstance()->getNumIdUsuarioExterno());
                                    }

                                    $objMdPetReciboDTO->setNumIdUsuario($arrRepresentantes, InfraDTO::$OPER_IN);
                                    $objMdPetReciboDTO->setStrStaTipoPeticionamento(MdPetReciboRN::$TP_RECIBO_RESPOSTA_INTIMACAO);

                                    $objMdPetReciboRN = new MdPetReciboRN();

                                    //Pr�prio Processo
                                    $objMdPetReciboDTO->setNumIdProtocolo($idProcedimento);
                                    $objMdPetReciboDTO->unSetDblIdProtocoloRelacionado();

                                    $arrObjMdPetReciboDTO = $objMdPetReciboRN->listar($objMdPetReciboDTO);

                                    if (count($arrObjMdPetReciboDTO) == 0) {
                                        //Relacionado
                                        $objMdPetReciboDTO->unSetNumIdProtocolo();
                                        $objMdPetReciboDTO->setDblIdProtocoloRelacionado($idProcedimento);
                                        $arrObjMdPetReciboDTO = $objMdPetReciboRN->listar($objMdPetReciboDTO);
                                    }

                                    $nuProtocolo = null;
                                    foreach ($arrObjMdPetReciboDTO as $objMdPetReciboDTO) {
                                        $usuarioDTO = new UsuarioDTO();
                                        $usuarioRN = new UsuarioRN();
                                        $usuarioDTO->retNumIdUsuario();
                                        $usuarioDTO->retNumIdContato();
                                        $usuarioDTO->setNumIdUsuario(SessaoSEIExterna::getInstance()->getNumIdUsuarioExterno());
                                        $usuarioDTO = $usuarioRN->consultarRN0489($usuarioDTO);

                                        $emailDestinatario = SessaoSEIExterna::getInstance()->getStrSiglaUsuarioExterno();
                                        $acessoExtRN = new AcessoExternoRN();
                                        $acessoExtDTO = new AcessoExternoDTO();
                                        $acessoExtDTO->retTodos();
                                        $acessoExtDTO->setOrd("IdAcessoExterno", InfraDTO::$TIPO_ORDENACAO_DESC);
                                        $acessoExtDTO->retDblIdProtocoloAtividade();
                                        $acessoExtDTO->retNumIdContatoParticipante();

                                        //trazer acesso externo  mais recente, deste processo, para este usuario externo, que estejam dentro da data de validade
                                        $acessoExtDTO->setDblIdProtocoloAtividade($objMdPetReciboDTO->getNumIdProtocolo());

                                        $acessoExtDTO->setNumIdContatoParticipante($usuarioDTO->getNumIdContato());
                                        $acessoExtDTO->setStrStaTipo(AcessoExternoRN::$TA_USUARIO_EXTERNO);
                                        $acessoExtDTO->setStrSinAtivo('S');
                                        $acessoExtDTO->setDtaValidade(InfraData::getStrDataHoraAtual(), InfraDTO::$OPER_MAIOR_IGUAL);
                                        $arrAcessosExternos = $acessoExtRN->listar($acessoExtDTO);

                                        $id_acesso_ext_link = $arrAcessosExternos[0]->getNumIdAcessoExterno();
                                        $docLink = "documento_consulta_externa.php?id_acesso_externo=" . $id_acesso_ext_link;
                                        $docLink .= "&id_documento=" . $objMdPetReciboDTO->getDblIdDocumento();
                                        $docLink .= "&id_orgao_acesso_externo=0";
                                        SessaoSEIExterna::getInstance()->configurarAcessoExterno($id_acesso_ext_link);
                                        
                                        //se nao configurar acesso externo  ANTES, a assinatura do link falha
                                        $linkAssinado = PaginaSEIExterna::getInstance()->formatarXHTML(SessaoSEIExterna::getInstance()->assinarLink($docLink));
                                        if ($obj->getStrSinPessoaJuridica() == MdPetIntRelDestinatarioRN::$PESSOA_JURIDICA) {
                                            $arrIdReciboPeticionamento = array();
                                            foreach ($arrMdPetVinculoDTO as $objMdPetVinculoDTO) {
                                                $mostraIcone = true;
                                                if (!is_null($objMdPetVinculoDTO->getDthDataEncerramento())) {
                                                    $dtEncerramento = DateTime::createFromFormat('d/m/Y H:i:s', $objMdPetVinculoDTO->getDthDataEncerramento());
                                                    $dtRecibo = DateTime::createFromFormat('d/m/Y H:i:s', $objMdPetReciboDTO->getDthDataHoraRecebimentoFinal());
                                                    $interval = $dtRecibo->diff($dtEncerramento);
                                                    if ($interval->format('%R') == '-') {
                                                        $mostraIcone = false;
                                                    }
                                                }
                                                
                                                if ($objMdPetVinculoDTO->getDthDataEncerramento() == NULL && $mostraIcone == true && !in_array($objMdPetReciboDTO->getNumIdReciboPeticionamento(), $arrIdReciboPeticionamento)) {
                                                    $conteudoHtml .= $objMdPetIntReciboRN->addIconeRecibo(array($objMdPetReciboDTO->getDthDataHoraRecebimentoFinal(), $docPrinc, $docTipo, $docNum, $linkAssinado, $objMdPetReciboDTO->getDblIdDocumento(), $idMdPetDest, $id_acesso_ext_link));
                                                    array_push($arrIdReciboPeticionamento, $objMdPetReciboDTO->getNumIdReciboPeticionamento());
                                                }
                                            }
                                        } else {
                                            $conteudoHtml .= $objMdPetIntReciboRN->addIconeRecibo(array($objMdPetReciboDTO->getDthDataHoraRecebimentoFinal(), $docPrinc, $docTipo, $docNum, $linkAssinado, $objMdPetReciboDTO->getDblIdDocumento(), $idMdPetDest));
                                        }

                                        $nuProtocolo = $objMdPetReciboDTO->getNumIdProtocolo();
                                    }

                                    //necessario fazer  isso para nao quebrar a navega�ao (se nao fizer isso e tem clicar em qualquer outro link do usuario externo, quebra a sessao e usuario � enviado de volta para a tela de login externo (trata-se de funcionamento incorporado ao Core do SEI)
                                    SessaoSEIExterna::getInstance()->configurarAcessoExterno($idAcessoExterno);
                                }
                            }
                        }
                    }
                }
            }
        }

        return $conteudoHtml;
    }

    public function montarAcaoBotaoCumprir($idProtocolo, $idAcessoExterno, $idProcedimento, $isProcedimento) {
        $htmlImgIntCumpridaPrinc = '<img src="modulos/peticionamento/imagens/intimacao_cumprida_doc_principal.png">';
        $htmlImgIntNaoCumpPrinc = '<img src="modulos/peticionamento/imagens/intimacao_nao_cumprida_doc_principal.png">';
        $htmlImgIntCumpridaAnex = '<img src="modulos/peticionamento/imagens/intimacao_cumprida_doc_anexo.png">';
        $htmlImgIntNaoCumprAnex = '<img src="modulos/peticionamento/imagens/intimacao_nao_cumprida_doc_anexo.png">';
        $htmlImgIntAguardandoCumprGeralPrinc = '<img src="modulos/peticionamento/imagens/intimacao_aguardando_cumprimento_geral.png">';
        $htmlImgIntAguardandoCumprGeralAnex = '<img src="modulos/peticionamento/imagens/intimacao_aguardando_cumprimento_geral_anexo.png">';
        $htmlImgIntNaoCumprVinculoInativoPrinc = '<img src="modulos/peticionamento/imagens/intimacao_nao_cumprida_vinculo_inativo.png">';
        $htmlImgIntNaoCumprVinculoInativoAnex = '<img src="modulos/peticionamento/imagens/intimacao_nao_cumprida_vinculo_inativo_anexo.png">';

        $objMdPetIntRN = new MdPetIntimacaoRN();
        $objMdPetIntRelDestRN = new MdPetIntRelDestinatarioRN();
        $objMdPetCertidaoRN = new MdPetIntCertidaoRN();
        $objMdPetRespostaRN = new MdPetIntRespostaRN();
        $objMdPetIntReciboRN = new MdPetIntReciboRN();
        $objMdPetIntAceiteRN = new MdPetIntAceiteRN();
        $objMdPetIntProtocoloRN = new MdPetIntProtocoloRN();
        $objMdPetAcessoExtDocRN = new MdPetIntAcessoExternoDocumentoRN();

        $vinculoRepresentanteInativo = false;
        $objMdPetIntDocumentoDTO = new MdPetIntProtocoloDTO();
        $objMdPetIntDocumentoDTO->setDblIdProtocolo($idProtocolo);
        $objMdPetIntDocumentoDTO->retDblIdDocumento();
        $objMdPetIntDocumentoDTO->retStrSinPrincipal();
        $objMdPetIntDocumentoDTO->retNumIdMdPetIntimacao();
        $listaDocs = $objMdPetIntProtocoloRN->listar($objMdPetIntDocumentoDTO);

        if (count($listaDocs) > 0) {
            $idIntimacaoBotao = InfraArray::converterArrInfraDTO($listaDocs, 'IdMdPetIntimacao');

            foreach ($listaDocs as $objRelIntDoc) {
                $img = '';
                $js = '';
                $strLink = '';
                $existeInt = false;
                $isMain = false;
                $aguardandoCumprirGeral = false;
                $idIntimacao = $objRelIntDoc ? $objRelIntDoc->getNumIdMdPetIntimacao() : null;

                $objContato = $objMdPetIntAceiteRN->retornaObjContatoIdUsuario(array(SessaoSEIExterna::getInstance()->getNumIdUsuarioExterno()));

                $arrDados = null;
                $idAceite = null;
                $dataAceite = null;
                $idDestinatarioAceite = null;
                if ($objRelIntDoc) {
                    $arrDados = $objMdPetIntAceiteRN->existeAceiteIntimacaoAcao(array($idIntimacaoBotao, true));
                    if ($arrDados) {
                        foreach ($arrDados as $aceite) {
                            $existeInt = $aceite['INT'];
                            $idAceite[] = $aceite['ID_ACEITE'];
                            $idDestinatarioAceite[] = $aceite['ID_DESTINATARIO'];
                            if (is_array(explode(' ', $aceite['DATA_ACEITE']))) {
                                $dataAceite = explode(' ', $aceite['DATA_ACEITE']);
                                $dataAceite = $dataAceite[0];
                            } else {
                                $dataAceite = $aceite['DATA_ACEITE'];
                            }
                        }
                    }
                }
                
                $objMdPetIntRelDestDTO = new MdPetIntRelDestinatarioDTO();
                $objMdPetIntRelDestDTO->setNumIdMdPetIntimacao($idIntimacaoBotao, InfraDTO::$OPER_IN);
                $objMdPetIntRelDestDTO->retDthDataCadastro();
                $objMdPetIntRelDestDTO->retNumIdMdPetIntRelDestinatario();
                $objMdPetIntRelDestDTO->setNumIdContatoParticipante($objContato->getNumIdContato());
                $objMdPetIntRelDestDTO->retStrStaSituacaoIntimacao();
                $objMdPetIntRelDestDTO->retStrSinPessoaJuridica();
                $objMdPetIntRelDestDTO->retNumIdContato();
                $objMdPetIntRelDestDTO->retDblCnpjContato();
                $objMdPetIntRelDestDTO->retStrNomeContato();

                $idAcessoExternoValido = $objMdPetAcessoExtDocRN->verificarAcessoExternoValido(array($idIntimacao, $objContato->getNumIdContato(), $idAcessoExterno));
                if (!is_null($idAcessoExternoValido)) {
                    $objMdPetIntRelDestDTO->setNumIdAcessoExterno($idAcessoExterno);
                }
                $objMdPetIntRelDestDTO = $objMdPetIntRelDestRN->listar($objMdPetIntRelDestDTO);

                $qntAceite = count($arrDados);
                $qntDestinatario = count($objMdPetIntRelDestDTO);
                //Se a quantidade de aceites for diferente da quantidade de intima��o quer dizer que ainda tem intima��o para ser cumprida
                if($qntAceite > 0 && $qntAceite != $qntDestinatario){
                    $existeInt = false;
                    $aguardandoCumprirGeral = true;
                }
                
                if (!empty($objMdPetIntRelDestDTO)) {
                    if ($existeInt) {
                        $isValido = $objMdPetCertidaoRN->verificaDocumentoEAnexoIntimacaoNaoCumprida(array($idProtocolo, $idAcessoExterno));
                        $strLink = $objMdPetCertidaoRN->retornaLinkAcessoDocumento($idProtocolo, $idAcessoExterno, $isProcedimento);

                        $initMsg = $isProcedimento ? 'Processo' : 'Documento';
                        $alertMsg = $initMsg . ' bloqueado, pois est� vinculado a uma Intima��o ainda n�o Cumprida.';
                        $js = $isValido ? 'window.open(\'' . $strLink . '\');' : 'alert(\'' . $alertMsg . '\')';

                        if ($objRelIntDoc->getStrSinPrincipal() == 'S') {
                            $isMain = true;
                            $img = $htmlImgIntCumpridaPrinc;
                        } else {
                            $img = $htmlImgIntCumpridaAnex;
                        }                        
                        
                    } else {

                        $urlBase = ConfiguracaoSEI::getInstance()->getValor('SEI', 'URL');
                        $linkIdIntimacao = '';
                        foreach ($idIntimacaoBotao as $id) {
                            $linkIdIntimacao .= '&id_intimacao[]=' . $id;
                        }
                        $strLink = SessaoSEIExterna::getInstance()->assinarLink($urlBase . '/controlador_externo.php?acao=md_pet_intimacao_usu_ext_confirmar_aceite&id_procedimento=' . $idProcedimento . '&id_acesso_externo=' . $idAcessoExterno . '&id_documento=' . $idProtocolo . $linkIdIntimacao);

                        $js = "infraAbrirJanela('" . $strLink . "', 'janelaConsultarIntimacao', 900, 350);";
                        if ($objRelIntDoc->getStrSinPrincipal() == 'S') {
                            
                            if($aguardandoCumprirGeral){
                                $img = $htmlImgIntAguardandoCumprGeralPrinc;
                            }else{
                                $img = $htmlImgIntNaoCumpPrinc;
                            }

                            if (is_array($objMdPetIntRelDestDTO)) {
                                $objMdPetIntRelDestDTO2 = $objMdPetIntRelDestDTO;
                                $dtIntimacao = '';
                                $arrPessoaJuridica = array();

                                $qntDest = count($objMdPetIntRelDestDTO2);
                                $qntDestRevogado = 0;
                                
                                foreach ($objMdPetIntRelDestDTO2 as $obj) {
                                    $existeAceite = false;
                                    if ($obj->getStrSinPessoaJuridica() == 'S') {
                                        $objMdPetVincRepresentantDTO = new MdPetVincRepresentantDTO();
                                        $objMdPetVincRepresentantDTO->setNumIdContato($objContato->getNumIdContato());
                                        $objMdPetVincRepresentantDTO->setStrSinAtivo('S');
                                        $objMdPetVincRepresentantDTO->setStrStaEstado(MdPetVincRepresentantRN::$RP_ATIVO);
                                        $objMdPetVincRepresentantDTO->setNumIdContatoVinc($obj->getNumIdContato());
                                        $objMdPetVincRepresentantDTO->retNumIdContatoVinc();
                                        $objMdPetVincRepresentantDTO->retNumIdContato();
                                        $objMdPetVincRepresentantDTO->retNumIdMdPetVinculoRepresent();

                                        $objMdPetVincRepresentantRN = new MdPetVincRepresentantRN();
                                        $contarobjMdPetVincRepresentantDTO = $objMdPetVincRepresentantRN->contar($objMdPetVincRepresentantDTO);

                                        //Verifica se a situa��o da vincula��o/intimacao � diferente de ativa
                                        if ($contarobjMdPetVincRepresentantDTO == 0) {
                                            $qntDestRevogado++;
                                        }else{
                                            //montando a listagem de pessoas juridicas para o Tool Tip
                                            $arrPessoaJuridica[] = $obj->getStrNomeContato() . ' (' . InfraUtil::formatarCpfCnpj($obj->getDblCnpjContato()) . ')';
                                        }
                                    }
                                    
                                    //data para exibir na modal do cumprir
                                    if (strtotime($dtIntimacao) < strtotime($obj->getDthDataCadastro())) {
                                        if (is_array(explode(' ', $obj->getDthDataCadastro()))) {
                                            $dtIntimacao = explode(' ', $obj->getDthDataCadastro());
                                            $dtIntimacao = $dtIntimacao[0];
                                        } else {
                                            $dtIntimacao = $obj->getDthDataCadastro();
                                        }
                                    }
                                }
                                
                                //se a quantidade de intima��es for igual a quantidade de vinculos diferente de ativo � exibido o �cone de vinculo inativo
                                if($qntDest == $qntDestRevogado){
                                    $vinculoRepresentanteInativo = true;
                                    $img = $htmlImgIntNaoCumprVinculoInativoPrinc;
                                }
                            }
                        } else {
                            if($aguardandoCumprirGeral){
                                $img = $htmlImgIntAguardandoCumprGeralAnex;
                            }else{
                                $img = $htmlImgIntNaoCumprAnex;
                            }
                            
                            if (is_array($objMdPetIntRelDestDTO)) {
                                $objMdPetIntRelDestDTO2 = $objMdPetIntRelDestDTO;

                                $qntDest = count($objMdPetIntRelDestDTO2);
                                $qntDestRevogado = 0;
                                
                                foreach ($objMdPetIntRelDestDTO2 as $obj) {
                                    $existeAceite = false;
                                    if ($obj->getStrSinPessoaJuridica() == 'S') {
                                        $objMdPetVincRepresentantDTO = new MdPetVincRepresentantDTO();
                                        $objMdPetVincRepresentantDTO->setNumIdContato($objContato->getNumIdContato());
                                        $objMdPetVincRepresentantDTO->setStrSinAtivo('S');
                                        $objMdPetVincRepresentantDTO->setStrStaEstado(MdPetVincRepresentantRN::$RP_ATIVO);
                                        $objMdPetVincRepresentantDTO->setNumIdContatoVinc($obj->getNumIdContato());
                                        $objMdPetVincRepresentantDTO->retNumIdContatoVinc();
                                        $objMdPetVincRepresentantDTO->retNumIdContato();
                                        $objMdPetVincRepresentantDTO->retNumIdMdPetVinculoRepresent();

                                        $objMdPetVincRepresentantRN = new MdPetVincRepresentantRN();
                                        $contarobjMdPetVincRepresentantDTO = $objMdPetVincRepresentantRN->contar($objMdPetVincRepresentantDTO);

                                        //Verifica se a situa��o da vincula��o/intimacao � diferente de ativa
                                        if ($contarobjMdPetVincRepresentantDTO == 0) {
                                            $qntDestRevogado++;
                                        }
                                    }                  
                                }
                                
                                //se a quantidade de intima��es for igual a quantidade de vinculos diferente de ativo � exibido o �cone de vinculo inativo
                                if($qntDest == $qntDestRevogado){
                                    $vinculoRepresentanteInativo = true;
                                    $img = $htmlImgIntNaoCumprVinculoInativoAnex;
                                }
                            }
                        }
                    }

                    $arrDados = array($objRelIntDoc->getNumIdMdPetIntimacao());
                    $retorno = $objMdPetIntRN->retornaDadosDocPrincipalIntimacao($arrDados);

                    if (!is_null($retorno)) {
                        $docPrinc = $retorno[0];
                        $docTipo = $retorno[1];
                        $docNum = $retorno[4];
                    }

                    //Preparar Texto Exibi��o Tool Tip
                    if ($existeInt) {
                        $tooltip = $objMdPetIntRN->getTextoTolTipIntimacaoEletronicaCumprida(array($dataAceite, $docPrinc, $docTipo, $docNum, $objRelIntDoc->getStrSinPrincipal(), $arrPessoaJuridica));
                    } elseif ($vinculoRepresentanteInativo) {
                        $idContatoDestinatario = InfraArray::converterArrInfraDTO($objMdPetIntRelDestDTO, 'IdContato');
                        $tooltip = $objMdPetIntRN->getTextoTolTipIntimacaoEletronicaVinculoInativo($dtIntimacao, $docPrinc, $docTipo, $docNum, $objRelIntDoc->getStrSinPrincipal(), $objContato->getNumIdContato(), $idContatoDestinatario);
                        $js = 'alert(\'' . str_replace('<br>', '\n', $tooltip[1]) . '\')';
                    } else {
                        $tooltip = $objMdPetIntRN->getTextoTolTipIntimacaoEletronica(array($dtIntimacao, $docPrinc, $docTipo, $docNum, $objRelIntDoc->getStrSinPrincipal(), $arrPessoaJuridica));
                    }

                    $arr = array();
                    $arr[0] = $js;
                    $arr[1] = $img;
                    $arr[2] = count($tooltip) > 0 ? $tooltip[0] : '';
                    $arr[3] = count($tooltip) > 0 ? $tooltip[1] : '';
                    $conteudoHtml = $objMdPetIntRN->retornaLinkCompletoIconeIntimacao($arr);
                }
            }
        }

        $objMdPetIntAceiteRN = new MdPetIntAceiteRN();
        return $conteudoHtml;
    }

    public function montarAcaoBotaoCertidao($idProtocolo, $idAcessoExterno) {
        $objMdPetCertidaoRN = new MdPetIntCertidaoRN();
        $objMdPetIntRN = new MdPetIntimacaoRN();
        $objMdPetIntRelDestRN = new MdPetIntRelDestinatarioRN();
        $objMdPetIntAceiteRN = new MdPetIntAceiteRN();
        $objMdPetIntProtocoloRN = new MdPetIntProtocoloRN();
        $objMdPetAcessoExtDocRN = new MdPetIntAcessoExternoDocumentoRN();

        $objMdPetIntDocumentoDTO = new MdPetIntProtocoloDTO();
        $objMdPetIntDocumentoDTO->setDblIdProtocolo($idProtocolo);
        $objMdPetIntDocumentoDTO->retDblIdDocumento();
        $objMdPetIntDocumentoDTO->retStrSinPrincipal();
        $objMdPetIntDocumentoDTO->retNumIdMdPetIntimacao();
        $listaDocs = $objMdPetIntProtocoloRN->listar($objMdPetIntDocumentoDTO);

        if (count($listaDocs) > 0) {
            foreach ($listaDocs as $objRelIntDoc) {
                $existeInt = false;
                $arrDados = null;

                $idIntimacao = $objRelIntDoc ? $objRelIntDoc->getNumIdMdPetIntimacao() : null;
                $objContato = $objMdPetIntAceiteRN->retornaObjContatoIdUsuario(array(SessaoSEIExterna::getInstance()->getNumIdUsuarioExterno()));
                $arrDados = $objMdPetIntAceiteRN->existeAceiteIntimacaoAcao(array($idIntimacao, true));
                //Ser� exibida uma certid�o para cada intima��o cumprida por pessoa (F�sica ou Jur�dica)
                if ($arrDados) {
                    foreach ($arrDados as $aceite) {
                        $existeInt = $aceite['INT'];
                        $objMdPetIntRelDestDTO = new MdPetIntRelDestinatarioDTO();
                        $objMdPetIntRelDestDTO->setNumIdMdPetIntimacao($idIntimacao);
                        $objMdPetIntRelDestDTO->retDthDataCadastro();
                        $objMdPetIntRelDestDTO->retNumIdMdPetIntRelDestinatario();
                        $objMdPetIntRelDestDTO->setNumIdContatoParticipante($objContato->getNumIdContato());
                        $objMdPetIntRelDestDTO->retStrStaSituacaoIntimacao();
                        $objMdPetIntRelDestDTO->retStrSinPessoaJuridica();
                        $objMdPetIntRelDestDTO->retNumIdContato();
                        $objMdPetIntRelDestDTO->retDblCnpjContato();
                        $objMdPetIntRelDestDTO->retStrNomeContato();

                        $idAcessoExternoValido = $objMdPetAcessoExtDocRN->verificarAcessoExternoValido(array($idIntimacao, $objContato->getNumIdContato(), $idAcessoExterno));

                        if (!is_null($idAcessoExternoValido)) {
                            $objMdPetIntRelDestDTO->setNumIdAcessoExterno($idAcessoExterno);
                        }

                        $objMdPetIntRelDestDTO = $objMdPetIntRelDestRN->listar($objMdPetIntRelDestDTO);
                        if (!is_null($objMdPetIntRelDestDTO)) {
                            $arrDados = array($objRelIntDoc->getNumIdMdPetIntimacao());
                            $retorno = $objMdPetIntRN->retornaDadosDocPrincipalIntimacao($arrDados);
                            if (!is_null($retorno)) {
                                $docPrinc = $retorno[0];
                            }
                            if ($existeInt) {
                                //Bot�o
                                $conteudoHtml .= $objMdPetCertidaoRN->addIconeAcessoCertidao(array($docPrinc, $idIntimacao, $idAcessoExterno, $aceite['ID_DOCUMENTO_CERTIDAO']));
                            }
                        }
                    }
                }
            }
        }
        return $conteudoHtml;
    }

    public function montarAcaoBotaoResposta($idProtocolo, $idAcessoExterno, $idProcedimento) {
        $objMdPetCertidaoRN = new MdPetIntCertidaoRN();
        $objMdPetIntRN = new MdPetIntimacaoRN();
        $objMdPetIntRelDestRN = new MdPetIntRelDestinatarioRN();
        $objMdPetIntAceiteRN = new MdPetIntAceiteRN();
        $objMdPetIntProtocoloRN = new MdPetIntProtocoloRN();
        $objMdPetAcessoExtDocRN = new MdPetIntAcessoExternoDocumentoRN();
        $objMdPetRespostaRN = new MdPetIntRespostaRN();

        $objMdPetIntDocumentoDTO = new MdPetIntProtocoloDTO();
        $objMdPetIntDocumentoDTO->setDblIdProtocolo($idProtocolo);
        $objMdPetIntDocumentoDTO->retDblIdDocumento();
        $objMdPetIntDocumentoDTO->retStrSinPrincipal();
        $objMdPetIntDocumentoDTO->retNumIdMdPetIntimacao();
        $listaDocs = $objMdPetIntProtocoloRN->listar($objMdPetIntDocumentoDTO);

        $existeInt = false;
        if (count($listaDocs) > 0) {
            $idIntimacaoBotao = InfraArray::converterArrInfraDTO($listaDocs, 'IdMdPetIntimacao');
            $qntDoc = count($listaDocs);
            $documentos = 0;
            $idAceite = null;
            
            foreach ($listaDocs as $objRelIntDoc) {
                $documentos++;
                $idIntimacao = $objRelIntDoc ? $objRelIntDoc->getNumIdMdPetIntimacao() : null;
                $objContato = $objMdPetIntAceiteRN->retornaObjContatoIdUsuario(array(SessaoSEIExterna::getInstance()->getNumIdUsuarioExterno()));

                $arrDados = null;
                if ($objRelIntDoc) {
                    $arrDados = $objMdPetIntAceiteRN->existeAceiteIntimacaoAcao(array($idIntimacao, true));
                    if ($arrDados) {
                        foreach ($arrDados as $aceite) {
                            $existeInt = $aceite['INT'];
                            $idAceite[] = $aceite['ID_ACEITE'];
                        }
                    }
                }

                $objMdPetIntRelDestDTO = new MdPetIntRelDestinatarioDTO();
                $objMdPetIntRelDestDTO->setNumIdMdPetIntimacao($idIntimacao);
                $objMdPetIntRelDestDTO->retDthDataCadastro();
                $objMdPetIntRelDestDTO->retNumIdMdPetIntRelDestinatario();
                $objMdPetIntRelDestDTO->setNumIdContatoParticipante($objContato->getNumIdContato());
                $objMdPetIntRelDestDTO->retStrStaSituacaoIntimacao();
                $objMdPetIntRelDestDTO->retStrSinPessoaJuridica();
                $objMdPetIntRelDestDTO->retNumIdContato();
                $objMdPetIntRelDestDTO->retDblCnpjContato();
                $objMdPetIntRelDestDTO->retStrNomeContato();

                $idAcessoExternoValido = $objMdPetAcessoExtDocRN->verificarAcessoExternoValido(array($idIntimacao, $objContato->getNumIdContato(), $idAcessoExterno));

                if (!is_null($idAcessoExternoValido)) {
                    $objMdPetIntRelDestDTO->setNumIdAcessoExterno($idAcessoExterno);
                }

                $objMdPetIntRelDestDTO = $objMdPetIntRelDestRN->listar($objMdPetIntRelDestDTO);
                
                $qntAceite = count($arrDados);
                $qntDestinatario = count($objMdPetIntRelDestDTO);
                
                //Se a quantidade de aceites for diferente da quantidade de intima��o quer dizer que ainda tem intima��o para ser cumprida
                if($qntAceite > 0 && $qntAceite != $qntDestinatario){
                    $existeInt = false;
                    $aguardandoCumprirGeral = true;
                }

                if (!empty($objMdPetIntRelDestDTO)) {
                    $arrDados = array($objRelIntDoc->getNumIdMdPetIntimacao());
                    $retorno = $objMdPetIntRN->retornaDadosDocPrincipalIntimacao($arrDados);

                    if (!is_null($retorno)) {
                        $docPrinc = $retorno[0];
                        $docTipo = $retorno[1];
                        $docNum = $retorno[4];
                    }

                    if (isset($objMdPetIntRelDestDTO)) {
                        $idMdPetDest = InfraArray::converterArrInfraDTO($objMdPetIntRelDestDTO, 'IdMdPetIntRelDestinatario');
                    }
                    if ($existeInt) {
                        //Bot�o
                        $objDestinatarioDTO = new MdPetIntRelDestinatarioDTO();
                        $objDestinatarioDTO->retTodos();
                        $objDestinatarioDTO->setNumIdMdPetIntRelDestinatario($idMdPetDest, InfraDTO::$OPER_IN);
                        $objDestinatarioDTO->setNumIdMdPetIntimacao($idIntimacao);
                        $objDestinatarioRN = new MdPetIntRelDestinatarioRN();
                        $arrDestinatarioDTO = $objDestinatarioRN->listar($objDestinatarioDTO);
                        $arrContatos = InfraArray::converterArrInfraDTO($arrDestinatarioDTO, 'IdContato');

                        $objUsuarioDTO = new UsuarioDTO();
                        $objUsuarioDTO->retNumIdContato();
                        $objUsuarioDTO->setNumIdUsuario(SessaoSEIExterna::getInstance()->getNumIdUsuarioExterno());
                        $objUsuarioRN = new UsuarioRN();
                        $arrIds = $objUsuarioRN->listarRN0490($objUsuarioDTO);

                        $dtoMdPetVincReptDTO = new MdPetVincRepresentantDTO();
                        $dtoMdPetVincReptDTO->setNumIdContatoVinc($arrContatos, InfraDTO::$OPER_IN);
                        $dtoMdPetVincReptDTO->retNumIdContatoVinc();
                        $dtoMdPetVincReptDTO->retStrNomeProcurador();
                        $dtoMdPetVincReptDTO->retStrRazaoSocialNomeVinc();
                        $dtoMdPetVincReptDTO->retStrTipoRepresentante();
                        $dtoMdPetVincReptDTO->retStrCNPJ();
                        $dtoMdPetVincReptDTO->retStrEmail();
                        $dtoMdPetVincReptDTO->setNumIdContatoProcurador($arrIds[0]->getNumIdContato());
                        $dtoMdPetVincReptDTO->retNumIdContatoProcurador();
                        $dtoMdPetVincReptDTO->setStrSinAtivo('S');
                        $dtoMdPetVincReptDTO->retStrStaEstado();
//                        $dtoMdPetVincReptDTO->setStrStaEstado(MdPetVincRepresentantRN::$RP_REVOGADA);
                        $rnMdPetVincRepRN = new MdPetVincRepresentantRN();
                        $arrMdPetVincRepRN = $rnMdPetVincRepRN->listar($dtoMdPetVincReptDTO);
                        
                        

                        if (count($arrMdPetVincRepRN) > 0) {
                            $bolRevogada = true;
                            foreach ($arrMdPetVincRepRN as $vinculo) {                                
                                if ($vinculo->getStrStaEstado() == MdPetVincRepresentantRN::$RP_ATIVO) {
                                    $bolRevogada = false;
                                }
                            }
                        }

                        
                        
                        if($qntDoc == $documentos){
                            
                            //Se todas as respostas forem revogadas mostro o icone de resposta negada, caso tenha algum ativo mostro somente o de resposta
                            if ($bolRevogada) {
                                $conteudoHtml .= $objMdPetRespostaRN->addIconeRespostaNegada(array($idIntimacaoBotao, $idAcessoExterno, $idProcedimento, $idAceite, $idMdPetDest,$arrMdPetVincRepRN[0]->getStrRazaoSocialNomeVinc(),$arrMdPetVincRepRN[0]->getStrCNPJ(),$arrMdPetVincRepRN[0]->getStrStaEstado()));
                                } else {
                                $conteudoHtml .= $objMdPetRespostaRN->addIconeRespostaAcao(array($idIntimacaoBotao, $idAcessoExterno, $idProcedimento, $idAceite, $idMdPetDest));
                            }  
                        }                        
                    }
                }
            }
        }
        return $conteudoHtml;
    }

    public function montarAcaoDocumentoAcessoExternoAutorizado($arrObjDocumentoAPI) {
        return $this->montarBotaoAcessoExternoPeticionamento($arrObjDocumentoAPI);
    }

    public function montarAcaoProcessoAnexadoAcessoExternoAutorizado($arrObjProcedimentAPI) {

        return $this->montarBotaoAcessoExternoPeticionamento($arrObjProcedimentAPI, true);
    }

    public function verificarAcessoProtocoloExterno($arrObjProcedimentoAPI, $arrObjDocumentoAPI) {

        $id_usuario_externo = SessaoSEIExterna::getInstance()->getNumIdUsuarioExterno();

        //so verifica o acesso se houver usuario externo logado (usuario de acesso externo avulso nao verifica nada)
        if ($id_usuario_externo == null || $id_usuario_externo == "") {

            //retorna array vazio para nao interferir na verificacao de nenhum protocolo/documento
            return array();
        } else {

            $objMdPetIntimacaoRN = new MdPetIntimacaoRN();
            $objMdPetIntAcExtRN = new MdPetIntAcessoExternoDocumentoRN();
            $objMdPetAceiteRN = new MdPetIntAceiteRN();
            $objInfraParametro = new InfraParametro(BancoSEI::getInstance());

            //ids de todos os docs do processo
            $idProtocoloDoProcesso = array();

            foreach ($arrObjDocumentoAPI as $objDocumentoAPI) {
                $idProtocoloDoProcesso[] = $objDocumentoAPI->getIdDocumento();
            }

            //add ids dos processos anexados pois podem ser anexados no mesmo n�vel do documento e adicionado como anexo da Intima��o

            foreach ($arrObjProcedimentoAPI as $objProcedimentoAPI) {
                $idProtocoloDoProcesso[] = $objProcedimentoAPI->getIdProcedimento();
            }

            //se o processo nao tiver documentos ja pode passar direto a verifica��o
            if (!is_array($idProtocoloDoProcesso) || count($idProtocoloDoProcesso) == 0) {
                return array();
            }

            /*
             * saber exatamente quais docs estao envolvidos com a intima��o 
             * (e com a resposta a intima�ao? por enquanto ignorar esses): 
             * aqueles que nao estiverem, nao adicionar no array de retorno 
             * para que o controle de acesso a eles siga para a logica 
             * padrao aplicada pelo Core do SEI
             * @todo precisa ser refatorado o codigo para ser mais perfomatico, pode ocorrer despecho de memoria
             * */
            //Get ids Intimacao Contato
            $arrIntimacoesContato = $objMdPetIntimacaoRN->getIntimacoesPorContato();

            if ($arrIntimacoesContato) {
                //ids de documentos envolvidos na intima��o
                $idDocumentosEnvolvidosNaIntimacao = array();

                $objIntimacaoDocDTO = new MdPetIntProtocoloDTO();
                $objIntimacaoDocDTO->setDblIdProtocolo($idProtocoloDoProcesso, InfraDTO::$OPER_IN);
                $objIntimacaoDocDTO->setNumIdMdPetIntimacao($arrIntimacoesContato, InfraDTO::$OPER_IN);
                $objIntimacaoDocDTO->retTodos();

                $objIntimacaoDocRN = new MdPetIntProtocoloRN();
                $arrObjIntimacaoDocDTO = $objIntimacaoDocRN->listar($objIntimacaoDocDTO);

                $objIntimacaoDocDisponivelDTO = new MdPetIntProtDisponivelDTO();
                $objIntimacaoDocDisponivelDTO->retTodos();
                $objIntimacaoDocDisponivelDTO->setDblIdProtocolo($idProtocoloDoProcesso, InfraDTO::$OPER_IN);
                $objIntimacaoDocDisponivelDTO->setNumIdMdPetIntimacao($arrIntimacoesContato, InfraDTO::$OPER_IN);

                $objIntimacaoDocDisponivelRN = new MdPetIntProtDisponivelRN();
                $arrIntimacaoDocDisponivelDTO = $objIntimacaoDocDisponivelRN->listar($objIntimacaoDocDisponivelDTO);

                foreach ($arrObjIntimacaoDocDTO as $docIntimacaoDTO) {
                    $idDocumentosEnvolvidosNaIntimacao[] = $docIntimacaoDTO->getDblIdProtocolo();
                }

                foreach ($arrIntimacaoDocDisponivelDTO as $docIntimacaoDisponivelDTO) {
                    $idDocumentosEnvolvidosNaIntimacao[] = $docIntimacaoDisponivelDTO->getDblIdProtocolo();
                }


                foreach ($idDocumentosEnvolvidosNaIntimacao as $idProtocoloDaIntimacao) {

                    $objDocumentoAPIComIntimacao = null;

                    foreach ($arrObjDocumentoAPI as $objProtocolo) {

                        if ($objProtocolo->getIdDocumento() == $idProtocoloDaIntimacao) {
                            $objProtocoloAPIComIntimacao = $objDocumentoAPI;
                            $isDocumento = true;
                            break;
                        }

                        if ($objProtocolo->getIdProcedimento() == $idProtocoloDaIntimacao) {
                            $objProtocoloAPIComIntimacao = $objProcedimentoAPI;
                            $isDocumento = false;
                            break;
                        }
                    }

                    $permissao = SeiIntegracao::$TAM_NEGADO;

                    //Verifica se o documento possui intima��es
                    $arrRetIntimacao = $objMdPetIntimacaoRN->retornaIntimacoesVinculadasDocumento($idProtocoloDaIntimacao);

                    $arrIntimacao = $arrRetIntimacao['I'];
                    $idSerieCertidao = $objInfraParametro->getValor(MdPetIntCertidaoRN::$STR_ID_SERIE_CERTIDAO);
                    $isCertidao = $isDocumento ? $objProtocoloAPIComIntimacao->getIdSerie() == $idSerieCertidao : false;

                    //Se possui intima��o realiza verifica��es
                    if (count($arrIntimacao) > 0) {

                        $isAnexoDisponib = $arrRetIntimacao['T'] == 2;
                        $disp = $arrRetIntimacao['T'] == 1;

                        //se for somente disponibilizado permite visualiza��o
                        if ($disp) {
                            $permissao = SeiIntegracao::$TAM_PERMITIDO;

                            //Se for disponibilizado e anexo, ignora os disponiblizados e  verifica se os anexos j� aest�o aceitos
                            //Se for anexo, verifica os aceites
                        } else {
                            //Verifica se todos os documentos  anexo possuem aceite
                            $intAnexo = $arrRetIntimacao['A'];
                            $todasIntAceit = $objMdPetAceiteRN->todasIntimacoesAceitas($intAnexo);

                            //Se todas as intima��es possuem aceite para o anexo  permite visualiza��o
                            if ($todasIntAceit) {
                                $permissao = SeiIntegracao::$TAM_PERMITIDO;
                            } else {
                                //Se n�o existe aceite e for somente anexo, n�o permite visualiza��o
                                $permissao = SeiIntegracao::$TAM_NEGADO;
                            }
                        }
                    } else {

                        //Se n�o possuir intima��es e o acesso for integral permite visualiza��o.
                        //Se for parcial, n�o permite.
                        $isIntAcessoExt = $objMdPetIntAcExtRN->getTipoConcessaoAcesso($_GET['id_acesso_externo']);
                        if ($isIntAcessoExt == MdPetIntAcessoExternoDocumentoRN::$ACESSO_INTEGRAL) {
                            $permissao = SeiIntegracao::$TAM_PERMITIDO;
                        }

                        if ($isCertidao) {
                            $permissao = SeiIntegracao::$TAM_PERMITIDO;
                        }
                    }
                    //Preenche o array de documento com o retorno
                    $ret[$idProtocoloDaIntimacao] = $permissao;
                }
            } else {
                $ret = array();
            }
            return $ret;
        }
    }

    public function montarBotaoDocumento(ProcedimentoAPI $objProcedimentoAPI, $arrObjDocumentoAPI) {

        $arrBotoes = array();

        if (!(SessaoSEI::getInstance()->verificarPermissao('md_pet_int_serie_listar')) || !(SessaoSEI::getInstance()->verificarPermissao('md_pet_vinc_documento_listar'))) {
            return $arrBotoes;
        }

        $objSessaoSEI = SessaoSEI::getInstance();

        $dblIdProcedimento = $_GET['id_procedimento'];

        foreach ($arrObjDocumentoAPI as $objDocumentoAPI) {

            $dblIdDocumento = $objDocumentoAPI->getIdDocumento();

            // Gerar Intima��o
            if ($objProcedimentoAPI->getCodigoAcesso() > 0 && $objProcedimentoAPI->getSinAberto() == 'S') {
                if ($objDocumentoAPI->getCodigoAcesso() > 0) {

                    $objRelProtocoloProtocoloDTO = new RelProtocoloProtocoloDTO();
                    $objRelProtocoloProtocoloDTO->retTodos();
                    $objRelProtocoloProtocoloDTO->setDblIdProtocolo1($_GET['id_procedimento']);
                    $objRelProtocoloProtocoloDTO->setDblIdProtocolo2($dblIdDocumento);

                    $objRelProtocoloProtocoloRN = new RelProtocoloProtocoloRN();
                    $objRelProtocoloProtocoloDTO = $objRelProtocoloProtocoloRN->listarRN0187($objRelProtocoloProtocoloDTO);

                    $arrIdRelProtocoloProtocolo = array();

                    foreach ($objRelProtocoloProtocoloDTO as $objRelProtocoloProtocolo) {
                        $arrIdRelProtocoloProtocolo[] = $objRelProtocoloProtocolo->getDblIdRelProtocoloProtocolo();
                    }

                    $dto = new ProcedimentoDTO();
                    $dto->setDblIdProcedimento($dblIdProcedimento);
                    $dto->setArrObjRelProtocoloProtocoloDTO(InfraArray::gerarArrInfraDTO('RelProtocoloProtocoloDTO', 'IdRelProtocoloProtocolo', $arrIdRelProtocoloProtocolo));
                    $dto->setStrSinDocTodos('S');
                    $dto->setStrSinDocAnexos('S');
                    $dto->setStrSinConteudoEmail('S');
                    $dto->setStrSinProcAnexados('S');
                    $dto->setStrSinDocCircular('S');
                    $dto->setStrSinArquivamento('S');

                    // TODO: if para NAO apresentar o botao Gerar Intimacao Eletronica em processo Sigiloso (Nivel de Acesso local OU Global 2)
                    //       , ate a resolucao do item 22.2 da lista de correcoes
//                    $dto->setStrStaNivelAcessoLocalProtocolo(ProtocoloRN::$NA_SIGILOSO, InfraDTO::$OPER_DIFERENTE);
//                    $dto->setStrStaNivelAcessoGlobalProtocolo(ProtocoloRN::$NA_SIGILOSO, InfraDTO::$OPER_DIFERENTE);

                    $objProcedimentoRN = new ProcedimentoRN();
                    $arrObjProcedimentoDTO = $objProcedimentoRN->listarCompleto($dto);
                    if (count($arrObjProcedimentoDTO) > 0) {
                        $objProcedimentoDTO = $arrObjProcedimentoDTO[0];

                        $arrObjRelProtocoloProtocoloDTO = $objProcedimentoDTO->getArrObjRelProtocoloProtocoloDTO();

                        foreach ($arrObjRelProtocoloProtocoloDTO as $objRelProtocoloProtocoloDTO) {

                            if ($objRelProtocoloProtocoloDTO->getStrStaAssociacao() == RelProtocoloProtocoloRN::$TA_DOCUMENTO_ASSOCIADO) {

                                $objDocumentoDTO = $objRelProtocoloProtocoloDTO->getObjProtocoloDTO2();
                                $strSinAssinado = $objDocumentoDTO->getStrSinAssinado();

                                $arrBotoes[$dblIdDocumento] = array();

                                $strStaDocumento = $objDocumentoDTO->getStrStaDocumento();
                                $idSerie = $objDocumentoDTO->getNumIdSerie();

                                //TODO: Ajuste local para a Anatel no if acima para exibir o bot�o da Gerar Intima��o para os tipos de documento de id 184 (Comunicado de Cobran�a) e 186 (Notifica��o de Lan�amento). Para ativar, descomentar a linha abaixo e comentar a linha acima
                                if (($strSinAssinado == 'S' && $strStaDocumento <> 'X') || $idSerie == 184 || $idSerie == 186) {

                                    $rnPetIntSerie = new MdPetIntSerieRN();
                                    $dtoPetIntSerie = new MdPetIntSerieDTO();
                                    $dtoPetIntSerie->retTodos();
                                    $dtoPetIntSerie->setNumIdSerie($idSerie);

                                    $arrDtoPetIntSerie = $rnPetIntSerie->listar($dtoPetIntSerie);

                                    //encontrou o tipo de documento na parametrizacao do sistema e o perfil possui o recurso
                                    if (is_array($arrDtoPetIntSerie) && count($arrDtoPetIntSerie) > 0 && $objSessaoSEI->verificarPermissao('md_pet_intimacao_cadastrar')) {
                                        $arrBotoes[$dblIdDocumento][] = '<a href="' . $objSessaoSEI->assinarLink('controlador.php?acao=md_pet_intimacao_cadastrar&acao_origem=arvore_visualizar&acao_retorno=arvore_visualizar&id_procedimento=' . $dblIdProcedimento . '&id_documento=' . $dblIdDocumento . '&arvore=1') . '" tabindex="' . PaginaSEI::getInstance()->getProxTabBarraComandosSuperior() . '" class="botaoSEI"><img class="infraCorBarraSistema" src="modulos/peticionamento/imagens/intimacao_eletronica_gerar.svg" alt="Gerar Intima��o Eletr�nica" title="Gerar Intima��o Eletr�nica" /></a>';
                                    }
                                }
                            }
                        }
                    }
                }
            }

            // Vincula��o � Pessoa Jur�dica
            $objMdPetVinculoRN = new MdPetVinculoRN();
            $arrObjMdPetVincDocumentoDTO = $objMdPetVinculoRN->consultarDocumentoVinculo(array($dblIdProcedimento, $dblIdDocumento, 'retornoDTO' => true));

            if ($arrObjMdPetVincDocumentoDTO && count($arrObjMdPetVincDocumentoDTO) > 0) {
                $objMdPetVincRepresentantRN = new MdPetVincRepresentantRN();
                $idRepresentantes = $objMdPetVincRepresentantRN->getIdRepresentantesVinculo(array($arrObjMdPetVincDocumentoDTO[0]->getNumIdMdPetVinculo()));

                if (count($idRepresentantes) > 0) {
                    $arrBotoes[$dblIdDocumento][] = '<a href="' . SessaoSEI::getInstance()->assinarLink('controlador.php?acao=md_pet_adm_vinc_consultar&acao_origem=procedimento_visualizar&acao_retorno=arvore_visualizar&id_procedimento=' . $objProcedimentoAPI->getIdProcedimento() . '&arvore=1') . '" tabindex="' . PaginaSEI::getInstance()->getProxTabBarraComandosSuperior() . '" class="botaoSEI"><img class="infraCorBarraSistema" src="modulos/peticionamento/imagens/VinculoPJ.png" alt="Visualizar V�nculos e Procura��es Eletr�nicas" title="Visualizar V�nculos e Procura��es Eletr�nicas" /></a>';
                }
            }
        }

        return $arrBotoes;
    }

    public function montarAcaoDocumentoAcessoExternoNegado($arrObjDocumentoAPI) {

        //s� � necess�rio adicionar botao por este ponto SE o processo estiver numa situa�ao em que nao foi adicionado nenhum 
        // botao pelo ponto de extensao do acesso externo autorizado (o que deixaria em alguns casos 
        // a coluna "A��es" sem quaisquer icones
        // Exemplo: Processo com apenas 1 documento assinado, com intima�ao gerada do tipo integral e sem anexos
        if (count($this->arrDocumentosLiberados) == 0) {
            return $this->montarBotaoAcessoExternoPeticionamento($arrObjDocumentoAPI);
        } else {
            return null;
        }
    }

    public function montarAcaoProcessoAnexadoAcessoExternoNegado($arrObjProcedimentoAPI) {

        //s� � necess�rio adicionar botao por este ponto SE o processo estiver numa situa�ao em que nao foi adicionado nenhum
        // botao pelo ponto de extensao do acesso externo autorizado (o que deixaria em alguns casos
        // a coluna "A��es" sem quaisquer icones
        // Exemplo: Processo com apenas 1 documento assinado, com intima�ao gerada do tipo integral e sem anexos
        if (count($this->arrProcessosLiberados) == 0) {
            return $this->montarBotaoAcessoExternoPeticionamento($arrObjProcedimentoAPI, true);
        } else {
            return null;
        }
    }

    public function cancelarDisponibilizacaoAcessoExterno($arrObjAcessoExternoAPI) {
        $objMdPetRegrasGeraisRN = new MdPetRegrasGeraisRN();
        $objMdPetAcessoExternoRN = new MdPetAcessoExternoRN();

        if ($_REQUEST['acao'] != 'md_pet_intimacao_cadastrar') {
            foreach ($arrObjAcessoExternoAPI as $objAcessoExternoAPI) {
                $idAcessoExt = $objAcessoExternoAPI->getIdAcessoExterno();
                $isModuloAcessoExt = $objMdPetAcessoExternoRN->verificaIdAcessoExternoModulo($idAcessoExt);

                if ($isModuloAcessoExt) {
                    $docTipoIntegral = $objMdPetRegrasGeraisRN->verificarDocumentoTipoIntegral($idAcessoExt);

                    if (!$docTipoIntegral) {
                        $objInfraException = new InfraException();
                        $objInfraException->adicionarValidacao('N�o � permitido cancelar a disponibiliza��o para esse usu�rio, pois existem vinculos no m�dulo Peticionamento e Intima��o Eletr�nicos.');
                        $objInfraException->lancarValidacoes();
                        return null;
                    } else {

                        $cumprimentoValido = $objMdPetRegrasGeraisRN->verificarCumprimentoIntimacao($idAcessoExt);
                        if (!$cumprimentoValido) {
                            $objInfraException = new InfraException();
                            $objInfraException->adicionarValidacao('N�o � permitido cancelar a disponibiliza��o para esse usu�rio, pois existem Intima��es n�o cumpridas para o mesmo.');
                            $objInfraException->lancarValidacoes();
                            return null;
                        } else {
                            $objProcedimento = $objAcessoExternoAPI->getProcedimento();
                            $idProcedimento = $objProcedimento->getIdProcedimento();

                            $objRN = new MdPetIntimacaoRN();
                            $isRespIntPeriodo = $objRN->existeIntimacaoPrazoValido(array($idProcedimento, $idAcessoExt));

                            if ($isRespIntPeriodo) {
                                $objInfraException = new InfraException();
                                $objInfraException->adicionarValidacao('N�o � permitido cancelar, pois o mesmo possui Intima��o Eletr�nica ainda em curso.');
                                $objInfraException->lancarValidacoes();
                                return null;
                            }
                        }
                    }

                    $objMdPetAcessoExternoRN->corrigirDadosPosCancelamentoAcessoIntegral($idAcessoExt);

                    return true;
                }
            }
        }

        return true;
    }

    /**
     * Valida se o Processo onde est� realizando a anexa��o de processo possui V�nculo com Intima��o
     */
    public function anexarProcesso(ProcedimentoAPI $objProcedimentoAPIPrincipal, ProcedimentoAPI $objProcedimentoAPIAnexado) {
        $idProcedimento = $objProcedimentoAPIAnexado->getIdProcedimento();

        $objRN = new MdPetIntimacaoRN();
        $isRespIntPeriodo = $objRN->existeIntimacaoPrazoValido($idProcedimento);

        if ($isRespIntPeriodo) {
            $msg = 'N�o � permitido anexar este processo, pois o mesmo possui Intima��o Eletr�nica ainda em curso.';

            $objInfraException = new InfraException();
            $objInfraException->adicionarValidacao($msg);
            $objInfraException->lancarValidacoes();
        }

        return parent::anexarProcesso($objProcedimentoAPIPrincipal, $objProcedimentoAPIAnexado);
    }

    /**
     * Valida se o Processo onde est� realizando a anexa��o de processo possui V�nculo com Intima��o
     */
    public function sobrestarProcesso(ProcedimentoAPI $objProcedimentoAPI, $objProcedimentoAPIVinculado) {

        $idProcedimento = $objProcedimentoAPI->getIdProcedimento();

        $objRN = new MdPetIntimacaoRN();
        $isRespIntPeriodo = $objRN->existeIntimacaoPrazoValido($idProcedimento);

        if ($isRespIntPeriodo) {
            $msg = 'N�o � permitido sobrestar este processo, pois o mesmo possui Intima��o Eletr�nica ainda em curso.';


            $objInfraException = new InfraException();
            $objInfraException->adicionarValidacao($msg);
            $objInfraException->lancarValidacoes();
        }

        return parent::sobrestarProcesso($objProcedimentoAPI, $objProcedimentoAPIVinculado);
    }

    /**
     * Valida se o Processo que est� sendo desanexado est� como anexo de uma Intima��o
     */
    public function desanexarProcesso(ProcedimentoAPI $objProcedimentoAPIPrincipal, ProcedimentoAPI $objProcedimentoAPIAnexado) {

        $idProcedimento = $objProcedimentoAPIAnexado->getIdProcedimento();

        $objRN = new MdPetIntProtocoloRN();
        $objRNDisp = new MdPetIntProtDisponivelRN();
        $isIntimacao = $objRN->verificaProcessoEAnexoIntimacao($idProcedimento);
        $isIntimacaoDisp = $objRNDisp->verificaProcessoEDocDisponivelIntimacao($idProcedimento);

        if ($isIntimacao || $isIntimacaoDisp) {
            if ($isIntimacao) {
                $msg = 'N�o � permitido desanexar este processo, pois o mesmo � anexo de Documento Principal de Intima��o Eletr�nica neste processo.';
            } else {
                $msg = 'N�o � permitido desanexar este processo, pois o mesmo � Documento Dispon�vel de Intima��o Eletr�nica neste processo.';
            }

            $objInfraException = new InfraException();
            $objInfraException->adicionarValidacao($msg);
            $objInfraException->lancarValidacoes();
            return null;
        } else {

            return parent::desanexarProcesso($objProcedimentoAPIPrincipal, $objProcedimentoAPIAnexado);
        }
    }

    public function permitirAndamentoConcluido(AndamentoAPI $objAndamentoAPI) {

        $permitirCancelamento = array_key_exists(MdPetIntAtualizarAcessoExternoRN::$ID_PET_LIBERAR_ANDAMENTOS_CONCLUIDOS, $_SESSION) ? true : false;
        if ($objAndamentoAPI->getIdTarefa() == TarefaRN::$TI_CANCELAMENTO_LIBERACAO_ACESSO_EXTERNO && $permitirCancelamento) {
            return true;
        }

        return false;
    }

    public function desativarUnidade($arrObjUnidadeAPI) {

        $mdPetRegrasGeraisRN = new MdPetRegrasGeraisRN();
        $msg = $mdPetRegrasGeraisRN->verificarExistenciaUnidade(array($arrObjUnidadeAPI, 'desativar'));
        if ($msg != '') {
            $objInfraException = new InfraException();
            $objInfraException->lancarValidacao($msg);
        } else {
            return $arrObjUnidadeAPI;
        }
    }

    public function desativarTipoProcesso($arrObjTipoProcessoDTO) {

        $mdPetRegrasGeraisRN = new MdPetRegrasGeraisRN();
        $msg = $mdPetRegrasGeraisRN->verificarExistenciaTipoProcesso(array($arrObjTipoProcessoDTO, 'desativar'));

        //verifica se existe um processo sendo utilizado
        if ($msg != "") {
            $objInfraException = new InfraException();
            $objInfraException->lancarValidacao($msg);
        } else {
            return $arrObjTipoProcessoDTO;
        }
    }

    public function desativarTipoDocumento($arrObjSerieAPI) {

        $mdPetRegrasGeraisRN = new MdPetRegrasGeraisRN();
        $msg = $mdPetRegrasGeraisRN->verificarExistenciaTipoDocumento(array($arrObjSerieAPI, 'desativar'));

        // condi��o para saber se existe um documento sendo usado
        if ($msg != '') {
            $objInfraException = new InfraException();
            $objInfraException->lancarValidacao($msg);
        } else {
            return $arrObjSerieAPI;
        }
    }

    public function excluirUnidade($arrObjUnidadeAPI) {

        $mdPetRegrasGeraisRN = new MdPetRegrasGeraisRN();
        $msg = $mdPetRegrasGeraisRN->verificarExistenciaUnidade(array($arrObjUnidadeAPI, 'excluir'));
        if ($msg != '') {
            $objInfraException = new InfraException();
            $objInfraException->lancarValidacao($msg);
        } else {
            return $arrObjUnidadeAPI;
        }
    }

    public function excluirTipoProcesso($arrObjTipoProcessoDTO) {

        $mdPetRegrasGeraisRN = new MdPetRegrasGeraisRN();
        $msg = $mdPetRegrasGeraisRN->verificarExistenciaTipoProcesso(array($arrObjTipoProcessoDTO, 'excluir'));

        //verifica se existe um processo sendo utilizado
        if ($msg != '') {
            $objInfraException = new InfraException();
            $objInfraException->lancarValidacao($msg);
        } else {
            return $arrObjTipoProcessoDTO;
        }


        //return parent::desativarTipoProcesso($arrObjTipoProcedimentoDTO); // TODO: Change the autogenerated stub
    }

    public function excluirTipoDocumento($arrObjSerieAPI) {

        $mdPetRegrasGeraisRN = new MdPetRegrasGeraisRN();
        $msg = $mdPetRegrasGeraisRN->verificarExistenciaTipoDocumento(array($arrObjSerieAPI, 'excluir'));

        // condi��o para saber se existe um documento sendo usado
        if ($msg != '') {
            $objInfraException = new InfraException();
            $objInfraException->lancarValidacao($msg);
        } else {
            return $arrObjSerieAPI;
        }
    }

    public function excluirDocumento(DocumentoAPI $objDocumentoAPI) {
        $mdPetRegrasGeraisRN = new MdPetRegrasGeraisRN();
        $msg = $mdPetRegrasGeraisRN->verificarDocumentoIndisponibilidade(array($objDocumentoAPI, 'excluir'));

        // condi��o para saber  o documento est� sendo utilizado em um indisponibilidade
        if ($msg != '') {
            $objInfraException = new InfraException();
            $objInfraException->lancarValidacao($msg);
        } else {
            return $objDocumentoAPI;
        }
    }

    public function excluirContato($objContatoAPI) {
        if (count($objContatoAPI) > 0) {
            $objContatoAPI = $objContatoAPI[0];

            $objMdPetContatoRN = new MdPetContatoRN();
            if ($objMdPetContatoRN->consultarContatoVinculo(array(array($objContatoAPI->getIdContato()), 'excluir'))) {
                return $objContatoAPI;
            }
        }
    }

    public function desativarContato($objContatoAPI) {
        if (count($objContatoAPI) > 0) {
            $objContatoAPI = $objContatoAPI[0];

            $objMdPetContatoRN = new MdPetContatoRN();
            if ($objMdPetContatoRN->consultarContatoVinculo(array(array($objContatoAPI->getIdContato()), 'desativar'))) {
                return $objContatoAPI;
            }
        }
    }

}

?>