<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * ColaboracionArtistica
 *
 * @ORM\Table(name="colaboracion_artistica", indexes={@ORM\Index(name="fk_colaboracion_artistica_cancion1_idx", columns={"cancion_id"}), @ORM\Index(name="fk_colaboracion_artistica_artista2_idx", columns={"artista_colaborador_id"}), @ORM\Index(name="fk_colaboracion_artistica_artista1_idx", columns={"artista_id"})})
 * @ORM\Entity
 */
class ColaboracionArtistica
{
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

    /**
     * @var \Artista
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Artista")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="artista_colaborador_id", referencedColumnName="id")
     * })
     */
    private $artistaColaborador;

    /**
     * @var \Artista
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Artista")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="artista_id", referencedColumnName="id")
     * })
     */
    private $artista;


}
