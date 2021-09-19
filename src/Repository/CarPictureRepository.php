<?php

namespace App\Repository;

use App\Entity\CarPicture;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CarPicture|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarPicture|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarPicture[]    findAll()
 * @method CarPicture[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarPictureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CarPicture::class);
    }

    // /**
    //  * @return CarPicture[] Returns an array of CarPicture objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CarPicture
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
