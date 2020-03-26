<?php
class Database {
//    private $_host = "localhost";
//    private $_username = "root";
//    private $_password = "Drv0B0nsa123";
//    private $_database = "test";
//    private $_connection;
//    private static $_instance; //The single instance
//
//    /*
//    Get an instance of the Database
//    @return Instance
//    */
//    public static function getInstance() {
//        if(!self::$_instance) { // If no instance then make one
//            self::$_instance = new self();
//        }
//        return self::$_instance;
//    }
//
//    // Constructor
//    private function __construct() {
//        $this->_connection = new mysqli($this->_host, $this->_username,
//            $this->_password, $this->_database);
//
//        // Error handling
//        if(mysqli_connect_error()) {
//            trigger_error("Failed to conencto to MySQL: " . mysql_connect_error(),
//                E_USER_ERROR);
//        }
//    }
//
//    // Magic method clone is empty to prevent duplication of connection
//    private function __clone() { }
//
//    // Get mysqli connection
//    public function getConnection() {
//        return $this->_connection;
//    }
    public $host = "localhost";
    public $user = "root";
    public $password = "Drv0B0nsa123";
    public $dbname = "test";

    public $link;
    public $error;
    private static $instance = null;

    public function __construct(){
        $this->link = new mysqli($this->host, $this->user, $this->password, $this->dbname);
        if(!$this->link){
            $this->error = "Greska je u konekciji ".$this->link->connect_error;
            return FALSE;
        }
    }

    public static function getInstance(){
        if(is_null(self::$instance)){
            self::$instance = new Database;
        }
        return self::$instance;
    }

    //Sa privatnom metodom __clone blokira se kopiranje instance
    private function __clone(){

    }

    //Select
    public function select($query){
        $result = $this->link->query($query) or die($this->link->error.__LINE__);
        if($result->num_rows > 0){
            return $result;
        }else{
            return false;
        }
    }

    //Insert
    public function insert($query){
        $insert = $this->link->query($query) or die($this->link->error.__LINE__);
        if($insert){
            return $insert;
        }else{
            return false;
        }
    }

    //Delete
    public function delete($query){
        $delete = $this->link->query($query) or die($this->link->error.__LINE__);
    }

    //Update
    public function update($query){
        $update = $this->link->query($query) or die($this->link->error.__LINE__);
    }
}
