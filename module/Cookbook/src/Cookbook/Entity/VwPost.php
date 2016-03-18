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
     * @ORM\Column(name="titulo_post", type="string", length=100, nullable=false)
     */
    private $tituloPost;

    /**
     * @var string
     *
     * @ORM\Column(name="conteudo_post", type="text", nullable=false)
     */
    private $conteudoPost;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo_post", type="text", nullable=false)
     */
    private $codigoPost;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_criacao_post", type="datetime", nullable=false)
     */
    private $dataCriacaoPost;

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
    public function getTituloPost()
    {
        return $this->tituloPost;
    }

    /**
     * @param string $tituloPost
     *
     * @return VwPost
     */
    public function setTituloPost($tituloPost)
    {
        $this->tituloPost = $tituloPost;

        return $this;
    }

    /**
     * @return string
     */
    public function getConteudoPost()
    {
        return $this->conteudoPost;
    }

    /**
     * @param string $conteudoPost
     *
     * @return VwPost
     */
    public function setConteudoPost($conteudoPost)
    {
        $this->conteudoPost = $conteudoPost;

        return $this;
    }


    /**
     * @return string
     */
    public function getCodigoPost()
    {
        return $this->codigoPost;
    }

    /**
     * @param string $codigoPost
     *
     * @return VwPost
     */
    public function setCodigoPost($codigoPost)
    {
        $this->codigoPost = $codigoPost;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDataCriacaoPost()
    {
        return $this->dataCriacaoPost->format('d/m/Y h:i:s');
    }

    /**
     * @param \DateTime $dataCriacaoPost
     *
     * @return VwPost
     */
    public function setDataCriacaoPost($dataCriacaoPost)
    {
        $this->dataCriacaoPost = $dataCriacaoPost;

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
    public function getNomeSubcategoria()
    {
        return $this->nomeSubcategoria;
    }

    /**
     * @param string $nomeSubcategoria
     *
     * @return VwPost
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
     * @return VwPost
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
        return $this->dataCriacaoSubcategoria->format('d/m/Y h:i:s');
    }

    /**
     * @param \DateTime $dataCriacaoSubcategoria
     *
     * @return VwPost
     */
    public function setDataCriacaoSubcategoria($dataCriacaoSubcategoria)
    {
        $this->dataCriacaoSubcategoria = $dataCriacaoSubcategoria;

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
    public function getNomeCategoria()
    {
        return $this->nomeCategoria;
    }

    /**
     * @param string $nomeCategoria
     *
     * @return VwPost
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
     * @return VwPost
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
        return $this->dataCriacaoCategoria->format('d/m/Y h:i:s');
    }

    /**
     * @param \DateTime $dataCriacaoCategoria
     *
     * @return VwPost
     */
    public function setDataCriacaoCategoria($dataCriacaoCategoria)
    {
        $this->dataCriacaoCategoria = $dataCriacaoCategoria;

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
    public function getNomeTipo()
    {
        return $this->nomeTipo;
    }

    /**
     * @param string $nomeTipo
     *
     * @return VwPost
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
     * @return VwPost
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
        return $this->dataCriacaoTipo->format('d/m/Y h:i:s');
    }

    /**
     * @param \DateTime $dataCriacaoTipo
     *
     * @return VwPost
     */
    public function setDataCriacaoTipo($dataCriacaoTipo)
    {
        $this->dataCriacaoTipo = $dataCriacaoTipo;

        return $this;
    }

}
