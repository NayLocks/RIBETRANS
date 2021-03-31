<?php

namespace App\Repository;

use App\Entity\LVehiclesMaintenances;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LVehiclesMaintenances|null find($id, $lockMode = null, $lockVersion = null)
 * @method LVehiclesMaintenances|null findOneBy(array $criteria, array $orderBy = null)
 * @method LVehiclesMaintenances[]    findAll()
 * @method LVehiclesMaintenances[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LVehiclesMaintenancesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LVehiclesMaintenances::class);
    }

    // /**
    //  * @return LVehiclesMaintenances[] Returns an array of LVehiclesMaintenances objects
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
    public function findOneBySomeField($value): ?LVehiclesMaintenances
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
