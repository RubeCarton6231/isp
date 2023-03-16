<?php

namespace App\Repository;

use App\Entity\Ticket;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
   * @method Trabajo|null find($id, $lockMode = null, $lockVersion = null)
   * @method Trabajo|null findOneBy(array $criteria, array $orderBy = null)
   * @method Trabajo[] findAll()
   * @method Trabajo[] findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
   * @method void delete(Trabajo $trabajo, bool $flush = true)
   * @method void save(Trabajo $trabajo, bool $flush = true)
*/
class TicketRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ticket::class);
    }

    public function save(Ticket $ticket)
    {
        $em = $this->getEntityManager();
        $em->persist($ticket);
        $em->flush();
    }

    public function delete(Ticket $ticket)
    {
        $em = $this->getEntityManager();
        $em->remove($ticket);
        $em->flush();
    }

   
}
