<?php
namespace Cookbook\Service;

use Doctrine\DBAL\ConnectionException;
use Doctrine\ORM\EntityManager;
use Zend\Di\ServiceLocator;
use Zend\Stdlib\Hydrator\ClassMethods;

abstract class AbstractService
{
    /**
     * @var EntityManager $em EntityManeger do ORM
     */
    protected $em;

    /**
     * @var string $strEntityName Nome da entidade a ser usada
     */
    protected $strEntityName;

    /**
     * AbstractService constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * Metodo Responsavel por recuperar um Service
     *
     * @author Diego Campos <diego.campos@cast.com.br>
     * @since 31/05/2016
     * @name getService
     *
     * @param string|null $strServiceNamespace
     *
     * @return array|object
     */
    public function getService($strServiceNamespace = null)
    {
        $sm = ServiceLocatorFactory::getInstance();

        return $sm->get($strServiceNamespace);
    }

    /**
     * Metodo Responsavel por recuperar a repository atraves do nome da entity
     * forcando que cada service invoque apenas a sua propria entidade
     *
     * @author Diego Campos <diego.campos@cast.com.br>
     * @since 31/05/2016
     * @name getRepository
     *
     * @return \Doctrine\ORM\EntityRepository
     */
    public function getRepository()
    {
        return $this->em->getRepository($this->strEntityName);
    }

    /**
     * Metodo Responsavel por encontrar registros atraves de criterios, ordenacao, limite e inicio
     *
     * @author Diego Campos <diego.campos@cast.com.br>
     * @since phpDocDate
     * @name findBy
     *
     * @param array $arrCriteria
     * @param array|null $arrOrderBy
     * @param integer|null $intLimit
     * @param integer|null $intOffset
     *
     * @return array
     */
    public function findBy(array $arrCriteria, $arrOrderBy = null, $intLimit = null, $intOffset = null)
    {
        return $this->getRepository()->findBy($arrCriteria, $arrOrderBy, $intLimit, $intOffset);
    }

    /**
     * Metodo Responsavel por encontrar um registro atraves do id do registro
     *
     * @author Diego Campos <diego.campos@cast.com.br>
     * @since 31/05/2016
     * @name find
     *
     * @param integer $intId
     *
     * @return null|object
     */
    public function find($intId)
    {
        return $this->getRepository()->find($intId);
    }

    /**
     * Metodo Responsavel por encontrar apenas um registro
     *
     * @author Diego Campos <diego.campos@cast.com.br>
     * @since 31/05/2016
     * @name findOneBy
     *
     * @param array $arrCriteria
     * @param array $arrOrderBy
     *
     * @return null|object
     */
    public function findOneBy($arrCriteria = [], $arrOrderBy = [])
    {
        return $this->getRepository()->findOneBy($arrCriteria, $arrOrderBy);
    }

    /**
     * Metodo Responsavel por salvar um registro atraves de um array
     *
     * @author Diego Campos <diego.campos@cast.com.br>
     * @since 31/05/2016
     * @name save
     *
     * @param array $arrData
     *
     * @return bool|ConnectionException|\Exception
     * @throws \Doctrine\ORM\ORMException
     */
    public function save(array $arrData = [])
    {
        try {
            if ((isset($arrData['id'])) && ($arrData['id'] != '')) {
                $entity = $this->em->getReference($this->strEntityName, $arrData['id']);

                $hydrator = new ClassMethods();
                $hydrator->hydrate($arrData, $entity);

            } else {
                $entity = new $this->strEntityName($arrData);
            }

            $this->em->persist($entity);
            $this->em->flush();

            if ($entity->getId()) {
                return true;
            }

            return false;
        } catch (ConnectionException $objError) {
            var_dump($objError);
            return $objError;
        }
    }

    /**
     * Metodo Responsavel por deletar um registro
     *
     * @author Diego Campos <diego.campos@cast.com.br>
     * @since 31/05/2016
     * @name deletar
     *
     * @param array $arrData
     * @return \Exception|null|object
     */
    public function deletar(array $arrData = [])
    {
        try {
            $entity = $this->getRepository()->findOneBy($arrData);

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
