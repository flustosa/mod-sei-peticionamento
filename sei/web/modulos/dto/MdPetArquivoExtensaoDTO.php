<?
/**
* TRIBUNAL REGIONAL FEDERAL DA 4� REGI�O
*
* 08/02/2012 - criado por bcu
*
* Vers�o do Gerador de C�digo: 1.32.1
*
* Vers�o no CVS: $Id$
*/

require_once dirname(__FILE__).'/../../../SEI.php';

class MdPetArquivoExtensaoDTO extends ArquivoExtensaoDTO {

  //public function getStrNomeTabela() {
  //	 return 'arquivo_extensao';
  //}

  public function montar(){
    parent::montar();
    $this->adicionarAtributo(InfraDTO::$PREFIXO_STR, 'PalavrasPesquisa');
  }	
	
  /*
  public function montar() {

    $this->adicionarAtributoTabela(InfraDTO::$PREFIXO_NUM,
                                   'IdArquivoExtensao',
                                   'id_arquivo_extensao');

    $this->adicionarAtributoTabela(InfraDTO::$PREFIXO_STR,
                                   'Extensao',
                                   'extensao');

    $this->adicionarAtributoTabela(InfraDTO::$PREFIXO_STR,
                                   'Descricao',
                                   'descricao');

    $this->adicionarAtributoTabela(InfraDTO::$PREFIXO_STR,
                                   'SinAtivo',
                                   'sin_ativo');
    
    $this->adicionarAtributo(InfraDTO::$PREFIXO_STR, 'PalavrasPesquisa');

    $this->configurarPK('IdArquivoExtensao',InfraDTO::$TIPO_PK_NATIVA);

    $this->configurarExclusaoLogica('SinAtivo', 'N');

  }
  */
}
?>