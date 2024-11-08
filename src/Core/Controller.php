<?php

namespace App\Core;

class Controller
{
  public function view(string $view, array $data = [])
  {
    require substr($_SERVER['DOCUMENT_ROOT'], 0, -7) . '/src/Views/' . $view . '.php';
  }

  public function redirect($uri, $statusCode = 302)
  {
      http_response_code($statusCode);
      header("Location: $uri");
      exit();
  }
}
