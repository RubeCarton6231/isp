<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VistaGerenteController extends AbstractController
{
    #[Route('/vista/gerente', name: 'app_vista_gerente')]
    public function index(): Response
    {
        return $this->render('vista_gerente/index.html.twig', [
            'controller_name' => 'VistaGerenteController',
        ]);
    }
}
