<?php
// class Database
// {
//     public $conn;
//     protected $hostName = "localhost";
//     protected $userName = 'root';
//     protected $password = '';
//     protected $dbName = 'houseware-store';

//     function __construct()
//     {
//         // $this->conn = mysqli_connect($this->hostName, $this->userName, $this->password);
//         // mysqli_select_db($this->conn, $this->dbName);
//         $this->conn = new mysqli($this->hostName, $this->userName, $this->password, $this->dbName);
//         mysqli_query($this->conn, "SET NAMES 'utf8'");
//         if ($this->conn->connect_error) {
//             echo "Failed to connect database" . $this->conn->connect_error;
//         }
//     }
// }

// define value for connection
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'houseware-store');

// connect
$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
// check connect
if ($conn->connect_error) {
    echo "Connect to database failed" . $conn->connect_error;
}
