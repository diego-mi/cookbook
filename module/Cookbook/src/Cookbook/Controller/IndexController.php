<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Cookbook\Controller;

use Zend\View\Model\ViewModel;

class IndexController extends AbstractController
{
    /**
     * Tela de boas vindas da documentacao
     *
     * @return ViewModel
     */
    public function indexAction()
    {
        return new ViewModel();
    }

    public function postAction()
    {
        $intPostId = $this->params()->fromRoute('id');

        $arrPost = $this->getService('Cookbook\Service\VwPost')->find($intPostId);
        if (!count($arrPost)) {
            return $this->redirect()->toRoute('cookbook', ['action' => 'ops']);
        }
        $arrBreadcrumb = [
            'titulo' => $arrPost->getDescricaoSubcategoria(),
            'descricaoTipo' => $arrPost->getDescricaoTipo(),
            'idTipo' => $arrPost->getidTipo(),
            'descricaoCategoria' => $arrPost->getDescricaoCategoria(),
            'idCategoria' => $arrPost->getidCategoria(),
            'descricaoSubcategoria' => $arrPost->getDescricaoSubcategoria(),
            'idSubcategoria' => $arrPost->getidSubcategoria()
        ];
        return new ViewModel(compact('arrPost', 'arrBreadcrumb'));
    }

    public function subcategoriaAction()
    {
        $intSubcategoria = $this->params()->fromRoute('id');

        $arrPosts = $this->getService('Cookbook\Service\VwPost')->findBy(['idSubcategoria' => $intSubcategoria]);
        if (!count($arrPosts)) {
            return $this->redirect()->toRoute('cookbook', ['action' => 'ops']);
        }
        $arrBreadcrumb = [
            'titulo' => $arrPosts[0]->getDescricaoSubcategoria(),
            'descricaoTipo' => $arrPosts[0]->getDescricaoTipo(),
            'idTipo' => $arrPosts[0]->getidTipo(),
            'descricaoCategoria' => $arrPosts[0]->getDescricaoCategoria(),
            'idCategoria' => $arrPosts[0]->getidCategoria(),
            'descricaoSubcategoria' => $arrPosts[0]->getDescricaoSubcategoria(),
            'idSubcategoria' => $arrPosts[0]->getidSubcategoria()
        ];
        return new ViewModel(compact('arrPosts', 'arrBreadcrumb'));
    }

    public function categoriaAction()
    {
        $intCategoria = $this->params()->fromRoute('id');

        $arrPosts = $this->getService('Cookbook\Service\VwPost')->findBy(['idCategoria' => $intCategoria]);
        if (!count($arrPosts)) {
            return $this->redirect()->toRoute('cookbook', ['action' => 'ops']);
        }
        $arrBreadcrumb = [
            'titulo' => $arrPosts[0]->getDescricaoSubcategoria(),
            'descricaoTipo' => $arrPosts[0]->getDescricaoTipo(),
            'idTipo' => $arrPosts[0]->getidTipo(),
            'descricaoCategoria' => $arrPosts[0]->getDescricaoCategoria(),
            'idCategoria' => $arrPosts[0]->getidCategoria()
        ];
        return new ViewModel(compact('arrPosts', 'arrBreadcrumb'));
    }

    public function tipoAction()
    {
        $intTipo = $this->params()->fromRoute('id');

        $arrPosts = $this->getService('Cookbook\Service\VwPost')->findBy(['idTipo' => $intTipo]);
        if (!count($arrPosts)) {
            return $this->redirect()->toRoute('cookbook', ['action' => 'ops']);
        }
        $arrBreadcrumb = [
            'titulo' => $arrPosts[0]->getDescricaoSubcategoria(),
            'descricaoTipo' => $arrPosts[0]->getDescricaoTipo(),
            'idTipo' => $arrPosts[0]->getidTipo(),
        ];
        return new ViewModel(compact('arrPosts', 'arrBreadcrumb'));
    }


}
