<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VistaTecnicoController extends AbstractController
{
    #[Route('/vista/tecnico', name: 'app_vista_tecnico')]
    public function index(): Response
    {
        return $this->render('vista_tecnico/index.html.twig', [
            'controller_name' => 'VistaTecnicoController',
        ]);
    }
}
