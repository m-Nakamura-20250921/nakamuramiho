<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductSearchType;
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
        // 作成済みのFormクラスを生成
        $form = $this->createForm(ProductSearchType::class);

        // URLを自動に読み込み
        $form->handleRequest($request);

        // 検索条件　空の配列
        $criteria = [];

        // フォームが送信されていたら条件を組み立て
        if ($form->isSubmitted() && $form->isValid()) {
            // フォームから入力された値を一括で取得
            $searchData = $form->getData();

            // 性別
            if (isset($searchData['gender']) && $searchData['gender'] !== '0' && $searchData['gender'] !== '') {
                $criteria['gender'] = $searchData['gender'];
            }

            // カテゴリ
            if (!empty($searchData['category'])) {
                $criteria['category'] = $searchData['category'];
            }

            // カラー
            if (!empty($searchData['color'])) {
                $criteria['color'] = $searchData['color'];
            }

            // ソート
            if (!empty($searchData['sort'])) {
                $criteria['sort'] = $searchData['sort'];
            }

            // 価格（min）
            if (isset($searchData['min_price']) && $searchData['min_price'] !== '') {
                $criteria['min_price'] = (int)$searchData['min_price'];
            }

            // 価格（max）
            if (isset($searchData['max_price']) && $searchData['max_price'] !== '') {
                $criteria['max_price'] = (int)$searchData['max_price'];
            }
        }

        // 条件を渡す
        $products = $productRepository->findProductsBySearchData($criteria);

        return $this->render('product/index.html.twig', [
            'products' => $products,
            'search_form' => $form->createView(),
            'price_data' => $criteria,
        ]);
    }
}
