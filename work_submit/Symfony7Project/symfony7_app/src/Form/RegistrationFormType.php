<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType; // ★ここを修正
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => '名前'
            ])
            ->add('name_kana', TextType::class, [
                'label' => '名前（カナ）'
            ])
            ->add('email', EmailType::class, [
                'label' => 'メールアドレス'
            ])
            ->add('password', PasswordType::class, [
                'label' => 'パスワード',
                'property_path' => 'password_hash',
            ])
            ->add('password_confirm', PasswordType::class, [
                'label' => 'パスワード（確認）',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}