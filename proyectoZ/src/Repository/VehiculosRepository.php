<?php

namespace App\Repository;

use App\Entity\Vehiculos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Vehiculos|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vehiculos|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vehiculos[]    findAll()
 * @method Vehiculos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VehiculosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vehiculos::class);
    }

    public function findByName($text): array
    {
        $qb = $this->createQueryBuilder('v')
        ->andWhere('v.nombre LIKE :text')
        ->setParameter('text', '%' . $text . '%')
        ->getQuery();
        return $qb->execute();
    }

    public function findByMarca(): array
    {
        $qb = $this->query('marca.vehiculos')
        ->from('vehiculos')
        ->join('marcas', 'marca.vehiculos = marcas.nombre', 'left outer')
        ->get(); 
        return $qb->execute();
    }
    // /**
    //  * @return Vehiculos[] Returns an array of Vehiculos objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Vehiculos
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
