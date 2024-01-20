<?php 

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinylController extends AbstractController {

  #[Route('/')]
  public function index() : Response {

    $tracks = [
      ['song' => 'Gangsta\'s Paradise', 'artist' => 'Coolio'],
      ['song' => 'Waterfalls', 'artist' => 'TLC'],
      ['song' => 'Creep', 'artist' => 'Radiohead'],
      ['song' => 'Kiss from a Rose', 'artist' => 'Seal'],
      ['song' => 'On Bended Knee', 'artist' => 'Boyz II Men'],
      ['song' => 'Fantasy', 'artist' => 'Mariah Carey'],
  ];

    return $this->render('vinyl/homepage.html.twig', [
      'title' => 'Nick\'s 90\'s Sing-a-longs',
      'tracks' => $tracks,
    ]);
  }

  #[Route('/browse/{slug}')]
  public function browse(string $slug = null) : Response {

    if ($slug) {
      $title = "Chosen Genre: " . u(str_replace("-", " ", $slug))->title(true);
    } else {
      $title = u("all genres")->title(true);
    }

    return new Response($title);
  }
}