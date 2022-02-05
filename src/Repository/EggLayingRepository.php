<?php

namespace App\Repository;

use App\Entity\EggLaying;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method EggLaying|null find($id, $lockMode = null, $lockVersion = null)
 * @method EggLaying|null findOneBy(array $criteria, array $orderBy = null)
 * @method EggLaying[]    findAll()
 * @method EggLaying[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EggLayingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EggLaying::class);
    }

    // /**
    //  * @return EggLaying[] Returns an array of EggLaying objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EggLaying
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
