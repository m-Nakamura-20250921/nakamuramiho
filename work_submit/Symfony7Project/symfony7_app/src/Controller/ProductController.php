<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ProductController extends AbstractController
{
    #[Route('/product', name: 'product_index',methods:['GET'])]
    public function index(Request $request, ProductRepository $productRepository): Response
    {   
        // 商品検索
        $keyword = $request->query->get('keyword', '');

        // 性別
        $gender = $request->query->get('gender', '99');
        // 条件分岐・DBからデータ取得
        if($gender !== ""){
            $products = $productRepository->findBy(['gender' => $gender]);
        } else {
            // 「すべて」の場合は全件取得
            $products = $productRepository->findAll();
        }


        return $this->render('product/index.html.twig', [
            'products' => $products,
        ]);
    }

    // public function index(Request $request, ProductRepository $productRepository): Response
    // {   
    //     $products = $productRepository->findAll();

    //     return $this->render('product/index.html.twig', [
    //         'products' => $products,
    //     ]);
    // }
}
