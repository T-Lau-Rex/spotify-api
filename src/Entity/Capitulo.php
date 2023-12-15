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



    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of titulo
     */
    public function getTitulo(): string
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     */
    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get the value of descripcion
     */
    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     */
    public function setDescripcion(?string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get the value of duracion
     */
    public function getDuracion(): int
    {
        return $this->duracion;
    }

    /**
     * Set the value of duracion
     */
    public function setDuracion(int $duracion): self
    {
        $this->duracion = $duracion;

        return $this;
    }

    /**
     * Get the value of fecha
     */
    public function getFecha(): \DateTime
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     */
    public function setFecha(\DateTime $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get the value of numeroReproducciones
     */
    public function getNumeroReproducciones(): int
    {
        return $this->numeroReproducciones;
    }

    /**
     * Set the value of numeroReproducciones
     */
    public function setNumeroReproducciones(int $numeroReproducciones): self
    {
        $this->numeroReproducciones = $numeroReproducciones;

        return $this;
    }

    /**
     * Get the value of podcast
     */
    public function getPodcast(): Podcast
    {
        return $this->podcast;
    }

    /**
     * Set the value of podcast
     */
    public function setPodcast(Podcast $podcast): self
    {
        $this->podcast = $podcast;

        return $this;
    }
}
