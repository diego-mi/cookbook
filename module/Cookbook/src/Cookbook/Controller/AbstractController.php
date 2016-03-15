<?php
namespace Cookbook\Controller;

use Zend\Mvc\Controller\AbstractActionController;

/**
 * Class AbstractController
 * @package Base\Controller
 */
abstract class AbstractController extends AbstractActionController
{
    /**
     * Inicializar Service
     *
     * @param String $strServiceNamespace Namespace do service a ser carregado
     *
     * @return object
     */
    public function getService($strServiceNamespace = null)
    {
        return $this->getServiceLocator()->get($strServiceNamespace);
    }
}
