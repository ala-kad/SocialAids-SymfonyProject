<?php

namespace App\Controller;

use App\Entity\Association;
use Composer\DependencyResolver\Request;
use Doctrine\DBAL\Types\IntegerType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AssociationController extends AbstractController
{
    /**
     * @Route("/SocialAids/association", name= "app_association")
     */
    public function index(): Response
    {
        return $this->render('association/index.html.twig', [
            'controller_name' => 'AssociationController',
        ]);
    }
    public function create(Request $request):Response{
        $association =new Association();
        $association->setFirstname("mayssa");
        $association->setEmail("elmaymayssa1@gmail.com");
        $association->setTel("22559450");
        $association->setCode("3333");
        $association->setLocal("adresse d association ");
        $association->setObject("discription");

        $form = $this->createForm($association)
            ->add("First Name", TextType::class, ['label' => 'votre Nom'])
            ->add("Email", EmailType::class, ['label' => 'Votre Email'])
            ->add("Tel", TextType::class, ['label' => 'votre Tel'])
            ->add("Code", TextType::class, ['label' => 'votre Code'])
            ->add("Local", TextType::class, ['label' => 'votre Local'])
            ->add("Object", TextType::class , ['label' => 'votre Object'])

            ->add('save', SubmitType::class, ['label' => 'Create Volontaire'])
            ->getForm();
        return $this->render('association/index.html.twig');
        }
}

