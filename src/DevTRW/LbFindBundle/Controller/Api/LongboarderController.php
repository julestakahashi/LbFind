<?php
/**
 * Created by PhpStorm.
 * User: julestakahashi
 * Date: 6/12/14
 * Time: 10:50 PM
 */

namespace DevTRW\LbFindBundle\Controller\Api;


use DevTRW\LbFindBundle\Entity\Longboarder;
use DevTRW\LbFindBundle\Entity\LongboarderRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class LongboarderController extends Controller
{

    public function listAction()
    {
        /** @var LongboarderRepository $longBoarderRepo */
        $longBoarderRepo = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository(Longboarder::class)
        ;

        return new JsonResponse($longBoarderRepo->getLongboarderList());
    }
} 