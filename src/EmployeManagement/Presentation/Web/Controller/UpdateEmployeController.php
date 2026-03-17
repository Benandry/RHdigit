<?php

namespace App\EmployeManagement\Presentation\Web\Controller;

use App\EmployeManagement\Application\UseCase\Command\UpdateEmploye;
use App\EmployeManagement\Domain\Model\Entity\Employee;
use App\Form\EmployeeType;
use App\SharedKernel\Presentation\Web\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('IS_AUTHENTICATED_FULLY')]
#[Route('/admin/employee/{id}/edit', name: 'app_employee.edit', requirements: ['id' => '\d+'], methods: ['GET', 'POST'])]
class UpdateEmployeController extends AbstractController
{
    public function __invoke(Request $request, Employee $employee): Response
    {
        $form = $this->createForm(EmployeeType::class, $employee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->handleCommand(new UpdateEmploye(
                $employee->getId(),
                $employee->getFirstname(),
                $employee->getLastname(),
                $employee->getCin(),
                $employee->getAdresse(),
                $employee->getPhoneNumber(),
                $employee->getSalary(),
                $employee->getPoste(),
                $employee->getContrat(),
                $employee->getDateOfBirth()
            ));

            $this->addFlash('success', 'Update successfull');
            return $this->redirectToRoute('app_employee.index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('employee/edit.html.twig', [
            'employee' => $employee,
            'form' => $form,
        ]);
    }
}
