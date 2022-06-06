<?php

namespace App\Repository;

use App\Entity\Attribute;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Attribute>
 *
 * @method Attribute|null find($id, $lockMode = null, $lockVersion = null)
 * @method Attribute|null findOneBy(array $criteria, array $orderBy = null)
 * @method Attribute[]    findAll()
 * @method Attribute[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AttributeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Attribute::class);
    }

    public function add(Attribute $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Attribute $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @return Attribute[] Returns an array of Attribute objects
     */
    public function findByCurrency($currency): array
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.currency = :val')
            ->setParameter('val', $currency)
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @return Attribute[] Returns an array of Attribute objects
     */
    public function findByCurrencyAndDate($currency,$dateFrom,$dateTo): array
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.currency = :val')
            ->andWhere('a.lastUpdate >= :dateFrom')
            ->andWhere('a.lastUpdate <= :dateTo')
            ->setParameter('val', $currency)
            ->setParameter('dateFrom', $dateFrom)
            ->setParameter('dateTo', $dateTo)
            ->getQuery()
            ->getResult()
            ;
    }

//    public function findOneBySomeField($value): ?Attribute
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
