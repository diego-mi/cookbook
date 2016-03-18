<?php
namespace Cookbook\Controller;

use Zend\View\Model\ViewModel;
use Cookbook\Message\Message;

class CategoriaController extends AbstractController
{
    use Message;

    /**
     * IndexController constructor.
     */
    public function __construct()
    {
        $this->strControllerName = 'categoria';
        $this->strRoute = 'criar';
        $this->strServiceNamespace = 'Cookbook\Service\Categoria';
        $this->strEntityNamespace = 'Cookbook\Entity\Categoria';
        $this->strFormNamespace = 'Cookbook\Form\Categoria';
    }

    /**
     * Tela inicial de categoria listando todas
     *
     * @return ViewModel
     */
    public function indexAction()
    {
        $arrEntitys = $this->getService($this->strServiceNamespace)->findBy([]);

        return new ViewModel(compact('arrEntitys'));
    }

    /**
     * Metodo responsavel por carregar a visualizacao de categoria
     *
     * @return ViewModel
     */
    public function visualizarAction()
    {
        $service = $this->getService('Cookbook\Service\VwCategoria');
        $intIdFromRoute = $this->params()->fromRoute('id', 0);
        $entity = $service->find($intIdFromRoute);

        if (!$entity) {
            return $this->redirect()->toRoute('cookbook', ['action' => 'ops']);
        }

        $arrEntityChilds = $this->getService('Cookbook\Service\Subcategoria')->findBy(['categoria' => $intIdFromRoute]);

        return new ViewModel(compact('entity', 'intIdFromRoute', 'arrEntityChilds'));
    }
}
