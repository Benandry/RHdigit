<?php

namespace App\LeaveManagement\Presentation\Web\Controller\Leave;

use App\LeaveManagement\Infrastructure\Persistence\Doctrine\Orm\LeaveOrmRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Requirement\Requirement;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('IS_AUTHENTICATED_FULLY')]
#[Route('/admin/leave/index', name: 'app_leave.index', methods: ['GET'],requirements: ['id' => Requirement::DIGITS])]
class GetListLeaveController extends AbstractController
{
    public function __invoke(LeaveOrmRepository $leaveOrmRepository): Response
    {
        return $this->render('leave/show.html.twig', [
            'leave' => $leaveOrmRepository->findAll(),
        ]);
    }
}
