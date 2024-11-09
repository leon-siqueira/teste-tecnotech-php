<?php

namespace App\Controllers;

use App\Database\Connection;
use App\Models\Annuity;
use App\Core\Controller;

class AnnuityController extends Controller
{
  public function index() {
    $annuities = Annuity::all();
    $this->view('annuity/index', ['annuities' => $annuities]);
  }

  public function show($id) {
    $annuity = Annuity::find($id, 'array');
    $this->view('annuity/show', ['annuity' => $annuity]);
  }

  public function new() {
    $this->view('annuity/new');
  }

  public function create() {
    $annuity = new Annuity();
    $sanitized_params = $this->permit_params($_POST, ['year','value']);
    $success = $annuity->create($sanitized_params);
    if ($success) {
      $this->redirect('/annuity/index');
    } else {
      // TODO: show status to users. Something that works like a flash message. Maybe using cookies?
      $this->view('annuity/new', ['annuity' => $_POST]);
    }
  }

  public function edit($id) {
    $annuity = Annuity::find($id, 'array');
    $this->view('annuity/edit', ['annuity' => $annuity]);
  }

  public function update($id) {
    $annuity = Annuity::find($id);
    $sanitized_params = $this->permit_params($_POST, ['value']);
    $success = $annuity->update($sanitized_params);
    if ($success) {
      $this->redirect('/annuity/index');
    } else {
      // TODO: message to users
      $this->view('annuity/edit', ['annuity' => $annuity->attributes()]);
    }
  }

  public function destroy($id) {
    $success = Annuity::destroy($id);
    $this->redirect('/annuity/index');
    // TODO: same as above
  }
}
