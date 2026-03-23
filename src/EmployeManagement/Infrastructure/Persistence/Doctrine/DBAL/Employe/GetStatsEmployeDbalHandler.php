<?php

declare(strict_types=1);

namespace App\EmployeManagement\Infrastructure\Persistence\Doctrine\DBAL\Employe;

use App\EmployeManagement\Application\Employe\Query\EmployeeStatsQuery;
use App\EmployeManagement\Application\Employe\QueryHandler\EmployeeStatsQueryHandler;
use Doctrine\DBAL\Connection;

/**
 * Class GetStatsEmployeDbalHandler
 * 
 * @author Eloi Charly <nandry556@gmail.com>
 * @package App\EmployeManagement\Infrastructure\Persistence\Doctrine\DBAL\Employe
 */

final readonly class GetStatsEmployeDbalHandler implements EmployeeStatsQueryHandler
{
    public function __construct(
        private Connection $connection
    ) {}

    public function __invoke(EmployeeStatsQuery $query): array
    {
        return [
            'byPoste' => $this->countByPoste(),
            'byContrat' => $this->countByContrat(),
            'byDepartement' => $this->countByDepartement(),
        ];
    }

    private function countByPoste(): array
    {
        return $this->connection->createQueryBuilder()
            ->select('p.name as label', 'COUNT(e.id) as value')
            ->from('employee', 'e')
            ->leftJoin('e', 'poste', 'p', 'e.poste_id = p.id')
            ->groupBy('p.id')
            ->executeQuery()
            ->fetchAllAssociative();
    }

    private function countByContrat(): array
    {
        return $this->connection->createQueryBuilder()
            ->select('c.name as label', 'COUNT(e.id) as value')
            ->from('employee', 'e')
            ->leftJoin('e', 'contrat', 'c', 'e.contrat_id = c.id')
            ->groupBy('c.id')
            ->executeQuery()
            ->fetchAllAssociative();
    }

    private function countByDepartement(): array
    {
        return $this->connection->createQueryBuilder()
            ->select('d.name as label', 'COUNT(e.id) as value')
            ->from('employee', 'e')
            ->leftJoin('e', 'poste', 'p', 'e.poste_id = p.id')
            ->leftJoin('p', 'departement', 'd', 'p.departement_id = d.id')
            ->groupBy('d.id')
            ->executeQuery()
            ->fetchAllAssociative();
    }
}