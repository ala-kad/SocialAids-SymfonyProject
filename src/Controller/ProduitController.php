<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProduitController extends AbstractController
{
   /**
    *
@Route("/produit", name="app_produit")
    * */
    public function index(): Response
    {
        return $this->render('produit/index.html.twig', [
            'controller_name' => 'ProduitController',
        ]);
    }
    /**
     *
    @Route("/produit/add", name="app_produit")
     * */
    public function create(Request $request):Response{
        $produit = new Produit();

        $produit->setref("matprod1");
        $produit->setmontant("500,00");
        $form = $this->createFormBuilder($produit)
            ->add("ref ", IntegerType::class)
            ->add("montant", TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Create Produit'])
            ->getForm();


}}
