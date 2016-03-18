<?php
namespace Cookbook\Controller;

use Zend\View\Model\ViewModel;
use Cookbook\Message\Message;

class PostController extends AbstractController
{
    use Message;

    /**
     * IndexController constructor.
     */
    public function __construct()
    {
        $this->strControllerName = 'post';
        $this->strRoute = 'criar';
        $this->strServiceNamespace = 'Cookbook\Service\Post';
        $this->strEntityNamespace = 'Cookbook\Entity\Post';
        $this->strFormNamespace = 'Cookbook\Form\Post';
    }

    /**
     * Tela inicial de subcategoria listando todas
     *
     * @return ViewModel
     */
    public function indexAction()
    {
        $arrEntitys = $this->getService($this->strServiceNamespace)->findBy([]);

        return new ViewModel(compact('arrEntitys'));
    }

    /**
     * Metodo responsavel por carregar a visualizacao de subcategoria
     *
     * @return ViewModel
     */
    public function visualizarAction()
    {
//        $service = $this->getService('Cookbook\Service\VwPost');
//        $intIdFromRoute = $this->params()->fromRoute('id', 0);
//        $entity = $service->find($intIdFromRoute);
//
//        if (!$entity) {
//            return $this->redirect()->toRoute('cookbook', ['action' => 'ops']);
//        }
//
//        $arrEntityChilds = $this->getService('Cookbook\Service\VwPost')->findBy(['idPost' => $intIdFromRoute]);
//
//        return new ViewModel(compact('entity', 'intIdFromRoute', 'arrEntityChilds'));
    }
}
