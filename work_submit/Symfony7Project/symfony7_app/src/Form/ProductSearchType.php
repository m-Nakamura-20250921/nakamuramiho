<?php

namespace App\Form;

use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('keyword', ChoiceType::class, [
                'required' => false,
                'attr' => ['placeholder' => '商品検索', 'autocomplete' => 'off']
            ])
            ->add('gender', ChoiceType::class, [
                'choices' => [
                    'すべて' => '0',
                    'レディース' => '1',
                    'メンズ' => '2',
                    'キッズ' => '3',
                ],
                'expanded' => true,
                'multiple' => false,
                'label' => '性別から探す',
                'required' => false,
            ])

            // カテゴリ
            ->add('category', ChoiceType::class, [
                'choices' => [
                    'トップス' => 'tops',
                    'ボトムス' => 'bottoms',
                    'スカート' => 'skirt',
                    'ワンピース' => 'dress',
                    'アウター' => 'outer',
                    'シューズ' => 'shoes',
                    'バッグ' => 'bag',
                    'アクセサリー' => 'accessory',
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])

            // カラー
            ->add('color', ChoiceType::class, [
                'choices' => [
                    'ブラック系' => 'black',
                    'ホワイト系' => 'white',
                    'レッド系' => 'red',
                    'ブルー系' => 'blue',
                    'グリーン系' => 'green', 
                ],
                'expanded' => true,
                'multiple' => false,
                'required' => false,
            ])

            // 価格　スライダー
            ->add('min_price', IntegerType::class, [
                'required' => false,
                'attr' => ['min' => 0, 'max' => 100]
            ])
            ->add('max_price', IntegerType::class, [
                'required' => false,
                'attr' => ['min' => 0, 'max' => 100]
            ])
            
            
            ->add('sort', ChoiceType::class, [
                'choices' => [
                    '安い順' => 'price_asc',
                    '高い順' => 'price_desc',
                ],
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'method' => 'GET',
            'csrf_protection' => false,
        ]);
    }
}