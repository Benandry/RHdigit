<?php

namespace App\LeaveManagement\Presentation\Web\Controller\Leave;

use App\LeaveManagement\Domain\Model\Entity\Leave;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Requirement\Requirement;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('IS_AUTHENTICATED_FULLY')]
#[Route('/admin/leave/{id}', name: 'app_leave.delete', methods: ['POST'],requirements: ['id' => Requirement::DIGITS])]
class RemoveLeaveController extends AbstractController
{
    public function __invoke(Request $request, Leave $leave, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $leave->id, $request->request->get('_token'))) {
            $entityManager->remove($leave);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_leave.index', [], Response::HTTP_SEE_OTHER);
    }
}
