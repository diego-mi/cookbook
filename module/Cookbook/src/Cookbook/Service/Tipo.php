<?php
namespace Cookbook\Service;

use Doctrine\ORM\EntityManager;

class Tipo extends AbstractService
{
    public function __construct(EntityManager $em)
    {
        $this->strEntityName = 'Cookbook\Entity\Tipo';
        parent::__construct($em);
    }

    /**
     * Metodo Responsavel por criar o menu principal
     *
     * @author Diego Campos <diego.campos@cast.com.br>
     * @since 31/05/2016
     * @name getMenu
     *
     * @return array
     */
    public function getMenu()
    {
        $arrTipos = $this->findBy([]);
        $arrMenu = [];
        $intCounter = 0;
        foreach ($arrTipos as $tipo) {
            $arrMenu[$intCounter] = ['infos' => $tipo->toArray()];
            $arrMenu[$intCounter]['arrCategoria'] = $this->getCategorias($tipo->getId());
            $intCounter++;
        }

        return $arrMenu;
    }

    /**
     * Metodo Responsavel por recuperar as categorias
     *
     * @author Diego Campos <diego.campos@cast.com.br>
     * @since 31/05/2016
     * @name getCategorias
     *
     * @param integer $intIdTipo
     * @return array
     */
    public function getCategorias($intIdTipo)
    {
        $arrCategorias = $this->getService('Cookbook\Service\Categoria')->findBy(['tipo' => $intIdTipo]);
        $arrCategoriaMenu = [];
        $intCounter = 0;
        foreach ($arrCategorias as $categoria) {
            $arrCategoriaMenu[$intCounter] = ['infos' => $categoria->toArray()];
            $arrCategoriaMenu[$intCounter]['arrSubcategoria'] = $this->getSubcategorias($categoria->getId());
            $intCounter++;
        }

        return $arrCategoriaMenu;
    }

    /**
     * Metodo Responsavel por recuperar as subcategorias de uma categoria
     *
     * @author Diego Campos <diego.campos@cast.com.br>
     * @since 31/05/2016
     * @name getSubcategorias
     *
     * @param integer $intIdCategoria
     *
     * @return array
     */
    public function getSubcategorias($intIdCategoria)
    {
        $arrSubcategorias = $this->getService('Cookbook\Service\Subcategoria')->findBy(['categoria' => $intIdCategoria]);
        $arrSubategoriaMenu = [];
        $intCounter = 0;
        foreach ($arrSubcategorias as $subcategoria) {
            $arrSubategoriaMenu[$intCounter] = ['infos' => $subcategoria->toArray()];
            $intCounter++;
        }

        return $arrSubategoriaMenu;
    }

    public function fetchPairs()
    {
        $arrTipos = $this->getRepository()->fetchPairs();
        $arrPairs = [];

        foreach ($arrTipos as $arrTipo) {
            $arrPairs[$arrTipo['id']] = $arrTipo['nome'];
        }
        return $arrPairs;
    }
}
