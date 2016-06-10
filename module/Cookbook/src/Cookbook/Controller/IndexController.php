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
     * IndexController constructor.
     */
    public function __construct()
    {
        $this->strControllerName = 'index';
        $this->strRoute = 'cookbook';
    }

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
            'tituloPagina' => $arrPost->getTituloPost(),
            'segmentos' => [
                [
                    'link' => true,
                    'text' => $arrPost->getNomeTipo(),
                    'route' => $this->strRoute,
                    'action' => 'tipo',
                    'id' => $arrPost->getIdTipo()
                ], [
                    'link' => true,
                    'text' => $arrPost->getNomeCategoria(),
                    'route' => $this->strRoute,
                    'action' => 'categoria',
                    'id' => $arrPost->getIdCategoria()
                ], [
                    'link' => true,
                    'text' => $arrPost->getNomeSubcategoria(),
                    'route' => $this->strRoute,
                    'action' => 'subcategoria',
                    'id' => $arrPost->getIdSubcategoria()
                ]
            ]
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
            'tituloPagina' => $arrPosts[0]->getNomeSubcategoria(),
            'segmentos' => [
                [
                    'link' => true,
                    'text' => $arrPosts[0]->getNomeTipo(),
                    'route' => $this->strRoute,
                    'action' => 'tipo',
                    'id' => $arrPosts[0]->getIdTipo()
                ], [
                    'link' => true,
                    'text' => $arrPosts[0]->getNomeCategoria(),
                    'route' => $this->strRoute,
                    'action' => 'categoria',
                    'id' => $arrPosts[0]->getIdCategoria()
                ], [
                    'link' => true,
                    'text' => $arrPosts[0]->getNomeSubcategoria(),
                    'route' => $this->strRoute,
                    'action' => 'subcategoria',
                    'id' => $arrPosts[0]->getIdSubcategoria()
                ]
            ]
        ];

        $myService = $this->getService('Cookbook\Service\Tipo');
        $arrMenu = $myService->getMenu();

        return new ViewModel(compact('arrPosts', 'arrBreadcrumb', 'arrMenu'));
    }

    public function categoriaAction()
    {
        $intCategoria = $this->params()->fromRoute('id');

        $arrPosts = $this->getService('Cookbook\Service\VwPost')->findBy(['idCategoria' => $intCategoria]);
        if (!count($arrPosts)) {
            return $this->redirect()->toRoute('cookbook', ['action' => 'ops']);
        }

        $arrBreadcrumb = [
            'tituloPagina' => $arrPosts[0]->getNomeCategoria(),
            'segmentos' => [
                [
                    'link' => true,
                    'text' => $arrPosts[0]->getNomeTipo(),
                    'route' => $this->strRoute,
                    'action' => 'tipo',
                    'id' => $arrPosts[0]->getIdTipo()
                ], [
                    'link' => true,
                    'text' => $arrPosts[0]->getNomeCategoria(),
                    'route' => $this->strRoute,
                    'action' => 'categoria',
                    'id' => $arrPosts[0]->getIdCategoria()
                ], [
                    'link' => false,
                    'text' => 'Listando todos em ' . $arrPosts[0]->getNomeCategoria()
                ],
            ]
        ];

        $myService = $this->getService('Cookbook\Service\Tipo');
        $arrMenu = $myService->getMenu();

        return new ViewModel(compact('arrPosts', 'arrBreadcrumb', 'arrMenu'));
    }

    public function tipoAction()
    {
        $intTipo = $this->params()->fromRoute('id');

        $arrPosts = $this->getService('Cookbook\Service\VwPost')->findBy(['idTipo' => $intTipo]);
        if (!count($arrPosts)) {
            return $this->redirect()->toRoute('cookbook', ['action' => 'ops']);
        }

        $arrBreadcrumb = [
            'tituloPagina' => $arrPosts[0]->getNomeTipo(),
            'segmentos' => [
                [
                    'link' => true,
                    'text' => $arrPosts[0]->getNomeTipo(),
                    'route' => $this->strRoute,
                    'action' => 'tipo',
                    'id' => $arrPosts[0]->getIdTipo()
                ], [
                    'link' => false,
                    'text' => 'Listando todos em ' . $arrPosts[0]->getNomeTipo()
                ],
            ]
        ];

        $myService = $this->getService('Cookbook\Service\Tipo');
        $arrMenu = $myService->getMenu();

        return new ViewModel(compact('arrPosts', 'arrBreadcrumb', 'arrMenu'));
    }


}
