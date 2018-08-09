<?php

namespace App\Controller;

use App\Entity\Player;
use App\Repository\PlayerRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PlayerController extends Controller
{
    /**
     * Redirects to the form in order to create a new Player
     * @Route("/player/createNewPlayer", name="player_create_new")
     * @return Response
     */
    public function createNewPlayerAction() {
        $args_array = [];
        $template = 'player/newPlayer.html.twig';

        return $this->render($template, $args_array);
    }

    /**
     * It inserts a new Player to the DB
     * @Route("player/create", name="player_create")
     * @param $firstName
     * @param $surname
     * @param $age
     * @param $nationality
     * @param $clubName
     * @return Response
     */
    public function createAction($firstName, $surname, $age, $nationality, $clubName) {
        $player = new Player();
        $player->setFirstName($firstName);
        $player->setSurname($surname);
        $player->setAge($age);
        $player->setNationality($nationality);
        $player->setClubName($clubName);

        $em = $this->getDoctrine()->getManager();
        $em->persist($player);
        $em->flush();

        return $this->redirectToRoute('players_list');
        //return $this->redirectToRoute('player_show', ['id' => $player->getId()]);
        //return new Response('New Player with id ' . $player->getId() . ' successfully created!');
    }

    /**
     * It handles the creation of a new Player
     * @Route("player/processCreateNewPlayer", name="process__player_create_new")
     * @param Request $request
     * @return Response
     */
    public function processCreateNewPlayerAction(Request $request) {
        // Retrieve values from the HTTP POST data (from user form)
        $firstName = $request->request->get('playerFirstName');
        $surname = $request->request->get('playerSurname');
        $age = $request->request->get('playerAge');
        $nationality = $request->request->get('playerNationality');
        $clubName = $request->request->get('playerClubName');

        if (empty($firstName) || empty($surname) || empty($age) || empty($nationality) || empty($clubName)) {
            $this->addFlash(
              'error',
              'All fields must be filled in!'
            );
            //return $this->createNewPlayerAction($request);
            return $this->redirectToRoute('player_create_new');
        }

        return $this->createAction($firstName, $surname, $age, $nationality, $clubName);
    }

    /**
     * It lists details of the selected Player
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



}
