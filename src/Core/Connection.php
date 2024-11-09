<?php
namespace App\Core;

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

  public function query(string $query, array $params = [])
  {
    error_log($query);
    $stmt = $this->mysqli->prepare($query);
    if ($stmt === false) {
        throw new \Exception('Failed to prepare statement: ' . $this->mysqli->error);
    }

    if ($params) {
      $types = '';
      foreach ($params as $param) {
          if (is_int($param)) {
              $types .= 'i';
          } elseif (is_float($param)) {
              $types .= 'd';
          } elseif (is_string($param)) {
              $types .= 's';
          } else {
              $types .= 'b';
          }
      }
      $stmt->bind_param($types, ...$params);
    }

    $stmt->execute();
    return $stmt;
  }

  public function close() {
    $this->mysqli->close();
  }

  public function __destruct() {
    $this->close();
  }
}