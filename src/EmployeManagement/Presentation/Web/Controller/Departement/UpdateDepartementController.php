<?php

namespace App\EmployeManagement\Presentation\Web\Controller\Departement;

use App\EmployeManagement\Application\Departement\Command\UpdateDepartement;
use App\EmployeManagement\Domain\Model\Entity\Departement;
use App\EmployeManagement\Presentation\Web\Form\DepartementType;
use App\EmployeManagement\Presentation\Web\WriteModel\DepartementModel;
use App\SharedKernel\Presentation\Web\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('IS_AUTHENTICATED_FULLY')]
#[Route('/admin/departement/{id}/edit', name: 'app_departement.edit', methods: ['POST', 'GET'])]
class UpdateDepartementController extends AbstractController
{
    public function __invoke(Request $request, Departement $departement): Response
    {
        $departementModel = DepartementModel::createModelFromEntity($departement);
        $form = $this->createForm(DepartementType::class, $departementModel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $this->handleCommand( new  UpdateDepartement(
                $departement->id,
                $departementModel->name,
                $departementModel->description
            ));

            $this->addFlash('succes','Departement update');
            
            return $this->redirectToRoute('app_departement.index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('departement/edit.html.twig', [
            'departement' => $departement,
            'form' => $form,
        ]);
    }
}
