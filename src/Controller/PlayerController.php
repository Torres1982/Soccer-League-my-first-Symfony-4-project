<?php

namespace App\Controller;

use App\Entity\Player;
use App\Repository\PlayerRepository;
use Doctrine\ORM\EntityManager;
use http\Env\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PlayerController extends Controller
{

    /**
     * It lists details of the one selected Player
     * @Route("/player/{id}", name="player_show")
     * @param Player $player
     * @return Response
     */
//    public function showAction($id) {
//        $em = $this->getDoctrine()->getManager();
//        $player = $em->getRepository('App:Player')->find($id);
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
    public function showAction(Player $player) {
        //$em = $this->getDoctrine()->getManager();
        //$player = $em->getRepository('App:Player')->find($id);

        $template = 'player/show.html.twig';
        $args = [
            'player' => $player
        ];

        if (!$player) {
            $template = 'error/404.html.twig';
        }

        return $this->render($template, $args);
    }

    /**
     * It shows the list of all Players
     * @Route("/players", name="players_list")
     * @return Response
     */
    public function listAction() {
        $em = $this->getDoctrine()->getManager();
        $players = $em->getRepository('App:Player')->findAll();

        $template = 'player/list.html.twig';
        $args = [
          'players' => $players
        ];

        if (!$players) {
            $template = 'error/404.html.twig';
        }

        return $this->render($template, $args);
    }

    /**
     * It removes a Player by given id
     * @param $id
     * @Route("/player/delete/{id}", name="player_delete")
     * @return Response
     */
    public function deleteAction($id) {
        $playerRepository = $this->getDoctrine()->getRepository('App:Player');
        $player = $playerRepository->find($id);

        $em = $this->getDoctrine()->getManager();
        $em->remove($player);
        $em->flush();

        return new Response('Player with id ' . $id . ' successfully deleted!');
    }

    /**
     * It creates a new Player
     * @Route("/create", name="player_create")
     * @return Response
     */
    public function createAction() {
        $player = new Player();
        $player->setFirstName("Mohamed");
        $player->setSurname("Salah");
        $player->setAge(26);
        $player->setNationality("Egypt");
        $player->setClubName("Liverpool");

        $em = $this->getDoctrine()->getManager();
        $em->persist($player);
        $em->flush();

        return $this->redirectToRoute('players_list');
        //return $this->redirectToRoute('player_show', ['id' => $player->getId()]);
        //return new Response('New Player with id ' . $player->getId() . ' successfully created!');
    }

    /**
     * @Route("/player_new", name="player_create_new")
     */
    public function createNewPlayerAction() {
        $args_array = [];
        $template = 'player/newPlayer.html.twig';

        return $this->render($template, $args_array);
    }
}
