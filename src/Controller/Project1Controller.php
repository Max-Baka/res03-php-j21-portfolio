<?php

namespace App\Controller;

use App\Entity\Project1;
use App\Form\Project1Type;
use App\Repository\Project1Repository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/project1')]
class Project1Controller extends AbstractController
{
    #[Route('/', name: 'app_project1_index', methods: ['GET'])]
    public function index(Project1Repository $project1Repository): Response
    {
        return $this->render('project1/index.html.twig', [
            'project1s' => $project1Repository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_project1_new', methods: ['GET', 'POST'])]
    public function new(Request $request, Project1Repository $project1Repository): Response
    {
        $project1 = new Project1();
        $form = $this->createForm(Project1Type::class, $project1);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $project1Repository->save($project1, true);

            return $this->redirectToRoute('app_project1_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('project1/new.html.twig', [
            'project1' => $project1,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_project1_show', methods: ['GET'])]
    public function show(Project1 $project1): Response
    {
        return $this->render('project1/show.html.twig', [
            'project1' => $project1,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_project1_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Project1 $project1, Project1Repository $project1Repository): Response
    {
        $form = $this->createForm(Project1Type::class, $project1);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $project1Repository->save($project1, true);

            return $this->redirectToRoute('app_project1_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('project1/edit.html.twig', [
            'project1' => $project1,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_project1_delete', methods: ['POST'])]
    public function delete(Request $request, Project1 $project1, Project1Repository $project1Repository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$project1->getId(), $request->request->get('_token'))) {
            $project1Repository->remove($project1, true);
        }

        return $this->redirectToRoute('app_project1_index', [], Response::HTTP_SEE_OTHER);
    }
}
