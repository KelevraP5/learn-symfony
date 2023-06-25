<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinylController{

    #[Route('/')]

    public function test() : Response {
        return new Response('Title: PB and Jams' .'<br>'.'Description: a hot music from the 90\'s');
    }

    #[Route('/browse/{slug}')]

    public function browse(string $slug = null) : Response {
        if($slug){
            $title = 'Genre: '.u(str_replace('-', ' ', $slug))->title(true);
        } else {
            $title = 'Voici tout les genres disponibles';
        }

        return new Response($title);
    }
}