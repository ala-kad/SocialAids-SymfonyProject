<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Form\ProduitType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Routing\Annotation\Route;


class ProduitController extends AbstractController
{
    /**
     * @Route("/produit/add", name="produit_register" )
     */
    public function new(Request $request, ManagerRegistry $doctrine, SluggerInterface $slugger): Response
    {
        $produit = new Produit();
        $form = $this->createForm(ProduitType::class, $produit);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $imgPath=$form->get('imgPath')->getData();

            if ($imgPath) {
                $originalFilename = pathinfo($imgPath->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $imgPath->guessExtension();
                try {
                    $imgPath->move(
                        $this->getParameter('brochures_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    $e->getMessage();
                }
                $produit->setimgPath($newFilename);
            }
            $entityManager = $doctrine->getManager();
            $data = $form->getData();
            $entityManager->persist($data);
            $entityManager->flush();
            return $this->redirectToRoute('produit_success');
        }
        return $this->renderForm('produit/form-register.html.twig', ['produit' => $form,]);
    }

    /**
     * @Route("/produit/success", name="produit_success")
     */
    public function successAdd(): Response
    {
        return new Response('Saved new produit ');
    }

    /**
     * @Route("/produit/list", name="produit_list")
     */
    public function listProduit(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository(Produit::class)->findAll();

        return $this->render("produit/list-produit.html.twig",array("listProduit"=>$produits));
    }


    /**
     * @Route("/produit/update/{id}", name="produit_update")
     */
    public function updateProduit(Request $req, ManagerRegistry $doctrine, int $id): Response
    {
        $em = $doctrine->getManager();
        $produit = $em->getRepository(Produit::class)->find($id);
        if (!$produit) {
            throw $this->createNotFoundException(
                'No product found for id ' . $id
            );
        }
    }

    /**
     * @Route("/produit/delete/{id}", name="produit_remove")
     */
    public function removeProduit(ManagerRegistry $doctrine, int $id): Response{
        $em = $doctrine->getManager();
        $produit = $em->getRepository(Produit::class)->find($id);
        if (!$produit) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }
        $em->remove($produit);
        $em->flush();

        return $this->redirectToRoute('produit_list', [
            'id' => $produit->getId()
        ]);
    }

    /**
     * @Route("/produit/delete/success", name="produit_show")
     */
    public function successRemove(): Response
    {
        return new Response('Deleted new produit ');
    }

}