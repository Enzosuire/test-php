<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CalcController extends AbstractController
{
    #[Route('/calcul/{op}', name: 'app_calc')]
    public function index(Request $request, $nub): Response
    {
      

        $value1 = $request->query->get('value1');
        $value2 = $request->query->get('value2');
        $result = 0;


        if ($nub == 'addition') {
            $result = $value1 + $value2;
        }else{

        }

        return $this->render('calc/index.html.twig', [
            'controller_name' => $nub,
        ]);

 

    }
}



