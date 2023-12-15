<?php

namespace App\Entity;

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
     * @var Cancion
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
     * @var Artista
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
     * @var Artista
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Artista")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="artista_id", referencedColumnName="id")
     * })
     */
    private $artista;



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

    /**
     * Get the value of artistaColaborador
     */
    public function getArtistaColaborador(): Artista
    {
        return $this->artistaColaborador;
    }

    /**
     * Set the value of artistaColaborador
     */
    public function setArtistaColaborador(Artista $artistaColaborador): self
    {
        $this->artistaColaborador = $artistaColaborador;

        return $this;
    }

    /**
     * Get the value of artista
     */
    public function getArtista(): Artista
    {
        return $this->artista;
    }

    /**
     * Set the value of artista
     */
    public function setArtista(Artista $artista): self
    {
        $this->artista = $artista;

        return $this;
    }
}
