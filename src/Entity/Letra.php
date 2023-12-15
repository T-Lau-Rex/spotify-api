<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Letra
 *
 * @ORM\Table(name="letra", uniqueConstraints={@ORM\UniqueConstraint(name="cancion_id_UNIQUE", columns={"cancion_id"})})
 * @ORM\Entity
 */
class Letra
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="ruta", type="string", length=255, nullable=false)
     */
    private $ruta;

    /**
     * @var Cancion
     *
     * @ORM\ManyToOne(targetEntity="Cancion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cancion_id", referencedColumnName="id")
     * })
     */
    private $cancion;



    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of ruta
     */
    public function getRuta(): string
    {
        return $this->ruta;
    }

    /**
     * Set the value of ruta
     */
    public function setRuta(string $ruta): self
    {
        $this->ruta = $ruta;

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
