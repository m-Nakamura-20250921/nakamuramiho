<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\DBAL\ParameterType;

/**
 * @extends ServiceEntityRepository<Product>
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    public function findProductsBySearchData($searchData)
    {
        $qb = $this->createQueryBuilder('p');

        // 何も選んでない時は新着
        $sortType = $searchData['sort'] ?? 'new_arrival';

        if ($sortType === 'price_asc'){
            $qb->orderBy('p.price','ASC');
            
            // 昇順
        }elseif($sortType === 'price_desc') {
            $qb->orderBy('p.price','DESC');

            // 何も選んでいない時・新着順
        }else{
            $qb->orderBy('p.id','DESC');
        }

        // 価格絞り込み
        if(isset($searchData['min_price']) && $searchData['min_price'] !== ''){
            $qb->andWhere('p.price >= :min_price')
               ->setParameter('min_price', $searchData['min_price']);
        }

        if(isset($searchData['max_price']) && $searchData['max_price'] !== ''){
            $qb->andWhere('p.price <= :max_price')
               ->setParameter('max_price', $searchData['max_price']);
        }

        return $qb->getQuery()->getResult();
    }
}
