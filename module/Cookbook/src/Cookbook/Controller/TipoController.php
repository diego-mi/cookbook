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

class TipoController extends AbstractController
{
    /**
     * Tela de boas vindas da documentacao
     *
     * @return ViewModel
     */
    public function indexAction()
    {
        $arrTipos = $this->getService('Cookbook\Service\Tipo')->findBy([]);

        return new ViewModel(compact('arrTipos'));
    }

    public function adicionarAction()
    {
        $form = $this->getServiceLocator()->get('Cookbook\Form\Tipo');

        return new ViewModel(compact('form'));
    }

    public function adicionarPostAction()
    {

    }

    public function editarAction()
    {
        $form = $this->getServiceLocator()->get('Cookbook\Form\Tipo');

        return new ViewModel(compact('form'));
    }

    public function editarPostAction()
    {

    }
}
