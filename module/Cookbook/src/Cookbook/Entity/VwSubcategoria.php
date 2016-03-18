<?php

namespace Cookbook\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categoria
 *
 * @ORM\Table(name="vwsubcategoria")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Cookbook\Repository\VwSubcategoriaRepository")
 */
class VwSubcategoria extends AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_subcategoria", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSubcategoria;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_subcategoria", type="string", length=100, nullable=false)
     */
    private $nomeSubcategoria;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao_subcategoria", type="string", length=100, nullable=false)
     */
    private $descricaoSubcategoria;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_criacao_subcategoria", type="datetime", nullable=false)
     */
    private $dataCriacaoSubcategoria;

    /**
     * @var integer
     *
     * @ORM\Column(name="qt_post", type="integer", length=100, nullable=false)
     */
    private $qtPost;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_categoria", type="integer", nullable=false)
     */
    private $idCategoria;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_categoria", type="string", length=100, nullable=false)
     */
    private $nomeCategoria;

    /**
     * @return int
     */
    public function getIdSubcategoria()
    {
        return $this->idSubcategoria;
    }

    /**
     * @param int $idSubcategoria
     *
     * @return VwSubcategoria
     */
    public function setIdSubcategoria($idSubcategoria)
    {
        $this->idSubcategoria = $idSubcategoria;

        return $this;
    }

    /**
     * @return string
     */
    public function getNomeSubcategoria()
    {
        return $this->nomeSubcategoria;
    }

    /**
     * @param string $nomeSubcategoria
     *
     * @return VwSubcategoria
     */
    public function setNomeSubcategoria($nomeSubcategoria)
    {
        $this->nomeSubcategoria = $nomeSubcategoria;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescricaoSubcategoria()
    {
        return $this->descricaoSubcategoria;
    }

    /**
     * @param string $descricaoSubcategoria
     *
     * @return VwSubcategoria
     */
    public function setDescricaoSubcategoria($descricaoSubcategoria)
    {
        $this->descricaoSubcategoria = $descricaoSubcategoria;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDataCriacaoSubcategoria()
    {
        if (is_string($this->dataCriacaoSubcategoria)) {
            return $this->dataCriacaoSubcategoria;
        }

        return $this->dataCriacaoSubcategoria->format('d/m/Y h:i:s');
    }

    /**
     * @param \DateTime $dataCriacaoSubcategoria
     *
     * @return VwSubcategoria
     */
    public function setDataCriacaoSubcategoria($dataCriacaoSubcategoria)
    {
        $this->dataCriacaoSubcategoria = $dataCriacaoSubcategoria;

        return $this;
    }

    /**
     * @return int
     */
    public function getQtPost()
    {
        return $this->qtPost;
    }

    /**
     * @param int $qtPost
     *
     * @return VwSubcategoria
     */
    public function setQtPost($qtPost)
    {
        $this->qtPost = $qtPost;

        return $this;
    }

    /**
     * @return int
     */
    public function getIdCategoria()
    {
        return $this->idCategoria;
    }

    /**
     * @param int $idCategoria
     *
     * @return VwSubcategoria
     */
    public function setIdCategoria($idCategoria)
    {
        $this->idCategoria = $idCategoria;

        return $this;
    }

    /**
     * @return string
     */
    public function getNomeCategoria()
    {
        return $this->nomeCategoria;
    }

    /**
     * @param string $nomeCategoria
     *
     * @return VwSubcategoria
     */
    public function setNomeCategoria($nomeCategoria)
    {
        $this->nomeCategoria = $nomeCategoria;

        return $this;
    }
}
