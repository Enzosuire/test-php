<?php

namespace App\Controller;

use Doctrine\ORM\Mapping\Entity;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class HomeController extends AbstractController
{
   
    // #[Route('/home/{nom}', name: 'app_home')]
    #[Route('/home/{nom}', name: 'home_route')]
    public function index(Request $request): Response
    {
        $nom = $request->query->all();
        return $this->render('home/index.html.twig', [
            'controller_name' => $nom,
        ]);
    }



}