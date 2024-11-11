<?php
namespace App\Models;

use App\Core\Model;

class Checkout extends Model
{
  private $id;
  private $is_paid;
  private $annuity_year;
  private $member_cpf;
  protected static $TABLE_NAME = 'checkouts';
  protected static $PRIMARY_KEY = 'id';

  public function __construct($data) {
    $this->id = $data['id'];
    if (isset($data['is_paid'])) {
      $this->is_paid = $data['is_paid'];
    } else {
      $this->is_paid = 0;
    }
    $this->annuity_year = $data['annuity_year'];
    $this->member_cpf = $data['member_cpf'];
  }

  public function get_id() {
    return $this->id;
  }

  public function get_member_cpf() {
    return $this->member_cpf;
  }

  public function get_annuity_year() {
    return $this->annuity_year;
  }

  public function get_is_paid() {
    return $this->is_paid;
  }
}
