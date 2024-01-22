<?php 

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class SongAPIController extends AbstractController {

  #[Route('api/songs/{id<\d+>}', methods: ['GET'], name: 'api_songs_get_one')]
  public function getSong(int $id, LoggerInterface $logger) /*: Response*/ {
      // TODO query the database
      $song = [
        'id' => $id,
        'name' => 'Waterfalls',
        'url' => 'https://symfonycasts.s3.amazonaws.com/sample.mp3',
      ];

      $logger->info("Returning API response for song {song}", [
        'song' => $id,
      ]);

      // return new JsonResponse($song); //same thing
      return $this->json($song);
  }
}