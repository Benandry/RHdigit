<?php

namespace App\LeaveManagement\Presentation\Web\Controller\Leave;

use App\LeaveManagement\Domain\Model\Entity\Leave;
use App\LeaveManagement\Presentation\Web\Form\LeaveType;
use App\LeaveManagement\Presentation\Web\WriteModel\LeaveModel;
use App\SharedKernel\Presentation\Web\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Requirement\Requirement;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('IS_AUTHENTICATED_FULLY')]
#[Route('/admin/leave/{id}/edit', name: 'app_leave.edit', methods: ['GET', 'POST'], requirements: ['id' => Requirement::DIGITS])]
final class UpdateLeaveController extends AbstractController
{
    public function __invoke(Request $request, Leave $leave, EntityManagerInterface $entityManager): Response
    {
        $leaveModel = LeaveModel::createModelFromEntity($leave);
        
        $form = $this->createForm(LeaveType::class, $leaveModel);
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
}
