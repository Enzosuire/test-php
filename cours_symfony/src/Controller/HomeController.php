<?php

namespace App\Controller;

use Doctrine\ORM\Mapping\Entity;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Personne;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



class HomeController extends AbstractController
{
   
     // #[Route('/index', name: "index_route")]
    #[Route('/menu', name: "menu_route")]
    public function menu()
    {
     return $this->render('shared/_menu.twig', []);
    }



    
    // #[Route('/index', name: "index_route")]
    #[Route('/home/', name: "home_route")]
    public function index(): Response
    {
        $personne = new Personne();
        $personne->setId(100);
        $personne->setNom("Wick");
        $personne->setPrenom("john");
        $tab =[2,3,8];
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'tableau' => $tab,
            'personne' => $personne
        ]);
    }



}   