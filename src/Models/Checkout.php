<?php
namespace App\Models;

class Checkout
{
  private $mysqli;
  private $id;
  private $is_paid;
  private $annuity_year;
  private $member_cpf;

  public function __construct($mysqli, $data) {
    $this->mysqli = $mysqli;
    $this->id = $data['id'];
    $this->is_paid = ($data['is_paid'] === 1 ? True : False);
    $this->annuity_year = $data['annuity_year'];
    $this->member_cpf = $data['member_cpf'];
  }

  public function getId() {
    return $this->id;
  }

  public function getMemberCpf() {
    return $this->member_cpf;
  }

  public function getAnnuityYear() {
    return $this->annuity_year;
  }

  public function getIsPaid() {
    return $this->is_paid;
  }
}
