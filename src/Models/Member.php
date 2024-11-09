<?php

namespace App\Models;

use App\Models\Checkout;
use App\Core\Model;
use App\Helpers\StringHelper;

class Member extends Model
{
  private string $cpf;
  private string $name;
  private string $email;
  private DateTime $filiation_date;
  protected static $TABLE_NAME = 'members';
  protected static $PRIMARY_KEY = 'cpf';

  public function __construct($data) {
    $this->cpf = StringHelper::sanitize_cpf($data['cpf']);
    $this->name = $data['name'];
    $this->email = $data['email'];
    $this->filiation_date = new DateTime($data['filiation_date']);
  }

  public function getCpf() {
    return $this->cpf;
  }

  public function getName() {
    return $this->name;
  }

  public function getEmail() {
    return $this->email;
  }

  public function getFiliationDate() {
    return $this->filiation_date;
  }

  public function getCheckouts() {
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
