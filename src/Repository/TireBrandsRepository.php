<?php

namespace App\Repository;

use App\Entity\TireBrands;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TireBrands|null find($id, $lockMode = null, $lockVersion = null)
 * @method TireBrands|null findOneBy(array $criteria, array $orderBy = null)
 * @method TireBrands[]    findAll()
 * @method TireBrands[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TireBrandsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TireBrands::class);
    }

    // /**
    //  * @return TireBrands[] Returns an array of TireBrands objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TireBrands
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
