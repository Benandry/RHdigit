<?php

namespace App\EmployeManagement\Presentation\Web\Controller\Employe;

use App\EmployeManagement\Application\Employe\Command\RemoveEmploye;
use App\EmployeManagement\Domain\Model\Entity\Employee;
use App\SharedKernel\Presentation\Web\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('IS_AUTHENTICATED_FULLY')]
#[Route('/admin/employee/{id}', name: 'app_employee.delete', methods: ['POST'])]
class DeleteEmployeController extends AbstractController
{
    public function __invoke(Request $request, Employee $employee): Response
    {
        if ($this->isCsrfTokenValid('delete' . $employee->getId(), $request->request->get('_token'))) {
            $this->handleCommand(new RemoveEmploye($employee->getId()));
        }

        $this->addFlash('success', 'Remove Employee successfully');

        return $this->redirectToRoute('app_employee.index', [], Response::HTTP_SEE_OTHER);
    }
}
