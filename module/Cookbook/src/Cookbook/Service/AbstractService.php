<?php
namespace Cookbook\Service;

use Doctrine\ORM\EntityManager;

abstract class AbstractService
{
    protected $em;
    protected $entity;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @param string $strEntityNamespace
     * @return \Doctrine\ORM\EntityRepository
     */
    public function getRepository($strEntityNamespace = null)
    {
        return $this->em->getRepository($strEntityNamespace);
    }
}
