<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\User;
use App\Form\RegistrationType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;

class SecurityController extends AbstractController
{
    /**
     * @Route("/inscription", name="security_registration")
     */
    public function registration(Request $request, ObjectManager $manager)
    {
        $user = new User();
        $form = $this->createForm(RegistrationType::class, $user);

        $form->handleRequest($request); //analyse requete

        if ($form->isSubmitted() && $form->isValid()) //si form soumis et champs valides
        {
            $manager->persist($user); //on fait persister l'user dans la bd
            $manager->flush(); 
        }

        return $this->render('security/registration.html.twig', 
        ['form' => $form->createview()] );
    }
}
