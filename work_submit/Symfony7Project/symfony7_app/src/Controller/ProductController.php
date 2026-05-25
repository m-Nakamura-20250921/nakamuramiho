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

        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }
}
