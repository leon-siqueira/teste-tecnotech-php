<?php

namespace App\Models;

use App\Models\Checkout;
use App\Core\Connection;
use App\Core\Model;

class Annuity extends Model
{
  private $year;
  private $value;
  protected static $TABLE_NAME = 'annuities';
  protected static $PRIMARY_KEY = 'year';

  public function __construct($data = []) {
    $this->year = $data['year'];
    $this->value = $data['value'];
  }

  public function get_year() {
    return $this->year;
  }

  public function get_yalue() {
    return $this->value;
  }

  public function get_checkouts() {
    $conn = new Connection();
    $query = $conn->query("SELECT * FROM checkouts WHERE annuity_year = ?", [$this->year]);
    $result = $query->get_result();
    $checkouts = [];
    while ($row = $result->fetch_assoc()) {
        $checkouts[] = new Checkout($this->mysqli, $row);
    }
    $stmt->close();
    return $checkouts;
  }
}
