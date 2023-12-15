<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Capitulo
 *
 * @ORM\Table(name="capitulo", indexes={@ORM\Index(name="fk_capitulo_podcast1_idx", columns={"podcast_id"}), @ORM\Index(name="fecha", columns={"fecha"}), @ORM\Index(name="titulo", columns={"titulo"})})
 * @ORM\Entity
 */
class Capitulo
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
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
     * @var string|null
     *
     * @ORM\Column(name="descripcion", type="text", length=65535, nullable=true)
     */
    private $descripcion;

    /**
     * @var int
     *
     * @ORM\Column(name="duracion", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $duracion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=false)
     */
    private $fecha;

    /**
     * @var int
     *
     * @ORM\Column(name="numero_reproducciones", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $numeroReproducciones;

    /**
     * @var Podcast
     *
     * @ORM\ManyToOne(targetEntity="Podcast")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="podcast_id", referencedColumnName="id")
     * })
     */
    private $podcast;


}
