<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class DefaultController extends AbstractController
{
    #[Route('/default', name: 'app_default')]
    public function oneAuthenicationSucess( Request $request, TokenInterface $token , string $firewallName): ?Response
    {
        if($targetPath = $this->getTargetPath($request->getSession(), $firewallName)) {

        return new RedirectResponse($targetPath);
        }
        return new RedirectResponse($this->urlGenerator->generate('app_default'));
        throw new \Exception('TODO: provide a valid redirect inside' .__FILE__);
    }
}
