<?php

namespace App\Controller;

use App\Form\ChangePasswordType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AccountChangePasswordController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }
    /**
     * @Route("/compte/change-password", name="app_account_change_password")
     */
    public function index(Request $request, UserPasswordEncoderInterface $encoder): Response
    {

        $user = $this->getUser();
        $form = $this->createForm(ChangePasswordType::class, $user);

        if($form->isSubmitted() && $form->isValid()){
            $old_pwd = $form->get('old_password')->getData();

           if($encoder->isPasswordValid($user,$old_pwd)){
               $new_pwd = $form->get('new_password')->getData();

               dd($new_pwd);
             //  $password = $encoder->encodePassword($user,$new_pwd);

               //$user->setPassword($password);
               //$this->entityManager->flush();
           }
        }

        return $this->render('account/changepassword.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
