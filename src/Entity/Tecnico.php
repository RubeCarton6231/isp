<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tecnico
 *
 * @ORM\Table(name="tecnico", indexes={@ORM\Index(name="IDX_CC28C00FCF8192D", columns={"id_usuario"})})
 * @ORM\Entity
 */
class Tecnico
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_tecnico", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="tecnico_id_tecnico_seq", allocationSize=1, initialValue=1)
     */
    private $idTecnico;

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

    public function getIdTecnico(): ?int
    {
        return $this->idTecnico;
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
