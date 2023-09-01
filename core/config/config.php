<?php
 class MysqlConnection {
    private const SERVERNAME = "localhost";
    private const USERNAME = "root";
    private const PASSWORD = "";
    private const DBNAME = "shop";
   private static $conn ; 
  // Create a connection
  public static function getConnection(){
     self::$conn= new mysqli(self::SERVERNAME, self::USERNAME, self::PASSWORD, self::DBNAME);
        // Check connection
        if (self::$conn ->connect_error) {
            die("Connection failed: " . self::$conn ->connect_error);
        }
          return self::$conn;
  }
 }

?>
