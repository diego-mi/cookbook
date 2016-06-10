<?php
namespace Cookbook\Message;

trait Message
{
    /**
     * Mensagem utilizada ao tentar cadastrar um tipo ja existente.
     * @var string
     */
    protected $strMsgEUniqueKey = 'Não é possível adicionar item duplicado.';

    /**
     * Mensagem utilizada quando realizar um cadastro com sucesso.
     * @var string
     */
    protected $strMsgSAdicionado = 'Cadastro realizado com sucesso.';

    /**
     * Mensagem utilizada quando realizar um cadastro com sucesso.
     * @var string
     */
    protected $strMsgSEdicao = 'Edição realizada com sucesso.';

    /**
     * Mensagem utilizada quando realizar um delete com sucesso.
     * @var string
     */
    protected $strMsgSDeletado = 'Registro deletado com sucesso!';

    /**
     * Mensagem utilizada quando realizar um delete com falha.
     * @var string
     */
    protected $strMsgSNaoDeletado = 'Não foi possivel deletar o registro!';
}
