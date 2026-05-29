<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $now = new \DateTimeImmutable();
        $items = [
            [
                'name' => 'Tシャツ',
                'description' => 'Tシャツ説明', 
                'category' => 'tops', 
                'price' => 1000, 
                'stock' => 50, 
                'gender' => '2', 
                'color' => 'black', 
                'image_path' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTorNF2h6PJYVxvDQ0NnpERGUKKSK_osVMfRQ&s',
            ],
            [
                'name' => 'レギンス', 
                'description' => 'レギンス説明', 
                'category' => 'bottoms', 
                'price' => 4500, 
                'stock' => 30, 
                'gender' => '1', 
                'color' => 'white', 
                'image_path' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3evOu0y-aoYz4CtkboBno21Uv2Xi2eodOeg&s'],
            [
                'name' => 'デニムスカート', 
                'description' => 'デニムスカート説明', 
                'category' => 'skirt', 
                'price' => 6000, 
                'stock' => 15, 
                'gender' => '1', 
                'color' => 'blue', 
                'image_path' => 'https://file.stola.jp/item/26113309/original/19.jpg'],
            [
                'name' => 'キッズ用赤パーカー', 
                'description' => 'キッズ用パーカー説明', 
                'category' => 'outer', 
                'price' => 2500, 
                'stock' => 20, 
                'gender' => '3', 
                'color' => 'red', 
                'image_path' => 'https://www.tshirt.st/cdn/shop/files/CS_CS2251_RED_18441eb3-6648-4fbf-ba64-252f64f116aa.jpg?v=1694660774'],
            [
                'name' => 'シューズ', 
                'description' => 'シューズ説明', 
                'category' => 'shoes', 'price' => 900, 
                'stock' => 10, 
                'gender' => '2', 
                'color' => 'black', 
                'image_path' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSfiEDHI9yZtzVwkr3rMhLqEs8o39l837eDWw&s'
            ],
        ];

        foreach ($items as $item) {
            $product = new Product();
            $product->setName($item['name']);
            $product->setDescription($item['description']);
            $product->setCategory($item['category']);
            $product->setPrice($item['price']);
            $product->setStockQuantity(50); // 初期在庫
            $product->setGender($item['gender']);
            $product->setColor($item['color']);
            $product->setImagePath($item['image_path']);
            
            $product->setCreatedAt($now);
            $product->setUpdatedAt($now);
            $product->setDeletedAt($now);

            $manager->persist($product);
        }

        $manager->flush();
    }
}
