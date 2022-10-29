<?php

namespace App\Controller;


use App\Form\VolontairesType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\Type\VolontaireType;
use App\Entity\Volontaire;
use Symfony\Component\Routing\Annotation\Route;


class VolontaireController extends AbstractController{

    /**
     * @Route("/volontaire/add", name="volontaire_register")
     */
public function new():Response{
    $volontaire=new Volontaire();
    $volontaire->setCin("11942595");
    $volontaire->setFirstname("Ala");
    $form = $this->createForm(VolontairesType::class, $volontaire);
    return $this->renderForm('volontaire/form-register.html.twig',['form'=>$form,]);
}
}