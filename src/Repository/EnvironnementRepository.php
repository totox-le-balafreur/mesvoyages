<?php

namespace App\Repository;

use App\Entity\Environnement;
use App\Entity\Visite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Environnement>
 */
class EnvironnementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Environnement::class);
    }

     /**
         * Ajoute ou modifie un environnement
         * @param Visite $environnement
         * return void
         */
        public function add(Environnement $environnement): void {
            $this->getEntityManager()->persist($environnement);    
            $this->getEntityManager()->flush();
        }
        /**
         * Supprime un environnement
         * @param Visite $environnement
         * return void
         */
        public function remove(Environnement $environnement): void
        {
            $this->getEntityManager()->remove($environnement);    
            $this->getEntityManager()->flush();
        }
    //    /**
    //     * @return Environnement[] Returns an array of Environnement objects
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

    //    public function findOneBySomeField($value): ?Environnement
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
