<?php

namespace App\Repository;

use App\Entity\Otros;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Otros|null find($id, $lockMode = null, $lockVersion = null)
 * @method Otros|null findOneBy(array $criteria, array $orderBy = null)
 * @method Otros[]    findAll()
 * @method Otros[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OtrosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Otros::class);
    }

    // /**
    //  * @return Otros[] Returns an array of Otros objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Otros
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
