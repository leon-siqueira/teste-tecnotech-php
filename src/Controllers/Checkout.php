<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Checkout;

class CheckoutController extends Controller
{
  public function index() {
    $checkouts = Checkout::all();
    $this->view('checkout/index', ['checkouts' => $checkouts]);
  }

  public function show($id) {
    $checkout = Checkout::find($id, 'array');
    $this->view('checkout/show', ['checkout' => $checkout]);
  }

  public function new() {
    $this->view('checkout/new');
  }

  public function create() {
    $checkout = new Checkout($_POST);
    $success = $checkout->create($checkout->attributes());
    if ($success) {
      $this->redirect('/checkout/index');
    } else {
      $this->view('checkout/new', ['checkout' => $_POST]);
    }
  }

  public function edit($id) {
    $checkout = Checkout::find($id, 'array');
    $this->view('checkout/edit', ['checkout' => $checkout]);
  }

  public function update($id) {
    $checkout = Checkout::find($id);
    $sanitized_params = $this->permit_params($_POST, ['is_paid','annuity_year','member_cpf']);
    $success = $checkout->update($sanitized_params);
    if ($success) {
      $this->redirect('/checkout/index');
    } else {
      $this->view('checkout/edit', ['checkout' => $checkout->attributes()]);
    }
  }

  public function destroy($id) {
    $success = Checkout::destroy($id);
    $this->redirect('/checkout/index');
  }
}
