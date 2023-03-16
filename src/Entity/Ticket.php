<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Ticket
 *
 * @ORM\Table(name="ticket", indexes={@ORM\Index(name="IDX_97A0ADA32A813255", columns={"id_cliente"})})
 * @ORM\Entity
 */
class Ticket
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_ticket", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ticket_id_ticket_seq", allocationSize=1, initialValue=1)
     */
    private $idTicket;



    /**
     * @var string
     *
     * @ORM\Column(name="nombre_problema", type="string", length=100, nullable=false)
     */
    private $nombreProblema;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion_problema", type="string", length=1000, nullable=false)
     */
    private $descripcionProblema;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=1, nullable=false, options={"default"="A"})
     */
    private $estado = 'A';

    /**
     * @var \Cliente
     *
     * @ORM\ManyToOne(targetEntity="Cliente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_cliente", referencedColumnName="id_cliente")
     * })
     */
    private $idCliente;

    public function getIdTicket(): ?int
    {
        return $this->idTicket;
    }


    public function getNombreProblema(): ?string
    {
        return $this->nombreProblema;
    }

    public function setNombreProblema(string $nombreProblema): self
    {
        $this->nombreProblema = $nombreProblema;

        return $this;
    }

    public function getDescripcionProblema(): ?string
    {
        return $this->descripcionProblema;
    }

    public function setDescripcionProblema(string $descripcionProblema): self
    {
        $this->descripcionProblema = $descripcionProblema;

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

    public function getIdCliente(): ?Cliente
    {
        return $this->idCliente;
    }

    public function setIdCliente(?Cliente $idCliente): self
    {
        $this->idCliente = $idCliente;

        return $this;
    }


}
