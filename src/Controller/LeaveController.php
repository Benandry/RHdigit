<?php

namespace App\Controller;

use App\Entity\Leave;
use App\Form\LeaveType;
use App\Repository\LeaveRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('IS_AUTHENTICATED_FULLY')]
#[Route('/admin/leave', name: 'app_leave.')]
class LeaveController extends AbstractController
{
    #[Route('/index', name: 'index', methods: ['GET'])]
    public function index(LeaveRepository $leaveRepository): Response
    {
        return $this->render('leave/index.html.twig', [
            'leaves' => $leaveRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'create', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $leave = new Leave();
        $form = $this->createForm(LeaveType::class, $leave);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($leave);
            $entityManager->flush();

            return $this->redirectToRoute('app_leave.index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('leave/new.html.twig', [
            'leave' => $leave,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(Leave $leave): Response
    {
        return $this->render('leave/show.html.twig', [
            'leave' => $leave,
        ]);
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Leave $leave, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(LeaveType::class, $leave);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_leave.index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('leave/edit.html.twig', [
            'leave' => $leave,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'delete', methods: ['POST'])]
    public function delete(Request $request, Leave $leave, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $leave->getId(), $request->request->get('_token'))) {
            $entityManager->remove($leave);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_leave.index', [], Response::HTTP_SEE_OTHER);
    }
}
