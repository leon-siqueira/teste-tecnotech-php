<?php

namespace App\Controllers;

use App\Core\Controller;

class HomeController extends Controller
{
  public function not_found($first = false)
  {
    $this->view('not_found');
  }

  public function index()
  {
    $this->view('home');
  }
}
