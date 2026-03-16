<?php

namespace App\Controller;

use App\Entity\Employee;
use App\Form\EmployeeType;
use App\Repository\EmployeeRepository;
use App\UseCase\Command\AddEmploye;
use App\UseCase\Command\RemoveEmploye;
use App\UseCase\Command\UpdateEmploye;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('IS_AUTHENTICATED_FULLY')]
#[Route('/admin/employee', name: 'app_employee.')]
class EmployeeController extends AbstractController
{
    #[Route('/index', name: 'index', methods: ['GET'])]
    public function index(EmployeeRepository $employeeRepository): Response
    {
        return $this->render('employee/index.html.twig', [
            'employees' => $employeeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'create', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
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


    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(Employee $employee): Response
    {
        return $this->render('employee/show.html.twig', [
            'employee' => $employee,
        ]);
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Employee $employee): Response
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

    #[Route('/{id}', name: 'delete', methods: ['POST'])]
    public function delete(Request $request, Employee $employee): Response
    {
        if ($this->isCsrfTokenValid('delete' . $employee->getId(), $request->request->get('_token'))) {
            $this->handleCommand(new RemoveEmploye($employee->getId()));
        }

        $this->addFlash('success', 'Remove Employee successfully');


        return $this->redirectToRoute('app_employee.index', [], Response::HTTP_SEE_OTHER);
    }
}
