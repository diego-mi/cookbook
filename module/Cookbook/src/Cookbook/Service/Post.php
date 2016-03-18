<?php
namespace Cookbook\Service;

use Doctrine\ORM\EntityManager;

class Post extends AbstractService
{
    public function __construct(EntityManager $em)
    {
        $this->strEntityName = 'Cookbook\Entity\Post';
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
        $data['subcategoria'] = $this->em->getRepository('Cookbook\Entity\Subcategoria')
            ->find($data['subcategoria']);
        $data['user'] = $this->em->getRepository('Cookbook\Entity\User')
            ->find(1);

        return parent::save($data);
    }
}
