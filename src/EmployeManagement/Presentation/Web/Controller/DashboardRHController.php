<?php

declare(strict_types=1);

namespace App\EmployeManagement\Presentation\Web\Controller;

use App\EmployeManagement\Application\Employe\Query\EmployeeStatsQuery;
use App\SharedKernel\Presentation\Web\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

#[IsGranted('IS_AUTHENTICATED_FULLY')]
#[Route('/', name: 'app_home')]
class DashboardRHController extends AbstractController
{
    public function __invoke(ChartBuilderInterface $chartBuilder): Response
    {
        $data = $this->handleQuery(new EmployeeStatsQuery());

            
        // =========================
        // 📊 POSTE (BAR)
        // =========================
        $chartPoste = $chartBuilder->createChart(Chart::TYPE_BAR);
        $chartPoste->setData([
            'labels' => array_column($data['byPoste'], 'label'),
            'datasets' => [[
                'label' => 'Employés par poste',
                'data' => array_column($data['byPoste'], 'value'),
                'backgroundColor' => 'rgb(54, 162, 235)',
            ]]
        ]);

        // =========================
        // 🥧 CONTRAT (PIE)
        // =========================
        $chartContrat = $chartBuilder->createChart(Chart::TYPE_PIE);
        $chartContrat->setData([
            'labels' => array_column($data['byContrat'], 'label'),
            'datasets' => [[
                'label' => 'Employés par contrat',
                'data' => array_column($data['byContrat'], 'value'),
                'backgroundColor' => [
                    '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0'
                ],
            ]]
        ]);

        // =========================
        // 🍩 DEPARTEMENT (DOUGHNUT)
        // =========================
        $chartDepartement = $chartBuilder->createChart(Chart::TYPE_DOUGHNUT);
        $chartDepartement->setData([
            'labels' => array_column($data['byDepartement'], 'label'),
            'datasets' => [[
                'label' => 'Employés par département',
                'data' => array_column($data['byDepartement'], 'value'),
                'backgroundColor' => [
                    '#FF6384', '#36A2EB', '#FFCE56', '#9966FF'
                ],
            ]]
        ]);

        return $this->render('home/index.html.twig', [
            'chartPoste' => $chartPoste,
            'chartContrat' => $chartContrat,
            'chartDepartement' => $chartDepartement,
        ]);

    }
}
