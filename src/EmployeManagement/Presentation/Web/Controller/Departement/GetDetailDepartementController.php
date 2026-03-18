<?php

namespace App\EmployeManagement\Presentation\Web\Controller\Departement;

use App\EmployeManagement\Domain\Model\Entity\Departement;
use App\SharedKernel\Presentation\Web\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Requirement\Requirement;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('IS_AUTHENTICATED_FULLY')]
#[Route('/admin/departement/{id}', name: 'app_departement.show', methods: ['GET'], requirements: [ 'id' => Requirement::DIGITS ])]
class GetDetailDepartementController extends AbstractController
{
    public function __invoke(Departement $departement): Response
    {
        return $this->render('departement/show.html.twig', [
            'departement' => $departement,
        ]);
    }
}
