<?php

namespace Cookbook\Controller;

use Zend\View\Model\ViewModel;
use Cookbook\Message\Message;

class TipoController extends AbstractController
{
    use Message;

    /**
     * IndexController constructor.
     */
    public function __construct()
    {
        $this->strControllerName = 'tipo';
        $this->strRoute = 'criar';
        $this->strServiceNamespace = 'Cookbook\Service\Tipo';
        $this->strEntityNamespace = 'Cookbook\Entity\Tipo';
        $this->strFormNamespace = 'Cookbook\Form\Tipo';
    }

    /**
     * Tela de boas vindas da documentacao
     *
     * @return ViewModel
     */
    public function indexAction()
    {
        $arrEntitys = $this->getService($this->strServiceNamespace)->findBy([]);

        return new ViewModel(compact('arrEntitys'));
    }

    public function visualizarAction()
    {
        $service = $this->getService('Cookbook\Service\VwTipo');
        $intIdFromRoute = $this->params()->fromRoute('id', 0);
        $entity = $service->find($intIdFromRoute);

        if (!$entity) {
            return $this->redirect()->toRoute('cookbook', ['action' => 'ops']);
        }

        $arrEntityChilds = $this->getService('Cookbook\Service\Categoria')->findBy(['tipo' => $intIdFromRoute]);

        return new ViewModel(compact('entity', 'intIdFromRoute', 'arrEntityChilds'));
    }
}
