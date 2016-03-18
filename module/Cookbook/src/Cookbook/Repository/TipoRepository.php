<?php

namespace Cookbook\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * TipoRepository
 */
class TipoRepository extends EntityRepository
{
    public function fetchPairs()
    {
        $strAlias = 'tipo';

        $queryBuilder = $this->createQueryBuilder($strAlias);
        $queryBuilder->select([
            "{$strAlias}.id",
            "{$strAlias}.nome",
        ]);

        return $queryBuilder->getQuery()->getScalarResult();
    }
}
