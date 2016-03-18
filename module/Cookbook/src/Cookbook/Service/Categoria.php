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

    /**
     * Funcao responsavel por recuperar dados de outra tabela para enviar a funcao de salvar
     *
     * @param array $data
     * @return bool|\Doctrine\Common\Proxy\Proxy|\Exception|null|object
     */
    public function save(Array $data = array())
    {
        $data['tipo'] = $this->em->getRepository('Cookbook\Entity\Tipo')
            ->find($data['tipo']);

        return parent::save($data);
    }
}
