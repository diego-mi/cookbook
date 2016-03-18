<?php

namespace Cookbook\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categoria
 *
 * @ORM\Table(name="vwcategoria")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Cookbook\Repository\VwCategoriaRepository")
 */
class VwCategoria extends AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_categoria", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCategoria;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_categoria", type="string", length=100, nullable=false)
     */
    private $nomeCategoria;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao_categoria", type="string", length=100, nullable=false)
     */
    private $descricaoCategoria;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_criacao_categoria", type="datetime", nullable=false)
     */
    private $dataCriacaoCategoria;

    /**
     * @var integer
     *
     * @ORM\Column(name="qt_subcategoria", type="integer", length=100, nullable=false)
     */
    private $qtSubcategoria;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_tipo", type="integer", nullable=false)
     */
    private $idTipo;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_tipo", type="string", length=100, nullable=false)
     */
    private $nomeTipo;

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
     * @return $this
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
     * @return $this
     */
    public function setNomeCategoria($nomeCategoria)
    {
        $this->nomeCategoria = $nomeCategoria;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescricaoCategoria()
    {
        return $this->descricaoCategoria;
    }

    /**
     * @param string $descricaoCategoria
     *
     * @return $this
     */
    public function setDescricaoCategoria($descricaoCategoria)
    {
        $this->descricaoCategoria = $descricaoCategoria;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDataCriacaoCategoria()
    {
        if (is_string($this->dataCriacaoCategoria)) {
            return $this->dataCriacaoCategoria;
        }

        return $this->dataCriacaoCategoria->format('d/m/Y h:i:s');
    }

    /**
     * @param \DateTime $dataCriacaoCategoria
     *
     * @return $this
     */
    public function setDataCriacaoCategoria($dataCriacaoCategoria)
    {
        $this->dataCriacaoCategoria = $dataCriacaoCategoria;

        return $this;
    }

    /**
     * @return int
     */
    public function getQtSubcategoria()
    {
        return $this->qtSubcategoria;
    }

    /**
     * @param int $qtSubcategoria
     *
     * @return $this
     */
    public function setQtSubcategoria($qtSubcategoria)
    {
        $this->qtSubcategoria = $qtSubcategoria;

        return $this;
    }

    /**
     * @return int
     */
    public function getIdTipo()
    {
        return $this->idTipo;
    }

    /**
     * @param int $idTipo
     *
     * @return $this
     */
    public function setIdTipo($idTipo)
    {
        $this->idTipo = $idTipo;

        return $this;
    }

    /**
     * @return string
     */
    public function getNomeTipo()
    {
        return $this->nomeTipo;
    }

    /**
     * @param string $nomeTipo
     *
     * @return $this
     */
    public function setNomeTipo($nomeTipo)
    {
        $this->nomeTipo = $nomeTipo;

        return $this;
    }
}
