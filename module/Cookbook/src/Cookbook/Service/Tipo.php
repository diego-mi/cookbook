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

    public function getMenu()
    {
        $arrTipos = $this->findBy([]);

        $arrMenu = [];

        for ($i = 0; $i <= count($arrTipos); $i++) {
            if (!is_null($arrTipos[$i])) {
                $arrTipo = $arrTipos[$i]->toArray();

                $arrMenu[$i] = ['infos' => $arrTipo];
                $arrMenu[$i]['arrCategoria'] = $this->getCategorias($arrTipo['id']);
            }
        }

        return $arrMenu;
    }

    public function getCategorias($intIdTipo)
    {
        #recupera o service
        $serviceCategoria = $this->getService('Cookbook\Service\Categoria');
        #recupera todas as categorias
        $arrCategorias = $serviceCategoria->findBy(['tipo' => $intIdTipo]);
        $arrCategoriaMenu = [];

        for ($i = 0; $i <= count($arrCategorias); $i++) {
            if (!is_null($arrCategorias[$i])) {
                $arrCategoria = $arrCategorias[$i]->toArray();
                $arrCategoriaMenu[$i] = ['infos' => $arrCategoria];
                $arrCategoriaMenu[$i]['arrSubcategoria'] = $this->getSubcategorias($arrCategoria['id']);
            }
        }

        return $arrCategoriaMenu;
    }

    public function getSubcategorias($intIdCategoria)
    {
        #recupera o service
        $serviceSubategoria = $this->getService('Cookbook\Service\Subcategoria');
        #recupera todas as categorias
        $arrSubcategorias = $serviceSubategoria->findBy(['categoria' => $intIdCategoria]);
        $arrSubategoriaMenu = [];
        for ($i = 0; $i <= count($arrSubcategorias); $i++) {
            if (!is_null($arrSubcategorias[$i])) {
                $arrSubcategoria = $arrSubcategorias[$i]->toArray();
                $arrSubategoriaMenu[$i] = ['infos' => $arrSubcategoria];
            }
        }

        return $arrSubategoriaMenu;
    }
}
