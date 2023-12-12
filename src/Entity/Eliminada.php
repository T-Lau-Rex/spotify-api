<?php



use Doctrine\ORM\Mapping as ORM;

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
     */
    private $fechaEliminacion;

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


}
