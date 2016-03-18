<?php
namespace Cookbook\Service;

use Doctrine\ORM\EntityManager;

class VwCategoria extends AbstractService
{
    public function __construct(EntityManager $em)
    {
        $this->strEntityName = 'Cookbook\Entity\VwCategoria';
        parent::__construct($em);
    }
}
