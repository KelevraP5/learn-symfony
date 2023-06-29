<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use function Symfony\Component\String\u;

class VinylController extends AbstractController{

    #[Route('/', name: 'app_homepage')]

    public function homepage() : Response {
        $title = 'PB & Jams';
        $subtitle = 'C\'est la musique qu\'on aime';
        $tracks = [
            ['song' => 'Gangsta\'s Paradise', 'artist' => 'Coolio'],
            ['song' => 'Waterfalls', 'artist' => 'TLC'],
            ['song' => 'Creep', 'artist' => 'Radiohead'],
            ['song' => 'Kiss from a Rose', 'artist' => 'Seal'],
            ['song' => 'Fantasy', 'artist' => 'Mariah Carey'],
        ];

        // dd($tracks);
        // dump($tracks);

        return $this->render('vinyl/homepage.html.twig', [
            'title' => $title,
            'subtitle' => $subtitle,
            'tracks' => $tracks,
        ]);
    }

    #[Route('/browse/{slug}', name: 'app_browse')]

    public function browse(string $slug = null) : Response {
        $genre = $slug ? u(str_replace('-', ' ', $slug))->title(true) : null; 

        return $this->render('vinyl/browse.html.twig', [
            'genre' => $genre,
        ]);
    }
}