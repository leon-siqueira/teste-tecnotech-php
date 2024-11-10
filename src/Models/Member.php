<?php

namespace App\Models;

use App\Libs\StringHelper;
use App\Models\Checkout;
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
    $stmt = $this->mysqli->prepare("SELECT * FROM checkouts WHERE member_cpf = ?");
    $stmt->bind_param("s", $this->cpf);
    $stmt->execute();
    $result = $stmt->get_result();
    $checkouts = [];
    while ($row = $result->fetch_assoc()) {
      $checkouts[] = new Checkout($this->mysqli, $row);
    }
    $stmt->close();
    return $checkouts;
  }
}
