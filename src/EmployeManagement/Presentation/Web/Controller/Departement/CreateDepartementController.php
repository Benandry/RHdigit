<?php

namespace App\EmployeManagement\Presentation\Web\Controller\Departement;

use App\EmployeManagement\Application\Departement\Command\AddDepartement;
use App\EmployeManagement\Presentation\Web\Form\DepartementType;
use App\EmployeManagement\Presentation\Web\WriteModel\DepartementModel;
use App\SharedKernel\Presentation\Web\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('IS_AUTHENTICATED_FULLY')]
#[Route('/admin/departement/new', name: 'app_departement.create', methods: ['POST', 'GET'])]
class CreateDepartementController extends AbstractController
{
    public function __invoke(Request $request): Response
    {
        $departementModel = new DepartementModel();
        $form = $this->createForm(DepartementType::class, $departementModel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->handleCommand(new AddDepartement(
                name: $departementModel->name,
                description: $departementModel->description
            ));

            return $this->redirectToRoute('app_departement.index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('departement/new.html.twig', [
            'departement' => $departementModel,
            'form' => $form,
        ]);
    }
}
