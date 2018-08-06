<?php
/**
 * Created by PhpStorm.
 * User: Torres
 * Date: 06/08/2018
 * Time: 23:13
 */

namespace App\DataFixtures;

use App\Entity\Player;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class LoadPlayers extends Fixture {

    public function load(ObjectManager $manager) {
        $faker = \Faker\Factory::create();

        $numberOfPlayers = 15;

        for ($i = 0; $i < $numberOfPlayers; $i++) {
            $firstName = $faker->firstName;
            $surname = $faker->lastName;
            $age = $faker->numberBetween(18, 42);
            $nationality = $faker->country;
            $clubName = $faker->city;

            $player = new Player();
            $player->setFirstName($firstName);
            $player->setSurname($surname);
            $player->setAge($age);
            $player->setNationality($nationality);
            $player->setClubName($clubName);

            $manager->persist($player);
        }
        $manager->flush();
    }
}
