<?php

namespace Cookbook\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Post
 *
 * @ORM\Table(name="vwpost")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Cookbook\Repository\VwPostRepository")
 */
class VwPost extends AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_post", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPost;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=100, nullable=false)
     */
    private $descricao;

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
     * @var integer
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     */
    private $idUser;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_user", type="string", length=100, nullable=false)
     */
    private $nomeUser;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_subcategoria", type="integer", nullable=false)
     */
    private $idSubcategoria;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao_subcategoria", type="string", length=100, nullable=false)
     */
    private $descricaoSubcategoria;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_categoria", type="integer", nullable=false)
     */
    private $idCategoria;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao_categoria", type="string", length=100, nullable=false)
     */
    private $descricaoCategoria;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_tipo", type="integer", nullable=false)
     */
    private $idTipo;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao_tipo", type="string", length=100, nullable=false)
     */
    private $descricaoTipo;

    /**
     * @return int
     */
    public function getIdPost()
    {
        return $this->idPost;
    }

    /**
     * @param int $idPost
     *
     * @return VwPost
     */
    public function setIdPost($idPost)
    {
        $this->idPost = $idPost;

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
     * @return VwPost
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

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
     * @return VwPost
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
        return $this->dataCriacao->format('d/m/Y h:i:s');
    }

    /**
     * @param \DateTime $dataCriacao
     *
     * @return VwPost
     */
    public function setDataCriacao($dataCriacao)
    {
        $this->dataCriacao = $dataCriacao;

        return $this;
    }

    /**
     * @return int
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param int $idUser
     *
     * @return VwPost
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * @return string
     */
    public function getNomeUser()
    {
        return $this->nomeUser;
    }

    /**
     * @param string $nomeUser
     *
     * @return VwPost
     */
    public function setNomeUser($nomeUser)
    {
        $this->nomeUser = $nomeUser;

        return $this;
    }

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
     * @return VwPost
     */
    public function setIdSubcategoria($idSubcategoria)
    {
        $this->idSubcategoria = $idSubcategoria;

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
     * @return VwPost
     */
    public function setDescricaoSubcategoria($descricaoSubcategoria)
    {
        $this->descricaoSubcategoria = $descricaoSubcategoria;

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
     * @return VwPost
     */
    public function setIdCategoria($idCategoria)
    {
        $this->idCategoria = $idCategoria;

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
     * @return VwPost
     */
    public function setDescricaoCategoria($descricaoCategoria)
    {
        $this->descricaoCategoria = $descricaoCategoria;

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
     * @return VwPost
     */
    public function setIdTipo($idTipo)
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
     * @param string $descricaoTipo
     *
     * @return VwPost
     */
    public function setDescricaoTipo($descricaoTipo)
    {
        $this->descricaoTipo = $descricaoTipo;

        return $this;
    }
}
