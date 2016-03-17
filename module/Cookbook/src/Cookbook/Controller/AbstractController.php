<?php
namespace Cookbook\Controller;

use Cookbook\Message\Message;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Class AbstractController
 * @package Base\Controller
 */
abstract class AbstractController extends AbstractActionController
{
    use Message;

    protected $strControllerName;
    protected $strRoute;
    protected $strServiceNamespace;
    protected $strEntityNamespace;
    protected $strFormNamespace;

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

    /**
     * Funcao responsavel por inicializar um form
     *
     * @param String|null $strFormNamespace
     * @return mixed
     */
    public function getForm($strFormNamespace = null)
    {
        return new $strFormNamespace;
    }

    public function adicionarAction()
    {
        $form = $this->getForm($this->strFormNamespace);
        $service = $this->getService($this->strServiceNamespace);
        $objRequest = $this->getRequest();

        if ($objRequest->isPost()) {
            $form->setData($objRequest->getPost());
            if ($form->isValid()) {
                try {
                    if ($service->save($form->getData())) {
                        $this->flashMessenger()->addSuccessMessage($this->strMsgSAdicionado);

                        return $this->redirect()->toRoute(
                            $this->strRoute,
                            ['controller' => $this->strControllerName, 'action' => 'index']
                        );
                    }
                } catch (\Exception $objException) {
                    $mixError = $objException->getMessage();
                    if (strpos($mixError, '23000')) {
                        $this->flashMessenger()->addErrorMessage($this->strMsgEUniqueKey);
                    } else {
                        $this->flashMessenger()->addErrorMessage($objException->getMessage());
                    }
                }
            }
        }

        return new ViewModel(compact('form'));
    }


    public function editarAction()
    {
        $form = $this->getForm($this->strFormNamespace);
        $service = $this->getService($this->strServiceNamespace);
        $objRequest = $this->getRequest();

        $intIdFromRoute = (int) $this->params()->fromRoute('id', 0);
        $entityForEdit = $service->find($intIdFromRoute);

        if (!$entityForEdit) {
            return $this->redirect()->toRoute('cookbook', ['action' => 'ops']);
        }

        if ($objRequest->isPost()) {
            $form->setData($objRequest->getPost());
            if ($form->isValid()) {
                try {
                    if ($service->save($form->getData())) {
                        $this->flashMessenger()->addSuccessMessage($this->strMsgSEdicao);

                        return $this->redirect()->toRoute(
                            $this->strRoute,
                            ['controller' => $this->strControllerName, 'action' => 'index']
                        );
                    }
                } catch (\Exception $objException) {
                    $mixError = $objException->getMessage();
                    if (strpos($mixError, '23000')) {
                        $this->flashMessenger()->addErrorMessage($this->strMsgEUniqueKey);
                    } else {
                        $this->flashMessenger()->addErrorMessage($objException->getMessage());
                    }
                }
            }
        } else {
            $form->setData($entityForEdit->toArray());
        }

        return new ViewModel(compact('form', 'intIdFromRoute'));
    }

    /**
     * Exclui um registro
     *
     * @return \Zend\Http\Response
     */
    public function deletarAction()
    {
        $service = $this->getService($this->strServiceNamespace);
        $intIdFromRoute = $this->params()->fromRoute('id', 0);

        if ($service->deletar(array('id' => $intIdFromRoute))) {
            $this->flashMessenger()->addSuccessMessage('Registro deletado com sucesso!');
        } else {
            $this->flashMessenger()->addErrorMessage('Não foi possivel deletar o registro!');
        }

        return $this->redirect()->toRoute(
            $this->strRoute,
            ['controller' => $this->strControllerName, 'action' => 'index']
        );
    }
}
