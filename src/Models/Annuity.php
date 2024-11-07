<?php

namespace App\Models;

use App\Models\Checkout;

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

  public function getCheckouts() {
    $stmt = $this->mysqli->prepare("SELECT * FROM checkouts WHERE annuity_year = ?");
    $stmt->bind_param("i", $this->year);
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
