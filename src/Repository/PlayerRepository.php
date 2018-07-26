<?php
/**
 * Created by PhpStorm.
 * User: Torres
 * Date: 21/07/2018
 * Time: 21:34
 */

namespace App\Repository;

use App\Entity\Player;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class PlayerRepository extends ServiceEntityRepository
{
    /**
     * PlayerRepository constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry) {
        parent::__construct($registry, Player::class);
    }
}