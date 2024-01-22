<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * AnyadeCancionPlaylist
 *
 * @ORM\Table(name="anyade_cancion_playlist", indexes={@ORM\Index(name="fk_anyade_cancion_playlist_playlist1_idx", columns={"playlist_id"}), @ORM\Index(name="fecha_anyadida", columns={"fecha_anyadida"}), @ORM\Index(name="fk_anyade_cancion_playlist_cancion1_idx", columns={"cancion_id"}), @ORM\Index(name="fk_anyade_cancion_playlist_usuario1_idx", columns={"usuario_id"})})
 * @ORM\Entity
 */
class AnyadeCancionPlaylist
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_anyadida", type="datetime", nullable=false)
     * 
     * @Groups("anyade_cancion_playlist")
     */
    private $fechaAnyadida;

    /**
     * @var Usuario
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
     * })
     * 
     * @Groups("anyade_cancion_playlist")
     */
    private $usuario;

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
     * @Groups("anyade_cancion_playlist")
     */
    private $playlist;

    /**
     * @var Cancion
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Cancion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cancion_id", referencedColumnName="id")
     * })
     * 
     * @Groups("anyade_cancion_playlist")
     */
    private $cancion;



    /**
     * Get the value of fechaAnyadida
     */
    public function getFechaAnyadida(): \DateTime
    {
        return $this->fechaAnyadida;
    }

    /**
     * Set the value of fechaAnyadida
     */
    public function setFechaAnyadida(\DateTime $fechaAnyadida): self
    {
        $this->fechaAnyadida = $fechaAnyadida;

        return $this;
    }

    /**
     * Get the value of usuario
     */
    public function getUsuario(): Usuario
    {
        return $this->usuario;
    }

    /**
     * Set the value of usuario
     */
    public function setUsuario(Usuario $usuario): self
    {
        $this->usuario = $usuario;

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

    /**
     * Get the value of cancion
     */
    public function getCancion(): Cancion
    {
        return $this->cancion;
    }

    /**
     * Set the value of cancion
     */
    public function setCancion(Cancion $cancion): self
    {
        $this->cancion = $cancion;

        return $this;
    }
}
