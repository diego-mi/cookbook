<?php
namespace Cookbook\Service;

use Doctrine\ORM\EntityManager;

class Categoria extends AbstractService
{
    public function __construct(EntityManager $em)
    {
        $this->strEntityName = 'Cookbook\Entity\Categoria';
        parent::__construct($em);
    }
}
