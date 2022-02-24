<?php

namespace App\Repository;

use App\Entity\Kendaraan;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Kendaraan|null find($id, $lockMode = null, $lockVersion = null)
 * @method Kendaraan|null findOneBy(array $criteria, array $orderBy = null)
 * @method Kendaraan[]    findAll()
 * @method Kendaraan[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KendaraanRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Kendaraan::class);
    }

    // /**
    //  * @return Kendaraan[] Returns an array of Kendaraan objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('k.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Kendaraan
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
