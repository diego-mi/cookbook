<?php
namespace Cookbook\Service;

use Doctrine\ORM\EntityManager;
use Zend\Di\ServiceLocator;
use Zend\Stdlib\Hydrator\ClassMethods;

abstract class AbstractService
{
    protected $em;
    protected $strEntityName;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * Metodo responsavel por iniciar um service atraves do seu namespace
     *
     * @param string $strServiceNamespace Namespace do service a ser iniciado
     * @return array|object
     */
    public function getService($strServiceNamespace = null)
    {
        $sm = ServiceLocatorFactory::getInstance();

        return $sm->get($strServiceNamespace);
    }

    /**
     * Metodo responsavel por recuperar a repository correspondente ao service, utilizando o namespace
     * da entity setada no construtor do service
     *
     * @return \Doctrine\ORM\EntityRepository
     */
    public function getRepository()
    {
        return $this->em->getRepository($this->strEntityName);
    }

    /**
     * @param $arrCriterios
     * @param null $arrOrdenacao
     * @param null $intLimite
     * @param null $intOffset
     *
     * @return array
     */
    public function findBy($arrCriterios, $arrOrdenacao = null, $intLimite = null, $intOffset = null)
    {
        return $this->getRepository()->findBy($arrCriterios, $arrOrdenacao, $intLimite, $intOffset);
    }

    /**
     * @param $intId
     * @return null|object
     */
    public function find($intId)
    {
        return $this->getRepository()->find($intId);
    }

    /**
     * @param array $data
     * @return bool|\Doctrine\Common\Proxy\Proxy|\Exception|null|object
     */
    public function save(Array $data = array())
    {
        try {
            if ((isset($data['id'])) && ($data['id'] != '')) {
                $entity = $this->em->getReference($this->strEntityName, $data['id']);

                $hydrator = new ClassMethods();
                $hydrator->hydrate($data, $entity);

            } else {
                $entity = new $this->strEntityName($data);
            }

            $this->em->persist($entity);
            $this->em->flush();

            if ($entity->getId()) {
                return true;
            }

            return false;
        } catch (\Doctrine\DBAL\ConnectionException $objError) {
            var_dump($objError);
            return $objError;
        }
    }

    public function deletar(Array $data = array())
    {
        try {
            $entity = $this->getRepository()->findOneBy($data);

            if ($entity) {
                $this->em->remove($entity);
                $this->em->flush();

                return $entity;
            } else {
                throw new \RuntimeException(
                    'Não foi encontrado registro para remover.'
                );
            }
        } catch (\Exception $objError) {
            return $objError;
        }
    }
}
