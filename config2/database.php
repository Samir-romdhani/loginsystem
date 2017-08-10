<?php
// used to connect to the database
$host = "us-cdbr-iron-east-03.cleardb.net";
$db_name = "heroku_24b9f95d4c7ac81";
$username = "bd38260874d9e2";
$password = "3a2208f3";
 
try {
    $con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
}
 
// show error
catch(PDOException $exception){
    echo "Connection error: " . $exception->getMessage();
}
?>
