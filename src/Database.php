<?php
//use PDO;
class Database
{
    public function __construct(private string $host,
        private string $dbname,
        private string $username,
        private string $password) {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;
    }
    public function getConnection(): PDO
    {
        // $hostname="localhost";
        // $db="product_db";
        // $username="root";
        // $password="root";

        $dsn = "mysql:host={$this->host}; dbname={$this->dbname};charset=utf8";
        // if ($dsn) {
        //     echo "<h1>Connection Successful</h1>";
        // } else {
        //     echo "Connection Failed";
        // }
        return new PDO($dsn, $this->username, $this->password,[
        PDO::ATTR_EMULATE_PREPARES=>false,
        PDO::ATTR_STRINGIFY_FETCHES=>false,
        ]);
    }

}

// $db=mysqli_connect("localhost", "root","root","product_db", 8889) or die(mysqli_error($db));

// if($db){
//             echo "<h1>Connection Successful</h1>";
//         }else{
//             echo "Connection Failed";
//         }
