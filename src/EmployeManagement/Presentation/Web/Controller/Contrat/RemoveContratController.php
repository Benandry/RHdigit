<?php

namespace App\EmployeManagement\Presentation\Web\Controller\Contrat;

use App\EmployeManagement\Domain\Model\Entity\Contrat;
use App\SharedKernel\Presentation\Web\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Requirement\Requirement;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/admin/contrat/{id}', name: 'app_contrat.delete', methods: ['POST'], requirements: ['id' => Requirement::DIGITS])]
#[IsGranted('IS_AUTHENTICATED_FULLY')]
class RemoveContratController extends AbstractController
{
    public function __invoke(Request $request, Contrat $contrat, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $contrat->getId(), $request->request->get('_token'))) {
            $entityManager->remove($contrat);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_contrat.index', [], Response::HTTP_SEE_OTHER);
    }
}
