<?php

namespace App\Model;

use App\Model\Payment;

class Annuity
{
  private $mysqli;
  private $year;
  private $value;

  public function __construct($mysqli, $data) {
    $this->mysqli = $mysqli;
    $this->year = $data['year'];
    $this->value = $data['value'];
  }

  public function getYear() {
    return $this->year;
  }

  public function getValue() {
    return $this->value;
  }

  public function getPayments() {
    $stmt = $this->mysqli->prepare("SELECT * FROM payments WHERE annuity_year = ?");
    $stmt->bind_param("i", $this->year);
    $stmt->execute();
    $result = $stmt->get_result();
    $payments = [];
    while ($row = $result->fetch_assoc()) {
        $payments[] = new Payment($this->mysqli, $row);
    }
    $stmt->close();
    return $payments;
  }
}
