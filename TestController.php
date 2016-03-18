<?php

namespace Gestao\Controller;

use InepZend\View\View;

/**
 * Controller CategoriaItemEstoque.
 *
 * @name CategoriaItemEstoque
 * @package Gestao
 * @subpackage Controller
 * @since 13/01/2016
 */
class CategoriaItemEstoqueController extends AbstractController
{

    /**
     * Metodo construtor da classe
     * CategoriaItemEstoqueController constructor.
     * @author Igor Rotondo Bagliotti <igor.bagliotti@cast.com.br>
     */
    public function __construct()
    {
        $this->arrPk = array('idCategoriaItemEstoque');
        $this->arrMethodPk = ['getIdCategoriaItemEstoque'];
        $this->arrMethodPaging = [
            'getStatus',
            'getNoCategoriaItemEstoque',
            'getNomeTipoItemEstoque',
        ];
    }

    /**
     * Action principal da controller.
     * Tela para pesquisar categoriaItemEstoque
     *
     * @name indexAction
     * @return View
     * @author Igor Rotondo Bagliotti <igor.bagliotti@cast.com.br>
     */
    public function indexAction()
    {
        $formCategoriaItemEstoquePesquisar = $this->getForm('Gestao\Form\CategoriaItemEstoquePesquisar')->prepareElements();
        $strTitle = 'Consultar Categoria de Item';

        return new View(compact('strTitle', 'formCategoriaItemEstoquePesquisar'));
    }
}
