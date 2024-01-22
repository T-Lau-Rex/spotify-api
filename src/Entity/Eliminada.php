<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Eliminada
 *
 * @ORM\Table(name="eliminada", indexes={@ORM\Index(name="fk_eliminada_playlist1_idx", columns={"playlist_id"})})
 * @ORM\Entity
 */
class Eliminada
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_eliminacion", type="date", nullable=false)
     * 
     * @Groups("eliminada")
     */
    private $fechaEliminacion = 'CURRENT_TIMESTAMP';

    /**
     * @var Playlist
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Playlist")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="playlist_id", referencedColumnName="id")
     * })
     * 
     * @Groups("eliminada")
     */
    private $playlist;

    public function __construct()
    {
        $this->fechaEliminacion = new \DateTime();
    }

    /**
     * Get the value of fechaEliminacion
     */
    public function getFechaEliminacion(): \DateTime
    {
        return $this->fechaEliminacion;
    }

    /**
     * Set the value of fechaEliminacion
     */
    public function setFechaEliminacion(\DateTime $fechaEliminacion): self
    {
        $this->fechaEliminacion = $fechaEliminacion;

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
