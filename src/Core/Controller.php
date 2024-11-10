<?php

namespace App\Core;

use App\Libs\PathsHelper;

class Controller
{
  protected function view(string $view, array $data = [])
  {
    require PathsHelper::root() . '/src/Views/' . $view . '.php';
  }

  protected function redirect($uri, $statusCode = 302)
  {
      http_response_code($statusCode);
      header("Location: $uri");
      exit();
  }

  public function not_found()
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
