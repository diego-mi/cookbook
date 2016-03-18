<?php
namespace Cookbook\Form;

use Cookbook\Service\ServiceLocatorFactory;
use Doctrine\Common\Persistence\ObjectManager;
use Zend\Form\Form;

class AbstractForm extends Form
{

    protected $objectManager;

//    public function __construct(ObjectManager $objectManager)
//    {
//        parent::__construct(null);
//        $this->setObjectManager($objectManager);
//    }

    public function getService($strServiceNamespace = null)
    {
        $sm = ServiceLocatorFactory::getInstance();

        return $sm->get($strServiceNamespace);
    }

    /**
     * Set the object manager
     *
     * @param ObjectManager $objectManager
     */
    public function setObjectManager(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    /**
     * Get the object manager
     *
     * @return ObjectManager
     */
    public function getObjectManager()
    {
        return $this->objectManager;
    }
}
