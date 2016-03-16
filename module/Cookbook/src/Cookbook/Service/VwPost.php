<?php
namespace Cookbook\Service;

use Doctrine\ORM\EntityManager;

class VwPost extends AbstractService
{
    public function __construct(EntityManager $em)
    {
        $this->strEntityName = 'Cookbook\Entity\VwPost';
        parent::__construct($em);
    }
}
