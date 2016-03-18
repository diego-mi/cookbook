<?php
namespace Cookbook;

use Cookbook\Service\Categoria;
use Cookbook\Form\Categoria as CategoriaForm;
use Cookbook\Service\Cookbook;
use Cookbook\Service\Subcategoria;
use Cookbook\Service\Tipo;
use Cookbook\Form\Tipo as TipoForm;
use Cookbook\Service\VwTipo;
use Cookbook\Service\VwPost;
use Cookbook\Service\ServiceLocatorFactory;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        ServiceLocatorFactory::setInstance($e->getApplication()->getServiceManager());
        $eventManager = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();

        #codigo para dados dinamicos para o layout
        $myServiceManager = $e->getApplication()->getServiceManager();
        $viewModel = $e->getApplication()->getMvcEvent()->getViewModel();
        $myService = $myServiceManager->get('Cookbook\Service\Tipo');
        $viewModel->arrMenu = $myService->getMenu();

        $moduleRouteListener->attach($eventManager);
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Cookbook\Service\Cookbook' => function ($em) {
                    return new Cookbook($em->get('Doctrine\ORM\EntityManager'));
                },
                'Cookbook\Service\VwPost' => function ($em) {
                    return new VwPost($em->get('Doctrine\ORM\EntityManager'));
                },
                'Cookbook\Service\Tipo' => function ($em) {
                    return new Tipo($em->get('Doctrine\ORM\EntityManager'));
                },
                'Cookbook\Service\VwTipo' => function ($em) {
                    return new VwTipo($em->get('Doctrine\ORM\EntityManager'));
                },
                'Cookbook\Service\Categoria' => function ($em) {
                    return new Categoria($em->get('Doctrine\ORM\EntityManager'));
                },
                'Cookbook\Service\Subcategoria' => function ($em) {
                    return new Subcategoria($em->get('Doctrine\ORM\EntityManager'));
                },
                'Cookbook\Form\Categoria' => function ($em) {
                    return new CategoriaForm($em->get('Doctrine\ORM\EntityManager'));
                },
                'Cookbook\Form\Tipo' => function ($em) {
                    return new TipoForm($em->get('Doctrine\ORM\EntityManager'));
                }
            )
        );
    }
}
