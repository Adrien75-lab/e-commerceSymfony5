<?php

namespace App\Controller;

use App\Classe\Mail;
use App\Entity\User;
use App\Form\RegisterType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegisterController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }
    /**
     * @Route("/inscription", name="register")
     */
    public function index(Request $request, UserPasswordEncoderInterface $encoder): Response
    {
        $notification = null;
        $user = new User();
        $form=$this->createForm( RegisterType::class, $user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $user=$form->getData();
            $search_email = $this->entityManager->getRepository(User::class)->findOneByEmail($user->getEmail());
            if(!$search_email)
            {
            $password=$encoder->encodePassword($user,$user->getPassword());
            $user->setPassword($password);
            
            $this->entityManager->persist($user);
            $this->entityManager->flush();
            $mail = new Mail();
            $content = "Bonjour".$user->getFirstname()."<br/>Bienvenue sur la première boutique dédiée au made in France.";
            $mail ->send($user->getEmail(), $user->getFirstname(),'Bienvenue sur la boutique française', $content);
            $notification = "Votre inscription s'est correctement déroulée,vous pouvez dés à présent vous connecter";

            } else {
                $notification = "L'email que vous avez renseigné existe déja.";

            }
            
            
            

            
        }
        return $this->render('register/index.html.twig',[
            'form' => $form -> createView(),
            'notification' => $notification
        ]);
    }
}
