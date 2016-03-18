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
            'titulo' => $arrPost->getNomeSubcategoria(),
            'nomeTipo' => $arrPost->getNomeTipo(),
            'idTipo' => $arrPost->getidTipo(),
            'nomeCategoria' => $arrPost->getNomeCategoria(),
            'idCategoria' => $arrPost->getidCategoria(),
            'nomeSubcategoria' => $arrPost->getNomeSubcategoria(),
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
            'titulo' => $arrPosts[0]->getNomeSubcategoria(),
            'nomeTipo' => $arrPosts[0]->getNomeTipo(),
            'idTipo' => $arrPosts[0]->getIdTipo(),
            'nomeCategoria' => $arrPosts[0]->getNomeCategoria(),
            'idCategoria' => $arrPosts[0]->getIdCategoria(),
            'nomeSubcategoria' => $arrPosts[0]->getNomeSubcategoria(),
            'idSubcategoria' => $arrPosts[0]->getIdSubcategoria()
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
            'titulo' => $arrPosts[0]->getNomeSubcategoria(),
            'nomeTipo' => $arrPosts[0]->getNomeTipo(),
            'idTipo' => $arrPosts[0]->getidTipo(),
            'nomeCategoria' => $arrPosts[0]->getNomeCategoria(),
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
            'titulo' => $arrPosts[0]->getNomeSubcategoria(),
            'nomeTipo' => $arrPosts[0]->getNomeTipo(),
            'idTipo' => $arrPosts[0]->getidTipo(),
        ];
        return new ViewModel(compact('arrPosts', 'arrBreadcrumb'));
    }


}
