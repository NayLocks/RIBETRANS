<?php

namespace App\Repository;

use App\Entity\LVehiclesRentals;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LVehiclesRentals|null find($id, $lockMode = null, $lockVersion = null)
 * @method LVehiclesRentals|null findOneBy(array $criteria, array $orderBy = null)
 * @method LVehiclesRentals[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LVehiclesRentalsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LVehiclesRentals::class);
    }

    public function findAll(){
        return $this->createQueryBuilder('r')
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(1)
            ->getQuery()
            ->getResult()
            ;
    }

    public function rentalLastVehicle($id){
        return $this->createQueryBuilder('r')
            ->orderBy('r.id', 'DESC')
            ->where('r.vehicle = :lightVehicle')
            ->setParameter('lightVehicle', $id)
            ->setMaxResults(1)
            ->getQuery()
            ->getResult()
            ;
    }

    // /**
    //  * @return LVehiclesRentals[] Returns an array of LVehiclesRentals objects
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
    public function findOneBySomeField($value): ?LVehiclesRentals
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
