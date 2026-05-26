<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i=1;$i <= 6;$i++){
            $product = new Product();
            $product->setName('product'.$i);
            $product->setPrice(1*$i);
            // 画像を毎度変える（ダミー）
            $product->setImageUrl('https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?w=300&h=400&fit=crop&q=80');

            $manager->persist($product);
        }

        $manager->flush();
    }
}
