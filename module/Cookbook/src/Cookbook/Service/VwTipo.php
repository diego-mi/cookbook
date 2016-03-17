<?php
namespace Cookbook\Service;

use Doctrine\ORM\EntityManager;

class VwTipo extends AbstractService
{
    public function __construct(EntityManager $em)
    {
        $this->strEntityName = 'Cookbook\Entity\VwTipo';
        parent::__construct($em);
    }
}
