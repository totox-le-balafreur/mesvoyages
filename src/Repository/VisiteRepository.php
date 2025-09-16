<?php

namespace App\Repository;

use App\Entity\Visite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Visite>
 */
class VisiteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Visite::class);
    }
            /**
         * Supprime une visite
         * @param Visite $visite
         * return void
         */
        public function remove(Visite $visite): void
        {
            $this->getEntityManager()->remove($visite);    
            $this->getEntityManager()->flush();
        }
        

    /**
     * retourne toutes les visites triées sur un champ
     * @param type $champ
     * @param type $ordre
     * @return visite[] 
     */
    public function findAllOrderBy($champ, $ordre): array {
        return $this->createQueryBuilder('v')
                ->orderBy ('v.'.$champ, $ordre)
                ->getQuery()
                ->getResult();
    }
    /**
     * Enregistrements dont un champ est egal a une valeur
     * ou tous les enregistrements si la valeur est vide 
     * @param type $champ
     * @param type $valeur
     * @return Visite[]
     */
    public function findByEqualValue($champ,$valeur) : array {
        if($valeur==""){
            return $this->createQueryBuilder('v')
                    ->orderBy('v.'.$champ,'ASC')
                    ->getQuery()
                    ->getResult();
        }else{
            return $this->createQueryBuilder('v')
                    ->where('v.'.$champ.'=:valeur')
                    ->setParameter('valeur', $valeur)
                    ->orderBy('v.datecreation', 'DESC')
                    ->getQuery()
                    ->getResult();
        }
    }
}
