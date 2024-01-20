<?php 

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinylController {

  #[Route('/')]
  public function index() : Response {
    return new Response('Hello World 2');
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