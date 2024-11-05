<?php

require_once '../vendor/autoload.php';

use App\Database\Connection;
use App\Model\Member;
use App\Model\Annuity;

$connection = new Connection();
$mysqli = $connection->get();

if ($mysqli->connect_error) {
  die('Connection failed: ' . $mysqli->connect_error);
}

$stmt = $mysqli->prepare("SELECT * FROM members");
$stmt->execute();
$result = $stmt->get_result();

echo 'MEMBERS:<br>';
if ($result) {
  while ($member = $result->fetch_assoc()) {
    echo '====================== <br><br>';
    $member = new Member($mysqli, $member);
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

echo '<br><br>ANNUITIES:<br>';
while ($annuity = $result->fetch_assoc()) {
  echo '====================== <br><br>';
  $annuity = new Annuity($mysqli, $annuity);
  echo 'Year: ' . $annuity->getYear() . '<br>';
  echo 'Value: ' . $annuity->getValue() . '<br>';
  echo 'ANNUITY CHECKOUTS:<br>';
  foreach ($annuity->getCheckouts() as $checkout) {
    echo '============ <br>';
    echo 'CPF: ' . $checkout->getMemberCpf() . '<br>';
    echo 'Is Paid? ';
    echo $checkout->getIsPaid() ? 'Yes' : 'No';
    echo '<br>';
  }
}
