<?php
  /**
   * This class connects to the database and sends query to the database.
   */
  class Database {

    /**
     *   @var $conn
     *     Stores the object of database connection.
     */
    private $conn;

    /**
     * Constructor is used to connect to the database and store the object of
     * the database in a class variable after successfully connecting.
     * 
     *   @param $serverName
     *     Stores the servername.
     *   @param $userName
     *     Stores the username.
     *   @param $password
     *     Stores the password of the database.
     *   @param $dbName
     *     Stores the name of the database.
     * 
     *   @return void
     *     Only stores the object of the database.
     */
    public function __construct(string $serverName, string $userName, string $password, string $dbName) {  
      $this->conn = $this->connect($serverName, $userName, $password, $dbName);
    }

    /**
     * This function is used to connect to the database.
     * 
     *   @param $serverName
     *     Stores the servername.
     *   @param $userName
     *     Stores the username.
     *   @param $password
     *     Stores the password of the database.
     *   @param $dbName
     *     Stores the name of the database.
     * 
     *   @return mixed
     *     Returns mysqli object or error message while connecting to the database.
     */
    public function connect($serverName, $userName, $password, $dbName) {
      // Create connection.
      $conn = new mysqli($serverName, $userName, $password, $dbName);
      // Check connection.
      if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      return $conn;
    }

    /**
     * This function is used to fetch the details of the user from the database.
     * 
     *   @param $email
     *     Stores the Email-ID of the user.
     * 
     *   @return mixed
     *     Returns the query result if user details exist otherwise NULL.
     */
    public function userDetails(string $email) {
      
    } 
  }
?>
