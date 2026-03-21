<?php

namespace App\EmployeManagement\Presentation\Web\Controller\Poste;

use App\EmployeManagement\Application\Poste\Command\UpdatePoste;
use App\EmployeManagement\Domain\Model\Entity\Poste;
use App\EmployeManagement\Presentation\Web\Form\PosteType;
use App\EmployeManagement\Presentation\Web\WriteModel\PosteModel;
use App\SharedKernel\Presentation\Web\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('IS_AUTHENTICATED_FULLY')]
#[Route('/admin/poste/{id}/edit', name: 'app_poste.edit', methods: ['POST', 'GET'])]
class UpdatePosteController extends AbstractController
{
    public function __invoke(Request $request, Poste $poste): Response
    {
        $posteModel = PosteModel::createModelFromEntity($poste);
        $form = $this->createForm(PosteType::class, $posteModel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->handleCommand(new UpdatePoste(
                $poste->id,
                $posteModel->name,
                $posteModel->description,
                $posteModel->departement,
            ));

            $this->addFlash('success', 'Modification de poste avec success');

            return $this->redirectToRoute('app_poste.index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('poste/edit.html.twig', [
            'poste' => $poste,
            'form' => $form,
        ]);
    }
}
