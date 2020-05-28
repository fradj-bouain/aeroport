<?php

namespace App\Repository;

use App\Entity\Epiavion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Epiavion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Epiavion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Epiavion[]    findAll()
 * @method Epiavion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EpiavionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Epiavion::class);
    }

    // /**
    //  * @return Epiavion[] Returns an array of Epiavion objects
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
    public function findOneBySomeField($value): ?Epiavion
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
