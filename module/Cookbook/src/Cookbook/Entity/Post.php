<?php

namespace Cookbook\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Post
 *
 * @ORM\Table(name="post", uniqueConstraints={@ORM\UniqueConstraint(name="titulo", columns={"titulo"})}, indexes={@ORM\Index(name="subcategoria_id", columns={"subcategoria_id"}), @ORM\Index(name="user_id", columns={"user_id"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Cookbook\Repository\PostRepository")
 */
class Post extends AbstractEntity
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
     * @ORM\Column(name="titulo", type="string", length=100, nullable=false)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="conteudo", type="text", nullable=false)
     */
    private $conteudo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_criacao", type="datetime", nullable=false)
     */
    private $dataCriacao;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo", type="text", nullable=false)
     */
    private $codigo;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="Cookbook\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var Subcategoria
     *
     * @ORM\ManyToOne(targetEntity="Cookbook\Entity\Subcategoria")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="subcategoria_id", referencedColumnName="id")
     * })
     */
    private $subcategoria;

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
     * @return Post
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @param string $titulo
     *
     * @return Post
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * @return string
     */
    public function getConteudo()
    {
        return $this->conteudo;
    }

    /**
     * @param string $conteudo
     *
     * @return Post
     */
    public function setConteudo($conteudo)
    {
        $this->conteudo = $conteudo;

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
     * @return Post
     */
    public function setDataCriacao($dataCriacao)
    {
        $this->dataCriacao = $dataCriacao;

        return $this;
    }


    /**
     * @return string
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * @param string $codigo
     *
     * @return Post
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     *
     * @return Post
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Subcategoria
     */
    public function getSubcategoria()
    {
        return $this->subcategoria;
    }

    /**
     * @param Subcategoria $subcategoria
     *
     * @return Post
     */
    public function setSubcategoria($subcategoria)
    {
        $this->subcategoria = $subcategoria;

        return $this;
    }
}
