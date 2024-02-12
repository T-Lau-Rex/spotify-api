<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Album
 *
 * @ORM\Table(name="album", indexes={@ORM\Index(name="fk_album_artista1_idx", columns={"artista_id"}), @ORM\Index(name="patrocinado_idx", columns={"patrocinado"}), @ORM\Index(name="titulo_idx", columns={"titulo"}), @ORM\Index(name="anyo_idx", columns={"anyo"})})
 * @ORM\Entity
 */
class Album
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * 
     * @Groups("album")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=100, nullable=false)
     * 
     * @Groups("album")
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="imagen", type="string", length=255, nullable=false)
     * 
     * @Groups("album")
     */
    private $imagen;

    /**
     * @var bool
     *
     * @ORM\Column(name="patrocinado", type="boolean", nullable=false)
     * 
     * @Groups("album")
     */
    private $patrocinado;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_inicio_patrocinio", type="date", nullable=true)
     * 
     * @Groups("album")
     */
    private $fechaInicioPatrocinio;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_fin_patrocinio", type="date", nullable=true)
     * 
     * @Groups("album")
     */
    private $fechaFinPatrocinio;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="anyo", type="datetime", nullable=true)
     * 
     * @Groups("album")
     */
    private $anyo;

    /**
     * @var Artista
     *
     * @ORM\ManyToOne(targetEntity="Artista")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="artista_id", referencedColumnName="id")
     * })
     * 
     * @Groups("album")
     */
    private $artista;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Usuario", mappedBy="album")
     * 
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
    public function getImagen(): string
    {
        return $this->imagen;
    }

    /**
     * Set the value of imagen
     */
    public function setImagen(string $imagen): self
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get the value of patrocinado
     */
    public function isPatrocinado(): bool
    {
        return $this->patrocinado;
    }

    /**
     * Set the value of patrocinado
     */
    public function setPatrocinado(bool $patrocinado): self
    {
        $this->patrocinado = $patrocinado;

        return $this;
    }

    /**
     * Get the value of fechaInicioPatrocinio
     */
    public function getFechaInicioPatrocinio(): ?\DateTime
    {
        return $this->fechaInicioPatrocinio;
    }

    /**
     * Set the value of fechaInicioPatrocinio
     */
    public function setFechaInicioPatrocinio(?\DateTime $fechaInicioPatrocinio): self
    {
        $this->fechaInicioPatrocinio = $fechaInicioPatrocinio;

        return $this;
    }

    /**
     * Get the value of fechaFinPatrocinio
     */
    public function getFechaFinPatrocinio(): ?\DateTime
    {
        return $this->fechaFinPatrocinio;
    }

    /**
     * Set the value of fechaFinPatrocinio
     */
    public function setFechaFinPatrocinio(?\DateTime $fechaFinPatrocinio): self
    {
        $this->fechaFinPatrocinio = $fechaFinPatrocinio;

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
     * Get the value of artista
     */
    public function getArtista(): Artista
    {
        return $this->artista;
    }

    /**
     * Set the value of artista
     */
    public function setArtista(Artista $artista): self
    {
        $this->artista = $artista;

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
