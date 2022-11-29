<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CompteController extends AbstractController
{
    /**
     *
    @Route("/SocialAids/compte", name="app_compte")
     * */
    public function index(): Response
    {
        return $this->render('compte/index.html.twig', [
            'controller_name' => 'CompteController',
        ]);
    }
        public function create(Request $request):Response{
        $compte = new Compte();
          $compte->setemail("chaima@gmail.com");
          $compte->setmot_pass("12365cg");

        $form = $this->createFormBuilder($compte)
            ->add("nom ", IntegerType::class)
            ->add("mot_pass", TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Create event'])
            ->getForm();
        return $this->render('compte/index.html.twig');
    }


}
