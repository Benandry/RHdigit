<?php

namespace App\EmployeManagement\Presentation\Web\Controller;

use App\EmployeManagement\Application\UseCase\Query\GetDetailEmploye;
use App\SharedKernel\Presentation\Web\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Requirement\Requirement;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('IS_AUTHENTICATED_FULLY')]
#[Route('/admin/employee/{id}', name: 'app_employee.show', methods: ['GET'], requirements: ['id' => Requirement::DIGITS])]
class GetDetailEmployeController extends AbstractController
{
    public function __invoke(int $id): Response
    {
        $employe = $this->handleQuery(new GetDetailEmploye($id));
        return $this->render('employee/show.html.twig', [
            'employee' => $employe,
        ]);
    }
}
