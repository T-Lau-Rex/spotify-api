<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Podcast
 *
 * @ORM\Table(name="podcast", indexes={@ORM\Index(name="anyo_idx", columns={"anyo"}), @ORM\Index(name="titulo_idx", columns={"titulo"})})
 * @ORM\Entity
 */
class Podcast
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * 
     * @Groups("podcast")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=100, nullable=false)
     * 
     * @Groups("podcast")
     */
    private $titulo;

    /**
     * @var string|null
     *
     * @ORM\Column(name="imagen", type="string", length=255, nullable=true)
     * 
     * @Groups("podcast")
     */
    private $imagen;

    /**
     * @var string|null
     *
     * @ORM\Column(name="descripcion", type="text", length=65535, nullable=true)
     * 
     * @Groups("podcast")
     */
    private $descripcion;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="anyo", type="datetime", nullable=true)
     * 
     * @Groups("podcast")
     */
    private $anyo;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Usuario", mappedBy="podcast")
     * 
     * @Groups("podcast")
     */
    private $usuario = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->usuario = new \Doctrine\Common\Collections\ArrayCollection();
    }


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
     * Get the value of imagen
     */
    public function getImagen(): ?string
    {
        return $this->imagen;
    }

    /**
     * Set the value of imagen
     */
    public function setImagen(?string $imagen): self
    {
        $this->imagen = $imagen;

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
     * Get the value of anyo
     */
    public function getAnyo(): ?\DateTime
    {
        return $this->anyo;
    }

    /**
     * Set the value of anyo
     */
    public function setAnyo(?\DateTime $anyo): self
    {
        $this->anyo = $anyo;

        return $this;
    }

    /**
     * Get the value of usuario
     */
    public function getUsuario(): \Doctrine\Common\Collections\Collection
    {
        return $this->usuario;
    }

    /**
     * Set the value of usuario
     */
    public function setUsuario(\Doctrine\Common\Collections\Collection $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }
}
