<?php

namespace App\EmployeManagement\Presentation\Web\Controller;

use App\EmployeManagement\Application\UseCase\Command\AddEmploye;
use App\EmployeManagement\Domain\Model\Entity\Employee;
use App\EmployeManagement\Presentation\Web\Form\EmployeeType;
use App\EmployeManagement\Presentation\Web\WriteModel\EmployeModel;
use App\SharedKernel\Presentation\Web\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('IS_AUTHENTICATED_FULLY')]
#[Route('/admin/employee/new', name: 'app_employee.create',methods: ['GET', 'POST'])]
class CreateEmployeController extends AbstractController
{
    public function __invoke(Request $request): Response
    {
        $employeModel = new EmployeModel();
        $form = $this->createForm(EmployeeType::class, $employeModel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $this->handleCommand(new AddEmploye(
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

            $this->addFlash('success', 'Create successfull');

            return $this->redirectToRoute('app_employee.index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('employee/new.html.twig', [
            'employee' => $employeModel,
            'form' => $form,
        ]);
    }
}
