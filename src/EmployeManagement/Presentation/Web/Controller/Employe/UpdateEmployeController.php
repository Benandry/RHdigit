<?php

namespace App\EmployeManagement\Presentation\Web\Controller\Employe;

use App\EmployeManagement\Application\Employe\Command\UpdateEmploye;
use App\EmployeManagement\Domain\Model\Entity\Employee;
use App\EmployeManagement\Presentation\Web\Form\EmployeeType;
use App\EmployeManagement\Presentation\Web\WriteModel\EmployeModel;
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
        $employeModel = EmployeModel::createFromEmployee($employee);
        $form = $this->createForm(EmployeeType::class, $employeModel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->handleCommand(new UpdateEmploye(
                $employee->getId(),
                $employeModel->firstname,
                $employeModel->lastname,
                $employeModel->cin,
                $employeModel->adresse,
                $employeModel->phoneNumber,
                $employeModel->salary,
                $employeModel->poste,
                $employeModel->contrat,
                $employeModel->dateOfBirth
            ));

            $this->addFlash('success', 'Update successfull');
            return $this->redirectToRoute('app_employee.index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('employee/edit.html.twig', [
            'employee' => $employeModel,
            'form' => $form,
        ]);
    }
}
