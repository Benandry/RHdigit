<?php

namespace App\LeaveManagement\Presentation\Web\Controller\Leave;

use App\LeaveManagement\Presentation\Web\Form\LeaveType;
use App\LeaveManagement\Presentation\Web\WriteModel\LeaveModel;
use App\SharedKernel\Presentation\Web\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('IS_AUTHENTICATED_FULLY')]
#[Route('/admin/leave/new', name: 'app_leave.create', methods: ['GET', 'POST'])]
class RequestLeaveController extends AbstractController
{
    public function __invoke(Request $request, EntityManagerInterface $entityManager): Response
    {
        $leaveModel = new LeaveModel();
        $form = $this->createForm(LeaveType::class, $leaveModel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($leaveModel);
            $entityManager->flush();

            return $this->redirectToRoute('app_leave.index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('leave/new.html.twig', [
            'leave' => $leaveModel,
            'form' => $form,
        ]);
    }
}
