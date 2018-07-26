<?php
/**
 * Created by PhpStorm.
 * User: Torres
 * Date: 21/07/2018
 * Time: 19:45
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Player
 * @package App\Entity
 * @ORM\Entity(repositoryClass="App\Repository\PlayerRepository")
 */
class Player
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $first_name;

    /**
     * @ORM\Column(type="string")
     */
    private $surname;

    /**
     * @ORM\Column(type="integer")
     */
    private $age;

    /**
     * @ORM\Column(type="string")
     */
    private $nationality;

    /**
     * @ORM\Column(type="string")
     */
    private $club_name;

//    /**
//     * Player constructor.
//     * @param $id
//     * @param $first_name
//     * @param $surname
//     * @param $age
//     * @param $nationality
//     * @param $club_name
//     */
//    public function __construct($id, $first_name, $surname, $age, $nationality, $club_name) {
//        $this->id = $id;
//        $this->first_name = $first_name;
//        $this->surname = $surname;
//        $this->age = $age;
//        $this->nationality = $nationality;
//        $this->club_name = $club_name;
//    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param mixed $first_name
     */
    public function setFirstName($first_name): void
    {
        $this->first_name = $first_name;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname): void
    {
        $this->surname = $surname;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age): void
    {
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * @param mixed $nationality
     */
    public function setNationality($nationality): void
    {
        $this->nationality = $nationality;
    }

    /**
     * @return mixed
     */
    public function getClubName()
    {
        return $this->club_name;
    }

    /**
     * @param $club_name
     */
    public function setClubName($club_name): void
    {
        $this->club_name = $club_name;
    }


}