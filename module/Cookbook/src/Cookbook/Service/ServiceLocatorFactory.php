<?php
namespace Cookbook\Service;

use Zend\ServiceManager\ServiceManager;

class ServiceLocatorFactory
{
    /**
     * @var ServiceManager
     */
    private static $serviceManager = null;

    /**
     * Disable constructor
     */
    private function __construct()
    {
    }

    /**
     */
    public static function getInstance()
    {
        return self::$serviceManager;
    }

    /**
     * @param ServiceManager $sm
     */
    public static function setInstance(ServiceManager $sm)
    {
        self::$serviceManager = $sm;
    }
}
