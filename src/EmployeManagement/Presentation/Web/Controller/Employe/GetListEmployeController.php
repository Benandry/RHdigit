<?php

namespace App\EmployeManagement\Presentation\Web\Controller\Employe;

use App\EmployeManagement\Application\UseCase\Query\GetListEmploye;
use App\SharedKernel\Presentation\Web\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('IS_AUTHENTICATED_FULLY')]
#[Route('/admin/employee/index', name: 'app_employee.index', methods: ['GET'])]
class GetListEmployeController extends AbstractController
{
    public function __invoke(): Response
    {
        return $this->render('employee/index.html.twig', [
            'employees' => $this->handleQuery(new GetListEmploye())->items,
        ]);
    }
}
