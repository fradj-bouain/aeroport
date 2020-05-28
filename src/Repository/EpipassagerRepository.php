<?php

namespace App\Repository;

use App\Entity\Epipassager;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Epipassager|null find($id, $lockMode = null, $lockVersion = null)
 * @method Epipassager|null findOneBy(array $criteria, array $orderBy = null)
 * @method Epipassager[]    findAll()
 * @method Epipassager[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EpipassagerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Epipassager::class);
    }

    // /**
    //  * @return Epipassager[] Returns an array of Epipassager objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Epipassager
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
