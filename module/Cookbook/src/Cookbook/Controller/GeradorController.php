<?php
namespace Cookbook\Controller;

use Zend\View\Model\ViewModel;
use Cookbook\Message\Message;

class GeradorController extends AbstractController
{
    use Message;

    /**
     * IndexController constructor.
     */
    public function __construct()
    {
        $this->strControllerName = 'gerador';
        $this->strRoute = 'gerador';
        $this->strServiceNamespace = 'Cookbook\Service\Gerador';
        $this->strEntityNamespace = 'Cookbook\Entity\Gerador';
        $this->strFormNamespace = 'Cookbook\Form\Gerador';
    }

    /**
     * Tela inicial
     *
     * @return ViewModel
     */
    public function indexAction()
    {
        $form = $this->getForm($this->strFormNamespace);
        $arrBreadcrumb = [
            'tituloPagina' => 'Escolher postagens',
            'segmentos' => [
                [
                    'link' => false,
                    'text' => 'Criar'
                ]
            ]
        ];


        $objRequest = $this->getRequest();

        if ($objRequest->isPost()) {
            $form->setData($objRequest->getPost());
            if ($form->isValid()) {
                $service = $this->getService($this->strServiceNamespace);
                return $service->gerarArquivo($form->getData());
            }
        }

        return new ViewModel(compact('form', 'arrBreadcrumb'));
    }
}
