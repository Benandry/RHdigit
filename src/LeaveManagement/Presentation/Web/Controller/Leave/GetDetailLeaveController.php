<?php

namespace App\LeaveManagement\Presentation\Web\Controller\Leave;

use App\LeaveManagement\Domain\Model\Entity\Leave;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Requirement\Requirement;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('IS_AUTHENTICATED_FULLY')]
#[Route('/admin/leave/{id}', name: 'app_leave.show', methods: ['GET'],requirements: ['id' => Requirement::DIGITS])]
class GetDetailLeaveController extends AbstractController
{
    public function __invoke(Leave $leave): Response
    {
        return $this->render('leave/show.html.twig', [
            'leave' => $leave,
        ]);
    }
}
