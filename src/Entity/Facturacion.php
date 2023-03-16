<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Facturacion
 *
 * @ORM\Table(name="facturacion", indexes={@ORM\Index(name="IDX_DA253E1C2A813255", columns={"id_cliente"}), @ORM\Index(name="IDX_DA253E1C234B117A", columns={"id_trabajo"})})
 * @ORM\Entity
 */
class Facturacion
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_facturacion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="facturacion_id_facturacion_seq", allocationSize=1, initialValue=1)
     */
    private $idFacturacion;

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

    /**
     * @var \Trabajo
     *
     * @ORM\ManyToOne(targetEntity="Trabajo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_trabajo", referencedColumnName="id_trabajo")
     * })
     */
    private $idTrabajo;

    public function getIdFacturacion(): ?int
    {
        return $this->idFacturacion;
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

    public function getIdTrabajo(): ?Trabajo
    {
        return $this->idTrabajo;
    }

    public function setIdTrabajo(?Trabajo $idTrabajo): self
    {
        $this->idTrabajo = $idTrabajo;

        return $this;
    }


}
