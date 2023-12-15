<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     */
    private $playlist;


}
