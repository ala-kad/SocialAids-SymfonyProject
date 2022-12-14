<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class ViewsRenderController extends AbstractController
{
    /**
     * @Route("/" name = "home_index")
     */
    public function index(){
        return $this->render("home/home.html.twig");
    }
}