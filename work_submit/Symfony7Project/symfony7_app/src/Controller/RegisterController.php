<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class RegisterController extends AbstractController
{
    #[Route('/register', name: 'register.form', methods: ['GET','POST'])]
    public function index(Request $request): Response
    {
        $session = $request->getSession();
        $user = $session->get('register_data');
        
        if (!$user instanceof User) {
            $user = new User();
        }

        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $session->set('register_data', $user);
            return $this->redirectToRoute('register.confirm');
        }

        return $this->render('register/form.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    // 確認画面
    #[Route('/register/confirm', name: 'register.confirm', methods: ['GET','POST'])]
    public function confirm(Request $request, EntityManagerInterface $entityManager): Response
    {
        $session = $request->getSession();
        $user = $session->get('register_data');
        
        // セッションになければ戻す
        if (!$user instanceof User) {
            return $this->redirectToRoute('register.form');
        }
        
        // ボタン押された処理
        if ($request->isMethod('POST')) {
            $action = $request->request->get('submit_action');

            if ($action === 'back') {
                return $this->redirectToRoute('register.form');
            }

            if ($action === 'complete') {
                $user->setCreatedAt(new \DateTimeImmutable());
                $user->setUpdatedAt(new \DateTimeImmutable());
                $user->setRole('ROLE_USER');

                $entityManager->persist($user);
                $entityManager->flush(); //DB保存
                
                // 保存が成功したらセッションを消す
                $session->remove('register_data');
                
                // 保存後はリダイレクト
                return $this->redirectToRoute('register.complete');
            }
        } else {
            $form = $this->createForm(RegistrationFormType::class, $user);
            return $this->render('register/confirm.html.twig', [
            'confirm_form' => $form->createView(), 
            ]);
        }
    }

    // 登録画面
    #[Route('/register/complete', name: 'register.complete', methods: ['GET','POST'])]
    public function complete(): Response
    {
        return $this->render('register/complete.html.twig');
    }
}