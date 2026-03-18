<?php

namespace App\EmployeManagement\Presentation\Web\Controller\Contrat;

use App\EmployeManagement\Domain\Model\Entity\Contrat;
use App\SharedKernel\Presentation\Web\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Requirement\Requirement;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/admin/contrat/{id}', name: 'app_contrat.show', methods: ['GET'], requirements: ['id' => Requirement::DIGITS])]
#[IsGranted('IS_AUTHENTICATED_FULLY')]
class GetDetailContratController extends AbstractController
{
      public function __invoke(Contrat $contrat): Response
    {
        return $this->render('contrat/show.html.twig', [
            'contrat' => $contrat,
        ]);
    }

}
