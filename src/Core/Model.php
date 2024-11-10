<?php

namespace App\Core;

use App\Core\Connection;
use ReflectionClass;

class Model
{
  protected static $TABLE_NAME;
  protected static $PRIMARY_KEY;

  public function create(array $params) {
    $conn = new Connection();
    $query = "INSERT INTO " . static::$TABLE_NAME . " (" . $this->fields_list($params) . ") VALUES (" . $this->question_marks($params) . ")";
    $stmt = $conn->query($query, $params);
    // TODO: change the object to the created object
    return $stmt->affected_rows === 1;
  }

  public static function destroy($id) {
    $conn = new Connection();
    $query = "DELETE FROM " . static::$TABLE_NAME . " WHERE " . static::$PRIMARY_KEY . " = ?";
    $stmt = $conn->query($query, [$id]);
    return $stmt->affected_rows === 1;
  }

  public function update(array $params) {
    $conn = new Connection();
    $query = "UPDATE " . static::$TABLE_NAME . " SET " . $this->fields_to_set($params) . " WHERE " . static::$PRIMARY_KEY . " = ?";
    $params[] = call_user_func([$this, 'get_' . static::$PRIMARY_KEY]);
    $stmt = $conn->query($query, $params);
    // TODO: change the object to the created object
    return $stmt->affected_rows === 1;
  }

  public static function find($id, $mode = 'object') {
    $conn = new Connection();
    $query = "SELECT * FROM " . static::$TABLE_NAME . " WHERE " . static::$PRIMARY_KEY . " = ?";
    $stmt = $conn->query($query, [$id]);
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();
    if ($mode === 'array') {
      return $row;
    } elseif($mode === 'object') {
      return new static($row);
    }
  }

  public static function all() {
    $conn = new Connection();
    $query = "SELECT * FROM " . static::$TABLE_NAME;
    $stmt = $conn->query($query);
    $result = $stmt->get_result();
    $rows = [];
    while ($row = $result->fetch_assoc()) {
      $rows[] = $row;
    }
    $stmt->close();
    return $rows;
  }

  public function attributes() : array {
    $reflectionClass = new ReflectionClass(get_class($this));
    $properties = $reflectionClass->getProperties();
    $array = [];

    foreach ($properties as $property) {
      if ($property->getName() !== strtoupper($property->getName())) {
        $property->setAccessible(true);
        $array[$property->getName()] = $property->getValue($this);
      }
    }

    return $array;
  }

  private static function fields_list($params) : string {
    $list = implode(', ', array_keys($params));
    return $list;
  }

  private static function fields_to_set($params) : string {
    $set = '';
    foreach (array_keys($params) as $field) {
      $set .= "$field = ?, ";
    }
    return substr($set, 0, -2);
  }

  private function question_marks($params) : string {
    $marks = '';
    foreach ($params as $field) {
      $marks .= '?, ';
    }
    return substr($marks, 0, -2);
  }
}
