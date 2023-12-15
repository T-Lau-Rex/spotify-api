<?php



use Doctrine\ORM\Mapping as ORM;

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
     */
    private $fechaAnyadida;

    /**
     * @var \Usuario
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usuario_id", referencedColumnName="id")
     * })
     */
    private $usuario;

    /**
     * @var \Playlist
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
     * @var \Cancion
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Cancion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cancion_id", referencedColumnName="id")
     * })
     */
    private $cancion;


}
