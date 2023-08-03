<?php

namespace App\Repository;

use App\Entity\EntertainmentGroup;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EntertainmentGroup>
 *
 * @method EntertainmentGroup|null find($id, $lockMode = null, $lockVersion = null)
 * @method EntertainmentGroup|null findOneBy(array $criteria, array $orderBy = null)
 * @method EntertainmentGroup[]    findAll()
 * @method EntertainmentGroup[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EntertainmentGroupRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EntertainmentGroup::class);
    }

//    /**
//     * @return EntertainmentGroup[] Returns an array of EntertainmentGroup objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?EntertainmentGroup
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
