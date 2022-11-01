<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EventControlerController extends AbstractController
{
    /**
     *
    @Route("/SocialAids/event", name="app_event")
     * */
    public function index(): Response
    {
        return $this->render('event_controler/index.html.twig', [
            'controller_name' => 'EventControlerController',
        ]);

    }
    public function create(Request $request):Response{
        $event = new Event();

        $event->setnom("collectEcole");
        $event->setdate("10/1/2022");
        $form = $this->createFormBuilder($event)
            ->add("nom ", IntegerType::class)
            ->add("date", TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Create event'])
            ->getForm();
        return $this->render('event/index.html.twig');
}}
