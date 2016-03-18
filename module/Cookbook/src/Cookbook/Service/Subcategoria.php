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

    /**
     * Funcao responsavel por recuperar dados de outra tabela para enviar a funcao de salvar
     *
     * @param array $data
     * @return bool|\Doctrine\Common\Proxy\Proxy|\Exception|null|object
     */
    public function save(Array $data = array())
    {
        $data['categoria'] = $this->em->getRepository('Cookbook\Entity\Categoria')->find($data['categoria']);

        return parent::save($data);
    }
}
