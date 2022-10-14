<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use App\Entity\Volontaire;


class VolontaireController extends AbstractController
{
    /**
     * @Route("/volontaire", name="app_volontaire")
     */
    /*public function index(): Response
    {
        return $this->render('volontaire/index.html.twig', [
            'controller_name' => 'VolontaireController',
        ]);
    }*/
    /**
     * @Route("/volontaire/add", name="app_volontaire")
     */
    public function create(Request $request): Response{
        $volontaire = new Volontaire();

        $volontaire->setCin("11942595");
        $volontaire->setFirstname("Ala");
        $volontaire->setLastname("Kaddechi");
        $volontaire->setEmail("kaddechiala@gmail.com");
         $form = $this->createFormBuilder($volontaire)
            ->add("cin", IntegerType::class)
            ->add("firstname", TextType::class)
            ->add("lastname", TextType::class)
            ->add("email", EmailType::class)
            ->add('save', SubmitType::class, ['label' => 'Create Volontaire'])
            ->getForm();
        return $this->render('volontaire/index.html.twig', [
            'controller_name' => 'VolontaireController','form'=>$form->createView()
        ]);
    }
}
