<?php

namespace App\Repository;

use App\Entity\Trabajo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class TrabajoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Trabajo::class);
    }

    public function save(Trabajo $trabajo)
    {
        $this->_em->persist($trabajo);
        $this->_em->flush();
    }

    public function delete(Trabajo $trabajo)
    {
        $this->_em->remove($trabajo);
        $this->_em->flush();
    }

    public function buscarPorId($id)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
