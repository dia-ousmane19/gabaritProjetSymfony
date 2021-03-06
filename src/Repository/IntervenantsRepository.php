<?php

namespace App\Repository;

use App\Entity\Intervenants;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Intervenants|null find($id, $lockMode = null, $lockVersion = null)
 * @method Intervenants|null findOneBy(array $criteria, array $orderBy = null)
 * @method Intervenants[]    findAll()
 * @method Intervenants[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IntervenantsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Intervenants::class);
    }

    /**
     * @return Intervenants[] Returns an array of Intervenants objects
     */

    public function findAllIntervenant(): array
    {
        return $this->createQueryBuilder('i')
            // ->andWhere('i.exampleField = :val')
            // ->setParameter('val', $value)
            // ->orderBy('i.id', 'ASC')
            // ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }



    public function findOneIntervenant($slug)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.slug = :val')
            ->setParameter('val', $slug)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    /**
     * @return Intervenants[] Returns an array of Intervenants objects
     */
    public function findOtherIntervenant($slug): array
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.slug != :val')
            ->setParameter('val', $slug)
            ->getQuery()
            ->getResult()
        ;
    }

}
