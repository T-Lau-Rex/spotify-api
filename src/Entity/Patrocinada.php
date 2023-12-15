<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Patrocinada
 *
 * @ORM\Table(name="patrocinada", indexes={@ORM\Index(name="fk_patrocinada_playlist1_idx", columns={"playlist_id"})})
 * @ORM\Entity
 */
class Patrocinada
{
    /**
     * @var bool
     *
     * @ORM\Column(name="patrocinada", type="boolean", nullable=false, options={"default"="1"})
     */
    private $patrocinada = true;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_inicio", type="date", nullable=false)
     */
    private $fechaInicio;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="fecha_fin", type="date", nullable=true)
     */
    private $fechaFin;

    /**
     * @var Playlist
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Playlist")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="playlist_id", referencedColumnName="id")
     * })
     */
    private $playlist;



    /**
     * Get the value of patrocinada
     */
    public function isPatrocinada(): bool
    {
        return $this->patrocinada;
    }

    /**
     * Set the value of patrocinada
     */
    public function setPatrocinada(bool $patrocinada): self
    {
        $this->patrocinada = $patrocinada;

        return $this;
    }

    /**
     * Get the value of fechaInicio
     */
    public function getFechaInicio(): \DateTime
    {
        return $this->fechaInicio;
    }

    /**
     * Set the value of fechaInicio
     */
    public function setFechaInicio(\DateTime $fechaInicio): self
    {
        $this->fechaInicio = $fechaInicio;

        return $this;
    }

    /**
     * Get the value of fechaFin
     */
    public function getFechaFin(): ?\DateTime
    {
        return $this->fechaFin;
    }

    /**
     * Set the value of fechaFin
     */
    public function setFechaFin(?\DateTime $fechaFin): self
    {
        $this->fechaFin = $fechaFin;

        return $this;
    }

    /**
     * Get the value of playlist
     */
    public function getPlaylist(): Playlist
    {
        return $this->playlist;
    }

    /**
     * Set the value of playlist
     */
    public function setPlaylist(Playlist $playlist): self
    {
        $this->playlist = $playlist;

        return $this;
    }
}
