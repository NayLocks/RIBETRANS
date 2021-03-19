<?php

namespace App\Repository;

use App\Entity\VehiclesType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method VehiclesType|null find($id, $lockMode = null, $lockVersion = null)
 * @method VehiclesType|null findOneBy(array $criteria, array $orderBy = null)
 * @method VehiclesType[]    findAll()
 * @method VehiclesType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VehiclesTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VehiclesType::class);
    }

    // /**
    //  * @return VehiclesType[] Returns an array of VehiclesType objects
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
    public function findOneBySomeField($value): ?VehiclesType
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
