<?php 

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class SongAPIController extends AbstractController {

  #[Route('api/songs/{id}')]
  public function getSong($id) /*: Response*/ {
      // TODO query the database
      $song = [
        'id' => $id,
        'name' => 'Waterfalls',
        'url' => 'https://symfonycasts.s3.amazonaws.com/sample.mp3',
      ];
      
      // return new JsonResponse($song); //same thing
      return $this->json($song);
  }
}