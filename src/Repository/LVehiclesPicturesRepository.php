<?php

namespace App\Repository;

use App\Entity\LVehiclesPictures;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LVehiclesPictures|null find($id, $lockMode = null, $lockVersion = null)
 * @method LVehiclesPictures|null findOneBy(array $criteria, array $orderBy = null)
 * @method LVehiclesPictures[]    findAll()
 * @method LVehiclesPictures[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LVehiclesPicturesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LVehiclesPictures::class);
    }

    // /**
    //  * @return LVehiclesPictures[] Returns an array of LVehiclesPictures objects
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
    public function findOneBySomeField($value): ?LVehiclesPictures
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
