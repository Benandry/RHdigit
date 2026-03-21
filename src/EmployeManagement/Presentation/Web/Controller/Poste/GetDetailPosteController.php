<?php

namespace App\EmployeManagement\Presentation\Web\Controller\Poste;

use App\EmployeManagement\Application\Poste\Query\GetDetailPoste;
use App\EmployeManagement\Application\Poste\ReadModel\GetDetailPosteModel;
use App\SharedKernel\Presentation\Web\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Requirement\Requirement;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('IS_AUTHENTICATED_FULLY')]
#[Route('/admin/poste/{id}', name: 'app_poste.show', methods: ["GET"], requirements: [ 'id' => Requirement::DIGITS ])]
class GetDetailPosteController extends AbstractController
{
   public function __invoke(int $id): Response
    {
        
        /**
         * @var GetDetailPosteModel $data
         */
        $poste = $this->handleQuery(new GetDetailPoste($id));
        
        return $this->render('poste/index.html.twig', [
            'poste' => $poste,
        ]);
    }
}
