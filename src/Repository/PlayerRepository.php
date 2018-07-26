<?php
/**
 * Created by PhpStorm.
 * User: Torres
 * Date: 21/07/2018
 * Time: 21:34
 */

namespace App\Repository;

use App\Entity\Player;

class PlayerRepository
{
    private $players = [];

    /**
     * PlayerRepository constructor.
     */
    public function __construct() {
        $id = 1;
        $player1 = new Player($id, 'Artur', 'Sukiennik', 36, 'Polish', 'Pogon Lebork');
        $this->players[$id] = $player1;

        $id = 2;
        $player2 = new Player($id, 'Cristiano', 'Ronaldo', 34, 'Portuguese', 'Juventus');
        $this->players[$id] = $player2;

        $id = 3;
        $player3 = new Player($id, 'Leo', 'Messi', 32, 'Argentinian', 'Fc Barcelona');
        $this->players[$id] = $player3;
    }

    /**
     * Retrieve the list of all PlayerRepository's players
     * @return array
     */
    public function findAll() {
        return $this->players;
    }

    /**
     * Finds one Player by Player Id
     * @param $id
     * @return mixed|null
     */
    public function find($id) {
        if (array_key_exists($id, $this->players)) {
            return $this->players[$id];
        } else {
            return null;
        }
    }
}