<?php
namespace App\Database;

use Dotenv\Dotenv;

class Connection
{
  private $mysqli;

  public function __construct() {
    $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
    $dotenv->load();

    $this->mysqli = new \mysqli(
      $_ENV['DB_HOST'],
      $_ENV['DB_USER'],
      $_ENV['DB_PASS'],
      $_ENV['DB_NAME']
    );

    if ($this->mysqli->connect_error) {
      die('Connect Error (' . $this->mysqli->connect_errno . ') ' . $this->mysqli->connect_error);
    }
  }

  public function get() {
    return $this->mysqli;
  }

  public function query($query) {
    return $this->mysqli->query($query);
  }

  public function close() {
    $this->mysqli->close();
  }
}
