<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class SongController extends AbstractController{

    #[Route('/api/songs/{id<\d+>}', methods: ['GET'])] // le <\d+> = digit of any length --> évite que si on fait passer une string on ai une erreur 500 mais plutôt une 404.

    public function getSong(int $id, LoggerInterface $logger) : Response {

        // TODO query the database
        $song = [
            'id' => $id,
            'name' => 'Waterfalls',
            'url' => 'https://symfonycasts.s3.amazonaws.com/sample.mp3',
        ];

        $logger->info('Returning API reponse for the {song}', [
            'song' => $id,
        ]);

        // return new JsonResponse($song);
        return $this->json($song);
    }
}