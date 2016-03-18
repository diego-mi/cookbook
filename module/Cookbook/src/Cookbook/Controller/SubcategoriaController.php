<?php
namespace Cookbook\Controller;

use Zend\View\Model\ViewModel;
use Cookbook\Message\Message;

class SubcategoriaController extends AbstractController
{
    use Message;

    /**
     * IndexController constructor.
     */
    public function __construct()
    {
        $this->strControllerName = 'subcategoria';
        $this->strRoute = 'criar';
        $this->strServiceNamespace = 'Cookbook\Service\Subcategoria';
        $this->strEntityNamespace = 'Cookbook\Entity\Subcategoria';
        $this->strFormNamespace = 'Cookbook\Form\Subcategoria';
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
        $service = $this->getService('Cookbook\Service\VwSubcategoria');
        $intIdFromRoute = $this->params()->fromRoute('id', 0);
        $entity = $service->find($intIdFromRoute);

        if (!$entity) {
            return $this->redirect()->toRoute('cookbook', ['action' => 'ops']);
        }

        $arrEntityChilds = $this->getService('Cookbook\Service\VwPost')->findBy(['idSubcategoria' => $intIdFromRoute]);

        return new ViewModel(compact('entity', 'intIdFromRoute', 'arrEntityChilds'));
    }
}
