<?php
namespace Cookbook\Service;

use Doctrine\ORM\EntityManager;

class VwSubcategoria extends AbstractService
{
    public function __construct(EntityManager $em)
    {
        $this->strEntityName = 'Cookbook\Entity\VwSubcategoria';
        parent::__construct($em);
    }
}
