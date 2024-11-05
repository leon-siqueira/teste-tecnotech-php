<?php

require_once '../vendor/autoload.php';

$connection = new App\Database\Connection();
$mysqli = $connection->get();

if ($mysqli->ping()) {
  echo 'Connected to the database!';
} else {
  echo 'Not connected to the database!';
}
