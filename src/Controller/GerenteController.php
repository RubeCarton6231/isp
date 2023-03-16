<?php

namespace App\Controller;

use App\Entity\Gerente;
use App\Form\GerenteType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

#[Route('/gerente')]
class GerenteController extends AbstractController
{
    #[Security("is_granted('ROLE_ADMIN')")]
    #[Route('/', name: 'app_gerente_index', methods: ['GET']), IsGranted('ROLE_GERENTE')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $gerentes = $entityManager
            ->getRepository(Gerente::class)
            ->findAll();

        return $this->render('gerente/index.html.twig', [
            'gerentes' => $gerentes,
        ]);
    }

    #[Route('/new', name: 'app_gerente_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $gerente = new Gerente();
        $form = $this->createForm(GerenteType::class, $gerente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($gerente);
            $entityManager->flush();

            return $this->redirectToRoute('app_gerente_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('gerente/new.html.twig', [
            'gerente' => $gerente,
            'form' => $form,
        ]);
    }

    #[Route('/{idGerente}', name: 'app_gerente_show', methods: ['GET'])]
    public function show(Gerente $gerente): Response
    {
        return $this->render('gerente/show.html.twig', [
            'gerente' => $gerente,
        ]);
    }

    #[Route('/{idGerente}/edit', name: 'app_gerente_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Gerente $gerente, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(GerenteType::class, $gerente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_gerente_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('gerente/edit.html.twig', [
            'gerente' => $gerente,
            'form' => $form,
        ]);
    }

    #[Route('/{idGerente}', name: 'app_gerente_delete', methods: ['POST'])]
    public function delete(Request $request, Gerente $gerente, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$gerente->getIdGerente(), $request->request->get('_token'))) {
            $entityManager->remove($gerente);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_gerente_index', [], Response::HTTP_SEE_OTHER);
    }
}
