<?php

namespace App\Models;

use App\Libs\StringHelper;
use App\Models\Checkout;
use App\Models\Annuity;
use App\Core\Connection;
use App\Core\Model;

class Member extends Model
{
  // TODO?: Remove types? They are breaking on contruction, and I don't think that sanitizing every single input is a good idea
  private string $cpf;
  private string $name;
  private string $email;
  private string $filiation_date;
  protected static $TABLE_NAME = 'members';
  protected static $PRIMARY_KEY = 'cpf';

  public function __construct($data) {
    $this->cpf = StringHelper::sanitize_cpf($data['cpf']);
    $this->name = $data['name'];
    $this->email = $data['email'];
    $this->filiation_date = $data['filiation_date'];
  }

  public function get_cpf() {
    return $this->cpf;
  }

  public function get_name() {
    return $this->name;
  }

  public function get_email() {
    return $this->email;
  }

  public function get_filiation_date() {
    return $this->filiation_date;
  }

  public function get_checkouts() {
    $conn = new Connection();
    $query = $conn->query('SELECT * FROM checkouts WHERE member_cpf = ?', [$this->cpf]);
    $result = $query->get_result();
    $checkouts = [];
    while ($row = $result->fetch_assoc()) {
      $checkouts[] = new Checkout($row);
    }
    return $checkouts;
  }

  public function pending_checkouts() {
    $conn = new Connection();
    $query = $conn->query('SELECT * FROM checkouts WHERE member_cpf = ? AND is_paid = 0', [$this->cpf]);
    $result = $query->get_result();
    $checkouts = [];
    while ($row = $result->fetch_assoc()) {
      $checkouts[] = new Checkout($row);
    }
    return $checkouts;
  }

  public function owed_total() {
    $checkouts = $this->pending_checkouts();
    $owed_total = 0;
    foreach ($checkouts as $checkout) {
      $owed_total += Annuity::find($checkout->get_annuity_year())->get_value();
    }
    return $owed_total;
  }
}
