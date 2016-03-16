<?php
namespace Cookbook\Controller;

use Doctrine\DBAL\Schema\View;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

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

    /**
     * Action responsavel por mostrar a pagina de 'ops'
     */
    public function opsAction()
    {
        return new ViewModel();
    }
}
