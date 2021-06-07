<?php

    class Database
    {
        private $servername = "localhost";
        private $username = "root";
        private $password = "";
        private $database = "Zoomalia";
        public $connection; 

        public function getConnection()
        {
            $this->connection = null;

            $this->connection = mysqli_connect($this->servername,$this->username,$this->password,$this->database);

            if($this->connection)
            {
                return $this->connection;
            }            
        }
    }


?>



    