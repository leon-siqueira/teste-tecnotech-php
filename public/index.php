<?php

require_once '../vendor/autoload.php';

use App\Database\Connection;
use App\Model\Member;
use App\Model\Annuity;

$connection = new App\Database\Connection();
$mysqli = $connection->get();

if ($mysqli->connect_error) {
  die('Connection failed: ' . $mysqli->connect_error);
}

$stmt = $mysqli->prepare("SELECT * FROM members");
$stmt->execute();
$result = $stmt->get_result();
$memberData = $result->fetch_all();

echo 'MEMBERS:<br>';
if ($memberData) {
  foreach ($memberData as $member) {
    echo '====================== <br><br>';
    $data = [
      'cpf' => $member[0],
      'name' => $member[1],
      'email' => $member[2],
      'filiation_date' => $member[3]
    ];
    $member = new Member($mysqli, $data);
    echo 'Name: ' . $member->getName() . '<br>';
    echo 'CPF: ' . $member->getCpf() . '<br>';
    echo 'Email: ' . $member->getEmail() . '<br>';
    echo 'Filiation Date: ' . $member->getFiliationDate() . '<br><br>';
    echo 'MEMBER CHECKOUTS:<br>';
    foreach ($member->getCheckouts() as $checkout) {
      echo '============ <br>';
      echo 'Year: ' . $checkout->getAnnuityYear() . '<br>';
      echo 'Is Paid? ';
      echo $checkout->getIsPaid() ? 'Yes' : 'No';
      echo '<br>';
    }
  }
} else {
  echo 'No member found!';
}

$stmt = $mysqli->prepare("SELECT * FROM annuities");
$stmt->execute();
$result = $stmt->get_result();
$annuityData = $result->fetch_all();

echo '<br><br>ANNUITIES:<br>';
foreach ($annuityData as $annuity) {
  echo '====================== <br><br>';
  $data = [
    'year' => $annuity[0],
    'value' => $annuity[1]
  ];
  $annuity = new Annuity($mysqli, $data);
  echo 'Year: ' . $annuity->getYear() . '<br>';
  echo 'Value: ' . $annuity->getValue() . '<br>';
}
