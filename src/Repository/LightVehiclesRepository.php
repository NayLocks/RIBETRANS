<?php

namespace App\Repository;

use App\Entity\LightVehicles;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LightVehicles|null find($id, $lockMode = null, $lockVersion = null)
 * @method LightVehicles|null findOneBy(array $criteria, array $orderBy = null)
 * @method LightVehicles[]    findAll()
 * @method LightVehicles[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LightVehiclesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LightVehicles::class);
    }

    // /**
    //  * @return LightVehicles[] Returns an array of LightVehicles objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LightVehicles
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
