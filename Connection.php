<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/Dotenv.php';
/**
 * Connection class to establish database connection.
 */
class Connection {
  /**
   * A variable which will act as a PDO object.
   *
   * @var \PDO $conn
   */
  public $conn;
  /**
   * A constructor to initialize database connection.
   */
  function __construct() {
    $env = new Dotenv();
    try {
      $this->conn = new PDO($_ENV['dbName'], $_ENV['user'], $_ENV['pass']);
    }
    catch (Exception $e) {
      die("Connection error:" . $e);
    }
  }
}
