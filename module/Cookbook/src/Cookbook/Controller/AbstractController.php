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
    /**
     * Traid para reuso de mensagens dentro do sistema
     */
    use Message;

    /**
     * @var string $strControllerName Nome do controller
     */
    protected $strControllerName;

    /**
     * @var string $strRoute Nome da rota
     */
    protected $strRoute;

    /**
     * @var string $strServiceNamespace Namespace do Service do controller
     */
    protected $strServiceNamespace;

    /**
     * @var string $strEntityNamespace Namespace da Entity do controller
     */
    protected $strEntityNamespace;

    /**
     * @var string $strFormNamespace Namespace do Form Default do controller
     */
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
     * Metodo Responsavel por mostrar pagina de erro
     *
     * @author Diego Campos <diego.campos@cast.com.br>
     * @since 31/05/2016
     * @name opsAction
     *
     * @return ViewModel
     */
    public function opsAction()
    {
        return new ViewModel();
    }

    /**
     * Metodo Responsavel por recuperar um formulario
     *
     * @author Diego Campos <diego.campos@cast.com.br>
     * @since 31/05/2016
     * @name getForm
     *
     * @param string|null $strFormNamespace
     *
     * @return array|object
     */
    public function getForm($strFormNamespace = null)
    {
        return $this->getServiceLocator()->get($strFormNamespace);
    }

    /**
     * Metodo Responsavel por carregar a view e adicionar um registro
     *
     * @author Diego Campos <diego.campos@cast.com.br>
     * @since 31/05/2016
     * @name adicionarAction
     *
     * @return \Zend\Http\Response|ViewModel
     */
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
                    var_dump($objException->getMessage());
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

    /**
     * Metodo Responsavel por view de editar e editar um registro
     *
     * @author Diego Campos <diego.campos@cast.com.br>
     * @since 31/05/2016
     * @name editarAction
     *
     * @return \Zend\Http\Response|ViewModel
     */
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
     * Metodo Responsavel por mostrar a view e deletar um registro
     *
     * @author Diego Campos <diego.campos@cast.com.br>
     * @since 31/05/2016
     * @name deletarAction
     *
     * @return \Zend\Http\Response
     */
    public function deletarAction()
    {
        $service = $this->getService($this->strServiceNamespace);
        $intIdFromRoute = $this->params()->fromRoute('id', 0);

        if ($service->deletar(array('id' => $intIdFromRoute))) {
            $this->flashMessenger()->addSuccessMessage($this->strMsgSDeletado);
        } else {
            $this->flashMessenger()->addErrorMessage($this->strMsgSNaoDeletado);
        }

        return $this->redirect()->toRoute(
            $this->strRoute,
            ['controller' => $this->strControllerName, 'action' => 'index']
        );
    }
}
