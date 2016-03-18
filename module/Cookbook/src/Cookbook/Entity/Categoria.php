<?php

namespace Cookbook\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categoria
 *
 * @ORM\Table(name="categoria", uniqueConstraints={@ORM\UniqueConstraint(name="descricao", columns={"descricao"})}, indexes={@ORM\Index(name="tipo_id", columns={"tipo_id"})})
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Cookbook\Repository\CategoriaRepository")
 */
class Categoria extends AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", nullable=false)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=100, nullable=false)
     */
    private $descricao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_criacao", type="datetime", nullable=false)
     */
    private $dataCriacao;

    /**
     * @var Tipo
     *
     * @ORM\ManyToOne(targetEntity="Cookbook\Entity\Tipo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipo_id", referencedColumnName="id")
     * })
     */
    private $tipo;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return Categoria
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     *
     * @return Categoria
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param string $descricao
     *
     * @return Categoria
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDataCriacao()
    {
        if (is_string($this->dataCriacao)) {
            return $this->dataCriacao;
        }

        return $this->dataCriacao->format('d/m/Y h:i:s');
    }

    /**
     * @param \DateTime $dataCriacao
     *
     * @return Categoria
     */
    public function setDataCriacao($dataCriacao)
    {
        $this->dataCriacao = $dataCriacao;

        return $this;
    }

    /**
     * @return Tipo
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param Tipo $tipo
     *
     * @return Categoria
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

}
