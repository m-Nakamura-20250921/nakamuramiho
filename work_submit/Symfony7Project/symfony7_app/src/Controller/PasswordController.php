<?php


namespace App\Controller;


use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;


final class PasswordController extends AbstractController
{
   #[Route('/password', name: 'password_reset')]
   public function resetPassword(
       Request $request,
       UserRepository $userRepository, //user情報
       UserPasswordHasherInterface $passwordHasher, //ハッシュ化
       EntityManagerInterface $entityManager,
   ): Response
   {
       if ($request->isMethod('POST')){
           $email = $request->request->get('email');
           $newPassword = $request->request->get('password');
           $comfirmPassword = $request->request->get('confirm_password');


           // パスワード二重チェック
           if ($newPassword !== $comfirmPassword){
               $this->addFlash('error','パスワードが一致しません');
               return $this->render('password/index.html.twig');
           }


           // メールアドレスからユーザーを探す
           $user = $userRepository->findOneBy(['email'=>$email]);
           if (!$user){
                   $this->addFlash('error','入力されたメールアドレスは登録されていません');
                   return $this->render('password/index.html.twig');
           };


           // パスワード上書き保存
           $hashedPassword = $passwordHasher->hashPassword($user, $newPassword);
           $user->setPasswordHash($hashedPassword);
           $entityManager->persist($user);
           $entityManager->flush();


           // 完了
           $this->addFlash('success', 'パスワード再設定しました。再度ログインしてください。');
           return $this->redirectToRoute('login');


       }
       return $this->render('password/index.html.twig', [
           'controller_name' => 'PasswordController',
       ]);
   }
}
