<?php

namespace App\Controller;

use App\Entity\Player;
use App\Repository\PlayerRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PlayerController extends Controller
{
//    /**
//     * @Route("/player/{id}", name="player_show")
//     * @param $id
//     * @return Response
//     */
//    public function showAction($id) {
//        //$player = new Player(1, 'Artur', 'Sukiennik', 36, 'Polish', 'Pogon Lebork');
//        $playerRepository = new PlayerRepository();
//        $player = $playerRepository->find($id);
//
//        $template = 'player/show.html.twig';
//        $args = [
//            'player' => $player
//        ];
//
//        if (!$player) {
//            $template = 'error/404.html.twig';
//        }
//
//        return $this->render($template, $args);
//    }

//    /**
//     * @Route("/player", name="player_list")
//     */
//    public function listAction() {
//        $playerRepository = new PlayerRepository();
//        $players = $playerRepository->findAll();
//
//        $template = 'player/list.html.twig';
//        $args = [
//          'players' => $players
//        ];
//
//        return $this->render($template, $args);
//    }

    /**
     * @Route("/player/create")
     * @return Response
     */
    public function createAction() {
        $player = new Player();
        $player->setFirstName("Cristiano");
        $player->setSurname("Ronaldo");
        $player->setAge(32);
        $player->setNationality("Portugal");
        $player->setClubName("Juventus");

        $em = $this->getDoctrine()->getManager();
        $em->persist($player);
        $em->flush();

        return new Response('Created new Player with id: ' . $player->getId());
    }
}
