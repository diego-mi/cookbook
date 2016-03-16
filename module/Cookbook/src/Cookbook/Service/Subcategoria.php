<?php
namespace Cookbook\Service;

use Doctrine\ORM\EntityManager;

class Subcategoria extends AbstractService
{
    public function __construct(EntityManager $em)
    {
        $this->strEntityName = 'Cookbook\Entity\Subcategoria';
        parent::__construct($em);
    }
}
