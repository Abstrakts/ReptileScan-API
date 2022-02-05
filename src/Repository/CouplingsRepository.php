<?php

namespace App\Repository;

use App\Entity\Couplings;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Couplings|null find($id, $lockMode = null, $lockVersion = null)
 * @method Couplings|null findOneBy(array $criteria, array $orderBy = null)
 * @method Couplings[]    findAll()
 * @method Couplings[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CouplingsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Couplings::class);
    }

    // /**
    //  * @return Couplings[] Returns an array of Couplings objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Couplings
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
