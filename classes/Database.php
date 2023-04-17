<?php
  /**
   * This class connects to the database and sends query to the database.
   * 
   *   @method connect()
   *     This function is used to connect to the database.
   *   @method userDetails()
   *     This function is used to fetch the details of the user from the
   *     database.
   *   @method fetchReaderList()
   *     This function is used to fetch the book list details of the reader from
   *     the database.
   *   @method fetchBookList()
   *     This function is used to fetch the book details from the database.
   *   @method fetchCount()
   *     This function is used to calculate the total number of books in the
   *     database.
   *   @method addBook()
   *     This function is used to add the book to the reader's bucket list or
   *     wish list.
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
     *   @param string $serverName
     *     Stores the servername.
     *   @param string $userName
     *     Stores the username.
     *   @param string $password
     *     Stores the password of the database.
     *   @param string $dbName
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
     *   @param string $serverName
     *     Stores the servername.
     *   @param string $userName
     *     Stores the username.
     *   @param string $password
     *     Stores the password of the database.
     *   @param string $dbName
     *     Stores the name of the database.
     * 
     *   @return mixed
     *     Returns mysqli object or error message while connecting to the
     *     database.
     */
    public function connect($serverName, $userName, $password, $dbName) {
      // Create connection.
      $conn = new mysqli($serverName, $userName, $password, $dbName);
      // Check connection.
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      return $conn;
    }

    /**
     * This function is used to fetch the details of the user from the database.
     * 
     *   @param string $email
     *     Stores the Email-ID of the user.
     * 
     *   @return mixed
     *     Returns an array containing the details of the user if user exists
     *     otherwise NULL.
     */
    public function userDetails(string $userName) {
      $data = "SELECT * FROM Users WHERE username = '$userName'";
      $result = $this->conn->query($data);
      if ($result && mysqli_num_rows($result) > 0) {
        return $result->fetch_assoc();
      }
      return NULL;
    }

    /**
     * This function is used to fetch the book list details of the reader from
     * the database.
     * 
     *   @param string $userName
     *     Stores the user name.
     * 
     *   @return mixed
     *     Returns query result containing the names of the books of each list
     *     if list exists otherwise NULL.
     */
    public function fetchReaderList(string $userName) {
      $readingList = "SELECT * FROM reading_list WHERE username = '$userName' ORDER BY book_name ASC";
      $bucketList = "SELECT * FROM bucket_list WHERE username = '$userName' ORDER BY book_name ASC";
      $response = [];
      $result1 = $this->conn->query($readingList);
      $result2 = $this->conn->query($bucketList);
      if ($result1 && mysqli_num_rows($result1) > 0) {
        $response["readingList"] = $result1;
      }
      if ($result2 && mysqli_num_rows($result2) > 0) {
        $response["bucketList"] = $result2;
      }
      if (count($response) > 0) {
        return $response;
      }
      else {
        return NULL;
      }
    }

    /**
     * This function is used to fetch the book details from the database.
     * 
     *   @param int $end
     *     Stores the limit upto which the records will be fetched from the
     *     database if paramter is passed otherwise 0 will be passed by default.
     * 
     *   @return mysqli_object
     *     Returns the query result containing the names of the books from the
     *     database.
     */
    public function fetchBookList($end) {
      $bookList = "SELECT * FROM Books LIMIT 0, $end";
      $result = $this->conn->query($bookList);
      if ($result && mysqli_num_rows($result) > 0) {
        return $result;
      }
      return NULL;
    }

    /**
     * This function is used to calculate the total number of books in the
     * database.
     * 
     *   @return int
     *     Returns the total number of books in the database.
     */
    public function fetchCount() {
      $bookList = "SELECT * FROM Books";
      $result = $this->conn->query($bookList);
      return mysqli_num_rows($result);
    }

    /**
     * This function is used to add a book to the reader's bucket list or wish
     * list.
     * 
     *   @param string $userName
     *     Stores the username.
     *   @param string $bookId
     *     Stores the book ID of the book to be added in the reader's bucket
     *     list or wish list.
     */
    public function addBook(string $userName, string $bookId) {
      $data = "SELECT book_name, author, publication_date FROM Books WHERE book_id = '$bookId'";
      $result = $this->conn->query($data);
      $bookDetails = $result->fetch_assoc();
      $date = $bookDetails["publication_date"];
      $bookName = $bookDetails["book_name"];
      $author = $bookDetails["author"];
      if ($date !== NULL) {
        $add = "INSERT INTO bucket_list (username, book_id, book_name, author) VALUES ('$userName', '$bookId', '$bookName', '$author')";
      }
      else {
        $add = "INSERT INTO wish_list (username, book_id, book_name, author) VALUES ('$userName', '$bookId', '$bookName', '$author')";
      }
      if ($this->conn->query($add) !== TRUE) {
        echo $conn->error;
      }
    }
  }
