<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction() {
        $template = 'default/homepage.html.twig';
        $args = [
            'name' => 'Artur Torres'
        ];

        return $this->render($template, $args);
        //return new Response('Hello new Soccer League Home Page!');
    }
}
