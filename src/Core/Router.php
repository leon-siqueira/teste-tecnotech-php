<?php

namespace App\Core;

class Router
{
  protected $controller = 'Home';
  protected $method = 'index';
  protected $params = [];

  public function __construct() {
    $URL_ARRAY = explode('/', substr(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), 1));
    $this->get_controller_from_url($URL_ARRAY);
    $this->get_method_from_url($URL_ARRAY);
    $this->get_params_from_url($URL_ARRAY);
    call_user_func_array([$this->controller, $this->method], $this->params);
  }

  private function get_controller_from_url($url)
  {
    if ( !empty($url[0]) && isset($url[0]) ) {
      if ( file_exists(substr($_SERVER['DOCUMENT_ROOT'], 0, -7) . '/src/Controllers/'  . ucfirst($url[0])  . '.php') ) {
        $this->controller = ucfirst($url[0]);
      } else {
        $this->method = 'not_found';
      }
    }
    require substr($_SERVER['DOCUMENT_ROOT'], 0, -7) . '/src/Controllers/' . $this->controller . '.php';
    $this->controller = 'App\Controllers\\' . $this->controller . 'Controller';
    $this->controller = new $this->controller();
  }

  private function get_method_from_url($url)
  {
    if ( !empty($url[1]) && isset($url[1])) {
      if (method_exists($this->controller, $url[1])) {
        $this->method = $url[1];
      } else {
        $this->method = 'not_found';
      }
    }
  }

  private function get_params_from_url($url)
  {
    if (count($url) > 2) {
      $this->params = array_slice($url, 2);
    }
  }
}
