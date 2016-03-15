<?php
namespace Cookbook\Service;

use Doctrine\ORM\EntityManager;

class Cookbook extends AbstractService
{
    public function __construct(EntityManager $em)
    {
        parent::__construct($em);
    }
}
