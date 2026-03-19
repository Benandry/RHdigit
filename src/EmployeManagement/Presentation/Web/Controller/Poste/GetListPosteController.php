<?php

namespace App\EmployeManagement\Presentation\Web\Controller\Poste;

use App\EmployeManagement\Infrastructure\Persistence\Doctrine\Orm\PosteOrmRepository;
use App\SharedKernel\Presentation\Web\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('IS_AUTHENTICATED_FULLY')]
#[Route('/admin/poste/index', name: 'app_poste.index', methods: ["GET"])]
class GetListPosteController extends AbstractController
{
    public function __invoke(PosteOrmRepository $posteRepository): Response
    {
        return $this->render('poste/index.html.twig', [
            'postes' => $posteRepository->findAll(),
        ]);
    }
}
