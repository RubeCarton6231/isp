<?php

namespace App\Repository;

use App\Entity\Facturacion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Facturacion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Facturacion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Facturacion[]    findAll()
 * @method Facturacion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FacturacionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Facturacion::class);
    }

    public function save(Facturacion $facturacion)
    {
        $em = $this->getEntityManager();
        $em->persist($facturacion);
        $em->flush();
    }

    public function delete(Facturacion $facturacion)
    {
        $em = $this->getEntityManager();
        $em->remove($facturacion);
        $em->flush();
    }
}
