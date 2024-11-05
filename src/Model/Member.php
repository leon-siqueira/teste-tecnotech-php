<?php

namespace App\Model;

use App\Model\Checkout;

class Member
{
  private $mysqli;
  private $cpf;
  private $name;
  private $email;
  private $filiation_date;

  public function __construct($mysqli, $data) {
    $this->mysqli = $mysqli;
    $this->cpf = $data['cpf'];
    $this->name = $data['name'];
    $this->email = $data['email'];
    $this->filiation_date = $data['filiation_date'];
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
    $checkout_results = $stmt->get_result()->fetch_all();
    $checkouts = [];
    foreach ($checkout_results as $result) {
      $data = [
        'id' => $result[0],
        'is_paid' => $result[1],
        'annuity_year' => $result[2],
        'member_cpf' => $result[3]
      ];
      $checkouts[] = new Checkout($this->mysqli, $data);
    }
    $stmt->close();
    return $checkouts;
  }
}
