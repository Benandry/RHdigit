<?php

namespace App\EmployeManagement\Presentation\Web\Controller\Contrat;

use App\EmployeManagement\Application\Contrat\Query\GetDetailContrat;
use App\SharedKernel\Presentation\Web\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Requirement\Requirement;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/admin/contrat/{id}', name: 'app_contrat.show', methods: ['GET'], requirements: ['id' => Requirement::DIGITS])]
#[IsGranted('IS_AUTHENTICATED_FULLY')]
class GetDetailContratController extends AbstractController
{
    public function __invoke(int $id): Response
    {
        return $this->render('contrat/show.html.twig', [
            'contrat' => $this->handleQuery(new GetDetailContrat($id)),
        ]);
    }

}
