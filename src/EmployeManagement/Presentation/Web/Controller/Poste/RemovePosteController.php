<?php

namespace App\EmployeManagement\Presentation\Web\Controller\Poste;

use App\EmployeManagement\Application\Poste\Command\RemovePoste;
use App\SharedKernel\Presentation\Web\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Requirement\Requirement;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('IS_AUTHENTICATED_FULLY')]
#[Route('/admin/poste/{id}', name: 'app_poste.delete', methods: ['POST'], requirements: [ 'id' => Requirement::DIGITS])]
class RemovePosteController extends AbstractController
{
    public function __invoke(Request $request, int $id): Response
    {
        if ($this->isCsrfTokenValid('delete' . $id, $request->request->get('_token'))) {
            $this->handleCommand(new RemovePoste($id));
        }

        $this->addFlash('success', 'suppression de poste avec success');

        return $this->redirectToRoute('app_poste.index', [], Response::HTTP_SEE_OTHER);
    }
}
