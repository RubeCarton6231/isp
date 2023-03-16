<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VistaClienteController extends AbstractController
{
    #[Route('/vista/cliente', name: 'app_vista_cliente')]
    public function index(): Response
    {
        return $this->render('vista_cliente/index.html.twig', [
            'controller_name' => 'VistaClienteController',
        ]);
    }
}
