<?php

namespace App\EmployeManagement\Presentation\Web\Controller\Departement;

use App\EmployeManagement\Application\Departement\Command\DeleteDepartement;
use App\SharedKernel\Presentation\Web\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Requirement\Requirement;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('IS_AUTHENTICATED_FULLY')]
#[Route('/admin/departement/{id}', name: 'app_departement.delete', methods: ['POST'], requirements: [ 'id' => Requirement::DIGITS ])]
class RemoveDepartementController extends AbstractController
{
    public function __invoke(Request $request, int $id): Response
    {
        if ($this->isCsrfTokenValid('delete' . $id, $request->request->get('_token'))) {
            $this->handleCommand(new DeleteDepartement($id));
        }

        $this->addFlash('success', 'Departement supprimé avec success');
        
        return $this->redirectToRoute('app_departement.index', [], Response::HTTP_SEE_OTHER);
    }
}
