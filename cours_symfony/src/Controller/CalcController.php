<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CalcController extends AbstractController
{
    #[Route('/calcul/{op}', name: 'app_calc')]
    public function index(string $op, Request $request): Response
    {


        $var1 = $request->query->get('var1');
        $var2 = $request->query->get('var2');
        $result = 0;


        switch ($op) {
            case 'plus':
                $result = $var1 + $var2;
                $message = $var1 . '+' . $var2 . '=' . $result;

                break;
            case 'fois':
                $result = $var1 * $var2;
                $message = $var1 . '*' . $var2 . '=' . $result;

                break;
            case 'moins':
                $result = $var1 - $var2;
                $message = $var1 . '-' . $var2 . '=' . $result;

                break;

            case 'div':
                if ($var2 == 0) {
                    $result = "Infinity";
                    $message = $var1 . '/' .  $var2  . '=' . $result;
                } else {
                    $result = $var1 / $var2;
                    $message =  $var1 . '/' . $var2 . '=' . $result;
                }

                break;
                

            default:
                $message = 'Erreur';
                break;
        }


        return $this->render('calc/index.html.twig', [
            'controller_name' => $message,



        ]);
    }
}
