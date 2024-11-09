<?php

namespace App\Core;

class Controller
{
  protected function view(string $view, array $data = [])
  {
    require substr($_SERVER['DOCUMENT_ROOT'], 0, -7) . '/src/Views/' . $view . '.php';
  }

  protected function redirect($uri, $statusCode = 302)
  {
      http_response_code($statusCode);
      header("Location: $uri");
      exit();
  }

  protected function not_found($first = false)
  {
    $this->view('not_found');
  }

  protected function permit_params(array $params, array $allowed)
  {
    return array_filter($params, function($key) use ($allowed) {
      return in_array($key, $allowed);
    }, ARRAY_FILTER_USE_KEY);
  }
}