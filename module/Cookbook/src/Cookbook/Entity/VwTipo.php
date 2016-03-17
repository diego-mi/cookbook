<?php

namespace Cookbook\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tipo
 *
 * @ORM\Table(name="vwtipo")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Cookbook\Repository\VwTipoRepository")
 */
class VwTipo extends AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_tipo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTipo;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao_tipo", type="string", length=100, nullable=false)
     */
    private $descricaoTipo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_criacao_tipo", type="datetime", nullable=false)
     */
    private $dataCriacaoTipo;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantidade_categoria", type="integer", length=100, nullable=false)
     */
    private $quantidadeCategoria;

    /**
     * @return int
     */
    public function getIdTipo()
    {
        return $this->idTipo;
    }

    /**
     * @param int $id
     *
     * @return Tipo
     */
    public function setId($idTipo)
    {
        $this->idTipo = $idTipo;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescricaoTipo()
    {
        return $this->descricaoTipo;
    }

    /**
     * @param string $descricao
     *
     * @return Tipo
     */
    public function setDescricao($descricaoTipo)
    {
        $this->descricaoTipo = $descricaoTipo;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDataCriacaoTipo()
    {
        if (is_string($this->dataCriacaoTipo)) {
            return $this->dataCriacaoTipo;
        }

        return $this->dataCriacaoTipo->format('d/m/Y h:i:s');
    }

    /**
     * @param \DateTime $dataCriacao
     *
     * @return Tipo
     */
    public function setDataCriacao($dataCriacaoTipo)
    {
        $this->dataCriacaoTipo = $dataCriacaoTipo;

        return $this;
    }

    /**
     * @return int
     */
    public function getQuantidadeCategoria()
    {
        return $this->quantidadeCategoria;
    }

    /**
     * @param int $quantidadeCategoria
     * @return Tipo
     */
    public function setQuantidadeCategoria($quantidadeCategoria)
    {
        $this->quantidadeCategoria = $quantidadeCategoria;

        return $this;
    }
}
