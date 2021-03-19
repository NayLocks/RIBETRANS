<?php

namespace App\Repository;

use App\Entity\LVehiclesDocuments;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LVehiclesDocuments|null find($id, $lockMode = null, $lockVersion = null)
 * @method LVehiclesDocuments|null findOneBy(array $criteria, array $orderBy = null)
 * @method LVehiclesDocuments[]    findAll()
 * @method LVehiclesDocuments[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LVehiclesDocumentsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LVehiclesDocuments::class);
    }

    // /**
    //  * @return LVehiclesDocuments[] Returns an array of LVehiclesDocuments objects
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
    public function findOneBySomeField($value): ?LVehiclesDocuments
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
