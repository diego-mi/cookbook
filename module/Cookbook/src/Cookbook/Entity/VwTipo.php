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
     * @ORM\Column(name="nome_tipo", type="string", length=100, nullable=false)
     */
    private $nomeTipo;

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
     * @ORM\Column(name="qt_categoria", type="integer", length=100, nullable=false)
     */
    private $qtCategoria;

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
     * @return VwTipo
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
     * @return VwTipo
     */
    public function setNomeTipo($nomeTipo)
    {
        $this->nomeTipo = $nomeTipo;

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
     * @param string $descricaoTipo
     *
     * @return VwTipo
     */
    public function setDescricaoTipo($descricaoTipo)
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
     * @param \DateTime $dataCriacaoTipo
     *
     * @return VwTipo
     */
    public function setDataCriacaoTipo($dataCriacaoTipo)
    {
        $this->dataCriacaoTipo = $dataCriacaoTipo;

        return $this;
    }

    /**
     * @return int
     */
    public function getQtCategoria()
    {
        return $this->qtCategoria;
    }

    /**
     * @param int $qtCategoria
     * @return VwTipo
     */
    public function setQtCategoria($qtCategoria)
    {
        $this->qtCategoria = $qtCategoria;

        return $this;
    }
}
