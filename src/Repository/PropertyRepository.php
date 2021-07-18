<?php

namespace App\Repository;

use App\Entity\Property;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Property|null find($id, $lockMode = null, $lockVersion = null)
 * @method Property|null findOneBy(array $criteria, array $orderBy = null)
 * @method Property[]    findAll()
 * @method Property[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PropertyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Property::class);
    }

    /**
     * @return Property[]
     */
    public function getNeue():array
    {
        return $this->findunsoldQuery()
                    ->setMaxResults(12)
                    ->getQuery()
                    ->getResult();
    }

    public function getUnsold():array
    {
        return $this->findunsoldQuery()
                    ->getQuery()
                    ->getResult();
    }

    public function getSold():array
    {
        return $this->createQueryBuilder('p')
                    ->where('p.sold = true')
                    ->getQuery()
                    ->getResult();
    }

    public function allesverkaufen(): array
    {
        $properties = $this->findAll();
        foreach( $properties as $p)
            $p->setSold(true);
        
        return $properties;
    }

    public function zuruecksetzen(): array
    {
        $properties = $this->findAll();
        foreach( $properties as $p)
            $p->setSold(false);
        
        return $properties;
    }

    private function findunsoldQuery(): QueryBuilder
    {
        return $this->createQueryBuilder('p')
                        ->where('p.sold = false');
    }
}
