<?php

namespace App\EmployeManagement\Presentation\Web\Controller\Contrat;

use App\EmployeManagement\Infrastructure\Persistence\Doctrine\Orm\ContratOrmRepository;
use App\SharedKernel\Presentation\Web\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/admin/contrat/index', name: 'app_contrat.index', methods: ['GET'])]
#[IsGranted('IS_AUTHENTICATED_FULLY')]
class GetListContratController extends AbstractController
{
    public function __invoke(ContratOrmRepository $contratRepository): Response
    {
        return $this->render('contrat/index.html.twig', [
            'contrats' => $contratRepository->findAll(),
        ]);
    }

}
