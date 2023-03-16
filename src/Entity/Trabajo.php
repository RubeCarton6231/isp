<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Trabajo
 *
 * @ORM\Table(name="trabajo", uniqueConstraints={@ORM\UniqueConstraint(name="trabajo_tipo_key", columns={"tipo"})}, indexes={@ORM\Index(name="IDX_FDD6B80AB197184E", columns={"id_ticket"}), @ORM\Index(name="IDX_FDD6B80AD25F2570", columns={"id_tecnico"})})
 * @ORM\Entity
 */
class Trabajo
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_trabajo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="trabajo_id_trabajo_seq", allocationSize=1, initialValue=1)
     */
    private $idTrabajo;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=255, nullable=false)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="valor_hora", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $valorHora;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=1, nullable=false, options={"default"="A"})
     */
    private $estado = 'A';

    /**
     * @var \Ticket
     *
     * @ORM\ManyToOne(targetEntity="Ticket")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_ticket", referencedColumnName="id_ticket")
     * })
     */
    private $idTicket;

    /**
     * @var \Tecnico
     *
     * @ORM\ManyToOne(targetEntity="Tecnico")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tecnico", referencedColumnName="id_tecnico")
     * })
     */
    private $idTecnico;

    public function getIdTrabajo(): ?int
    {
        return $this->idTrabajo;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getValorHora(): ?string
    {
        return $this->valorHora;
    }

    public function setValorHora(string $valorHora): self
    {
        $this->valorHora = $valorHora;

        return $this;
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

    public function getIdTicket(): ?Ticket
    {
        return $this->idTicket;
    }

    public function setIdTicket(?Ticket $idTicket): self
    {
        $this->idTicket = $idTicket;

        return $this;
    }

    public function getIdTecnico(): ?Tecnico
    {
        return $this->idTecnico;
    }

    public function setIdTecnico(?Tecnico $idTecnico): self
    {
        $this->idTecnico = $idTecnico;

        return $this;
    }


}
