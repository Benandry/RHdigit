<?php

namespace App\EmployeManagement\Presentation\Web\Controller\Contrat;

use App\EmployeManagement\Application\Contrat\Command\RemoveContrat;
use App\SharedKernel\Presentation\Web\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Requirement\Requirement;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/admin/contrat/{id}', name: 'app_contrat.delete', methods: ['POST'], requirements: ['id' => Requirement::DIGITS])]
#[IsGranted('IS_AUTHENTICATED_FULLY')]
class RemoveContratController extends AbstractController
{
    public function __invoke(Request $request, int $id): Response
    {
        if ($this->isCsrfTokenValid('delete' . $id, $request->request->get('_token'))) {
             $this->handleCommand(new RemoveContrat($id));
        }
                    
        $this->addFlash('success', 'Suppression de contrat avec success');
        
        return $this->redirectToRoute('app_contrat.index', [], Response::HTTP_SEE_OTHER);
    }
}
