<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Configuracion
 *
 * @ORM\Table(name="configuracion", uniqueConstraints={@ORM\UniqueConstraint(name="usuario_id_UNIQUE", columns={"usuario_id"})}, indexes={@ORM\Index(name="fk_configuracion_calidad1_idx", columns={"calidad_id"}), @ORM\Index(name="fk_configuracion_idioma1_idx", columns={"idioma_id"}), @ORM\Index(name="fk_configuracion_tipo_descarga1_idx", columns={"tipo_descarga_id"})})
 * @ORM\Entity
 */
class Configuracion
{
    /**
     * @var bool
     *
     * @ORM\Column(name="autoplay", type="boolean", nullable=false)
     */
    private $autoplay;

    /**
     * @var bool
     *
     * @ORM\Column(name="ajuste", type="boolean", nullable=false)
     */
    private $ajuste;

    /**
     * @var bool
     *
     * @ORM\Column(name="normalizacion", type="boolean", nullable=false)
     */
    private $normalizacion;

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
     * @var \Calidad
     *
     * @ORM\ManyToOne(targetEntity="Calidad")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="calidad_id", referencedColumnName="id")
     * })
     */
    private $calidad;

    /**
     * @var \Idioma
     *
     * @ORM\ManyToOne(targetEntity="Idioma")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idioma_id", referencedColumnName="id")
     * })
     */
    private $idioma;

    /**
     * @var \TipoDescarga
     *
     * @ORM\ManyToOne(targetEntity="TipoDescarga")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipo_descarga_id", referencedColumnName="id")
     * })
     */
    private $tipoDescarga;


}
