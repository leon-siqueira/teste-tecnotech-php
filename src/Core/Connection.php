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
    try {
      $stmt = $this->mysqli->prepare($query);
      if ($stmt === false) {
          throw new \Exception('Failed to prepare statement: ' . $this->mysqli->error);
      }

      error_log("Query: " . $query);

      if ($params) {
        error_log("With params: " . print_r($params, true));
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
        $stmt->bind_param($types, ...array_values($params));
      }

      $stmt->execute();
      return $stmt;
    } catch (\Throwable $th) {
      error_log("Error on query: " . $query);
      error_log("ERROR MESSAGE: " . $th->getMessage());
      return false;
    }
  }

  public function close() {
    $this->mysqli->close();
  }

  public function __destruct() {
    $this->close();
  }
}
