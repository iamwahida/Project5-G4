<?php

namespace App\Repository;

use App\Entity\CardContent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use SebastianBergmann\Environment\Console;

/**
 * @extends ServiceEntityRepository<CardContent>
 *
 * @method CardContent|null find($id, $lockMode = null, $lockVersion = null)
 * @method CardContent|null findOneBy(array $criteria, array $orderBy = null)
 * @method CardContent[]    findAll()
 * @method CardContent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CardContentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CardContent::class);
    }

    public function save(CardContent $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(CardContent $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function getUniversity(int $fk_university){
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT *
            FROM App\Entity\University uni
            WHERE uni.id == :fk_university'
        )->setParameter('fk_university', $fk_university);
        
        return $query->getResult();

    }

//    /**
//     * @return CardContent[] Returns an array of CardContent objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CardContent
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
