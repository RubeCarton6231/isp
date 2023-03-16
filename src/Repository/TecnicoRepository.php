<?php

namespace App\Repository;

use App\Entity\Tecnico;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Tecnico|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tecnico|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tecnico[]    findAll()
 * @method Tecnico[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TecnicoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tecnico::class);
    }

    public function save(Tecnico $tecnico)
    {
        $em = $this->getEntityManager();
        $em->persist($tecnico);
        $em->flush();
    }

    public function delete(Tecnico $tecnico)
    {
        $em = $this->getEntityManager();
        $em->remove($tecnico);
        $em->flush();
    }
}