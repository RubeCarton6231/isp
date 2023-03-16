<?php

namespace App\Controller;

use App\Entity\Facturacion;
use App\Form\FacturacionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

#[Route('/facturacion')]
class FacturacionController extends AbstractController
{
    #[Security("is_granted('ROLE_FACTURADOR')")]
    #[Route('/', name: 'app_facturacion_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $facturacions = $entityManager
            ->getRepository(Facturacion::class)
            ->findAll();

        return $this->render('facturacion/index.html.twig', [
            'facturacions' => $facturacions,
        ]);
    }

    #[Route('/new', name: 'app_facturacion_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $facturacion = new Facturacion();
        $form = $this->createForm(FacturacionType::class, $facturacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($facturacion);
            $entityManager->flush();

            return $this->redirectToRoute('app_facturacion_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('facturacion/new.html.twig', [
            'facturacion' => $facturacion,
            'form' => $form,
        ]);
    }

    #[Route('/{idFacturacion}', name: 'app_facturacion_show', methods: ['GET'])]
    public function show(Facturacion $facturacion): Response
    {
        return $this->render('facturacion/show.html.twig', [
            'facturacion' => $facturacion,
        ]);
    }

    #[Route('/{idFacturacion}/edit', name: 'app_facturacion_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Facturacion $facturacion, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FacturacionType::class, $facturacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_facturacion_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('facturacion/edit.html.twig', [
            'facturacion' => $facturacion,
            'form' => $form,
        ]);
    }

    #[Route('/{idFacturacion}', name: 'app_facturacion_delete', methods: ['POST'])]
    public function delete(Request $request, Facturacion $facturacion, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$facturacion->getIdFacturacion(), $request->request->get('_token'))) {
            $entityManager->remove($facturacion);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_facturacion_index', [], Response::HTTP_SEE_OTHER);
    }
}
