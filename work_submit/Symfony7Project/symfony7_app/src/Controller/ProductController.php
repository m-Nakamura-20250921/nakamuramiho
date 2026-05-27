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
        $keyword = $request->query->get('keyword', '');
        $gender  = $request->query->get('gender', '0'); // 「すべて」の初期値をHTMLに合わせて0に
        $category = $request->query->get('category', '');
        $color    = $request->query->get('color', '');
        
        // 性別条件分岐・DBからデータ取得
        if($gender !== ""){
            $products = $productRepository->findBy(['gender' => $gender]);
        } else {
            // 「すべて」の場合は全件取得
            $products = $productRepository->findAll();
        }

        // カテゴリー　もしカテゴリが選択されていたら、そのカテゴリで絞り込む
        if($category !== ''){
            // データベースの category カラムが一致するものを検索
            $products = $productRepository->findBy(['category' => $category]);
        }else{
            // カテゴリが選ばれていない（初期表示など）なら、すべて取得
            $products = $productRepository->findAll();
        }

        // カラー
        if($color !==''){
            $products = $productRepository->findBy(['color' => $color]);
        }else{
            $products = $productRepository->findAll();
        }


        return $this->render('product/index.html.twig', [
            'products' => $products,
        ]);
    }
}
