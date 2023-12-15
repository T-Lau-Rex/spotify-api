<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Favoritas
 *
 * @ORM\Table(name="favoritas", indexes={@ORM\Index(name="fk_favoritas_playlist1_idx", columns={"playlist_id"})})
 * @ORM\Entity
 */
class Favoritas
{
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
