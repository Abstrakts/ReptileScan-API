<?php

namespace App\Repository;

use App\Entity\Moults;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Moults|null find($id, $lockMode = null, $lockVersion = null)
 * @method Moults|null findOneBy(array $criteria, array $orderBy = null)
 * @method Moults[]    findAll()
 * @method Moults[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MoultsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Moults::class);
    }

    // /**
    //  * @return Moults[] Returns an array of Moults objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Moults
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
