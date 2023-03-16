<?php

namespace App\Controller;

use App\Entity\Tecnico;
use App\Form\TecnicoType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

#[Route('/tecnico')]
class TecnicoController extends AbstractController
{
    #[Security("is_granted('ROLE_ADMIN')")]
    #[Route('/', name: 'app_tecnico_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $tecnicos = $entityManager
            ->getRepository(Tecnico::class)
            ->findAll();

        return $this->render('tecnico/index.html.twig', [
            'tecnicos' => $tecnicos,
        ]);
    }

    #[Route('/new', name: 'app_tecnico_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $tecnico = new Tecnico();
        $form = $this->createForm(TecnicoType::class, $tecnico);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($tecnico);
            $entityManager->flush();

            return $this->redirectToRoute('app_tecnico_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tecnico/new.html.twig', [
            'tecnico' => $tecnico,
            'form' => $form,
        ]);
    }

    #[Route('/{idTecnico}', name: 'app_tecnico_show', methods: ['GET'])]
    public function show(Tecnico $tecnico): Response
    {
        return $this->render('tecnico/show.html.twig', [
            'tecnico' => $tecnico,
        ]);
    }

    #[Route('/{idTecnico}/edit', name: 'app_tecnico_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Tecnico $tecnico, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TecnicoType::class, $tecnico);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_tecnico_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tecnico/edit.html.twig', [
            'tecnico' => $tecnico,
            'form' => $form,
        ]);
    }

    #[Route('/{idTecnico}', name: 'app_tecnico_delete', methods: ['POST'])]
    public function delete(Request $request, Tecnico $tecnico, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tecnico->getIdTecnico(), $request->request->get('_token'))) {
            $entityManager->remove($tecnico);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_tecnico_index', [], Response::HTTP_SEE_OTHER);
    }
}
