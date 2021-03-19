<?php

namespace App\Repository;

use App\Entity\VehiclesKind;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method VehiclesKind|null find($id, $lockMode = null, $lockVersion = null)
 * @method VehiclesKind|null findOneBy(array $criteria, array $orderBy = null)
 * @method VehiclesKind[]    findAll()
 * @method VehiclesKind[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VehiclesKindRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VehiclesKind::class);
    }

    // /**
    //  * @return VehiclesKind[] Returns an array of VehiclesKind objects
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
    public function findOneBySomeField($value): ?VehiclesKind
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
