<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Facturador
 *
 * @ORM\Table(name="facturador", indexes={@ORM\Index(name="IDX_7AFF61F9FCF8192D", columns={"id_usuario"})})
 * @ORM\Entity
 */
class Facturador
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_facturador", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="facturador_id_facturador_seq", allocationSize=1, initialValue=1)
     */
    private $idFacturador;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=1, nullable=false, options={"default"="A"})
     */
    private $estado = 'A';

    /**
     * @var \Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_usuario", referencedColumnName="id_usuario")
     * })
     */
    private $idUsuario;

    public function getIdFacturador(): ?int
    {
        return $this->idFacturador;
    }

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(string $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    public function getIdUsuario(): ?Usuario
    {
        return $this->idUsuario;
    }

    public function setIdUsuario(?Usuario $idUsuario): self
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }


}
