<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class AdminPrincipalController extends AbstractController
{   
    #[Security("is_granted('ROLE_ADMIN')")]
    #[Route('/admin/principal', name: 'app_admin_principal', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('admin_principal/index.html.twig', [
            'controller_name' => 'AdminPrincipalController',
        ]);
    }
}
