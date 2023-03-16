<?php

namespace App\Repository;

use App\Entity\Facturador;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Facturador|null find($id, $lockMode = null, $lockVersion = null)
 * @method Facturador|null findOneBy(array $criteria, array $orderBy = null)
 * @method Facturador[]    findAll()
 * @method Facturador[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FacturadorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Facturador::class);
    }

    public function save(Facturador $facturador)
    {
        $em = $this->getEntityManager();
        $em->persist($facturador);
        $em->flush();
    }

    public function delete(Facturador $facturador)
    {
        $em = $this->getEntityManager();
        $em->remove($facturador);
        $em->flush();
    }
}
