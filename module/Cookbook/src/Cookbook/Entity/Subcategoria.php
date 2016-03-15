<?php

namespace Cookbook\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Subcategoria
 *
 * @ORM\Table(name="subcategoria", uniqueConstraints={@ORM\UniqueConstraint(name="descricao", columns={"descricao"})}, indexes={@ORM\Index(name="categoria_id", columns={"categoria_id"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Cookbook\Repository\SubcategoriaRepository")
 */
class Subcategoria extends AbstractEntity
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
     * @ORM\Column(name="descricao", type="string", length=100, nullable=false)
     */
    private $descricao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_criacao", type="datetime", nullable=false)
     */
    private $dataCriacao = 'CURRENT_TIMESTAMP';

    /**
     * @var Categoria
     *
     * @ORM\ManyToOne(targetEntity="Cookbook\Entity\Categoria")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categoria_id", referencedColumnName="id")
     * })
     */
    private $categoria;
}
