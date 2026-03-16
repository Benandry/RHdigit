<?php

namespace App\EmployeManagement\Presentation\Web\Controller;

use App\EmployeManagement\Application\UseCase\Command\AddEmploye;
use App\Entity\Employee;
use App\Form\EmployeeType;
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
        $employee = new Employee();
        $form = $this->createForm(EmployeeType::class, $employee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $this->handleCommand(new AddEmploye(
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

            $this->addFlash('success', 'Create successfull');

            return $this->redirectToRoute('app_employee.index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('employee/new.html.twig', [
            'employee' => $employee,
            'form' => $form,
        ]);
    }
}
