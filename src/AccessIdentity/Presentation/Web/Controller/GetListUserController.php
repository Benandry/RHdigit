<?php

declare(strict_types=1);

namespace App\AccessIdentity\Presentation\Web\Controller;

use App\AccessIdentity\Application\Query\GetListUser;
use App\AccessIdentity\Application\ReadModel\GetListUserModel;
use App\SharedKernel\Presentation\Web\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * Class GetListUserController
 * 
 * @author Eloi Charly <nandry556@gmaim.com>
 * @package App\AccessIdentity\Presentation\Web\Controller
 */

#[Route(path: '/admin/users/list', name: 'app_user.list', methods: ['GET'])]
final class GetListUserController extends AbstractController
{
    public function __invoke(): Response
    {
        /**
         * @var GetListUserModel $date
         */
        $data = $this->handleQuery(new GetListUser());

        return $this->render('user/list.html.twig',[
            'users' => $data->userItems
        ]);
    }
}