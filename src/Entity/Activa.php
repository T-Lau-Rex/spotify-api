<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Activa
 *
 * @ORM\Table(name="activa", indexes={@ORM\Index(name="fk_activa_playlist1_idx", columns={"playlist_id"})})
 * @ORM\Entity
 */
class Activa
{
    /**
     * @var bool
     *
     * @ORM\Column(name="es_compartida", type="boolean", nullable=false)
     * 
     * @Groups("activa")
     */
    private $esCompartida;

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
     * @Groups("activa")
     */
    private $playlist;



    /**
     * Get the value of esCompartida
     */
    public function isEsCompartida(): bool
    {
        return $this->esCompartida;
    }

    /**
     * Set the value of esCompartida
     */
    public function setEsCompartida(bool $esCompartida): self
    {
        $this->esCompartida = $esCompartida;

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
