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
    private $firstName;

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
    private $clubName;

    /**
     * Player constructor.
     * @param $id
     * @param $firstName
     * @param $surname
     * @param $age
     * @param $nationality
     * @param $clubName
     */
    public function __construct($id, $firstName, $surname, $age, $nationality, $clubName) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->surname = $surname;
        $this->age = $age;
        $this->nationality = $nationality;
        $this->clubName = $clubName;
    }

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
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName): void
    {
        $this->firstName = $firstName;
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
        return $this->clubName;
    }

    /**
     * @param mixed $clubName
     */
    public function setClubName($clubName): void
    {
        $this->clubName = $clubName;
    }


}