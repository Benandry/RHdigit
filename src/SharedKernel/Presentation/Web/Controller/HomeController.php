<?php

declare(strict_types=1);

namespace App\SharedKernel\Presentation\Web\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

#[IsGranted('IS_AUTHENTICATED_FULLY')]
class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ChartBuilderInterface $chartBuilder): Response
    {

     $chart = $chartBuilder->createChart(Chart::TYPE_LINE);

        $chart->setData([
            'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            'datasets' => [
                [
                    'label' => 'My First dataset',
                    'backgroundColor' => 'rgb(255, 99, 132)',
                    'borderColor' => 'rgb(255, 99, 132)',
                    'data' => [0, 10, 5, 2, 20, 30, 45],
                ],
            ],
        ]);

        $chart->setOptions([
            'scales' => [
                'y' => [
                    'suggestedMin' => 0,
                    'suggestedMax' => 100,
                ],
            ],
            'responsive' => true,
        ]);

        $chart2 = $chartBuilder->createChart(Chart::TYPE_BAR);
        $chart2->setData([
            'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            'datasets' => [
                [
                    'label' => 'My Second dataset',
                    'backgroundColor' => 'rgb(54, 162, 235)',
                    'borderColor' => 'rgb(54, 162, 235)',
                    'data' => [5, 15, 10, 8, 25, 35, 50],
                ],
            ],
        ]);
        $chart2->setOptions([
            'scales' => [
                'y' => [
                    'suggestedMin' => 0,
                    'suggestedMax' => 100,
                ],
            ],
            'responsive' => true,
        ]);

 // PIE Chart
        $chart3 = $chartBuilder->createChart(Chart::TYPE_PIE);
        $chart3->setData([
            'labels' => ['HR', 'IT', 'Sales', 'Marketing'],
            'datasets' => [[
                'label' => 'Répartition des départements',
                'backgroundColor' => [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                ],
                'data' => [12, 8, 15, 5],
            ]],
        ]);
        $chart3->setOptions(['responsive' => true]);

        // DOUGHNUT Chart
        $chart4 = $chartBuilder->createChart(Chart::TYPE_DOUGHNUT);
        $chart4->setData([
            'labels' => ['Projet A', 'Projet B', 'Projet C'],
            'datasets' => [[
                'label' => 'Projets en cours',
                'backgroundColor' => ['rgb(255, 99, 132)', 'rgb(54, 162, 235)', 'rgb(255, 205, 86)'],
                'data' => [3, 7, 5],
            ]],
        ]);
        $chart4->setOptions(['responsive' => true]);

        return $this->render('home/index.html.twig', [
            'chart'  => $chart,
            'chart2' => $chart2,
            'chart3' => $chart3,
            'chart4' => $chart4,
        ]);
    }
}
