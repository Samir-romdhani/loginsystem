<!DOCTYPE html>
<html lang="en">
<head>
        <title>labo-membres</title>
        <meta charset="utf-8">
</head>
<body>
<?php
          class Database
          {
                        public $host = "us-cdbr-iron-east-03.cleardb.net";
                        public $db_name = "heroku_24b9f95d4c7ac81";
                        public $username = "bd38260874d9e2";
                        public $password = "3a2208f3";
                        public $con;
                           public function dbConnection()
                            {
                              $this->con = null ;
                                try {
                                $this->con = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8",$this->username, $this->password);
                                $this->con->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION) ;
                               // echo "Connection cv: " ;
                                    }
                             catch(PDOException $exception)
                              {
                              echo "Connection error: " . $exception->getMessage();
                              }
                              return $this->con;
                            }

          }

?>
</body>
</html>