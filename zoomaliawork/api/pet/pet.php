<?php

    class Dog
    {
        private $connection;

        public $DogId;
        public $Name;
        public $Breed;
        public $Image;
        public $Status;

        //default constructor with database connection
        public function __construct($database)
        {
            $this->connection = $database;
        }

        function readDog()
        {
            $sql = "SELECT * FROM Dog;";
            $query = mysqli_query($this->connection, $sql);

            $dog_array = array();
            $fdog_array = array();

            if(mysqli_num_rows($query) > 0)
            {
                while($row = mysqli_fetch_array($query))
                {
                    
                    $dog_array = array
                    (
                        "DogId" => $row['DogId'],
                        "Name" => $row['Name'],
                        "Breed" => $row['Breed'],
                        "Image" => $row['Image'],
                        "Status" => $row['Status']
                    );

                    array_push($fdog_array,$dog_array);
                }
            }
            return $fdog_array;
        }

        function readOneDog()
        {
            $this->DogId = mysqli_real_escape_string($this->connection,$this->DogId);

            $sql = "SELECT * FROM Dog WHERE DogId LIKE '$this->DogId';";
            $query = mysqli_query($this->connection, $sql);

            $dog_array = array();

            if(mysqli_num_rows($query) > 0)
            {
                while($row = mysqli_fetch_array($query))
                {
                    
                    $dog_array = array
                    (
                        "DogId" => $row['DogId'],
                        "Name" => $row['Name'],
                        "Breed" => $row['Breed'],
                        "Image" => $row['Image'],
                        "Status" => $row['Status']
                    );
                }
            }
            return $dog_array;
        }

        function createDog()
        {
            //sanitizing values
            $this->DogId = mysqli_real_escape_string($this->connection,$this->DogId);
            $this->Name = mysqli_real_escape_string($this->connection,$this->Name);
            $this->Image = mysqli_real_escape_string($this->connection,$this->Image);
            $this->Breed = mysqli_real_escape_string($this->connection,$this->Breed);
            $this->Status = mysqli_real_escape_string($this->connection,$this->Status);

            $sql="INSERT INTO dog(DogId,Name,Breed,Image,Status) VALUES('$this->DogId','$this->Name','$this->Breed','$this->Image','$this->Status')";
            $query = mysqli_query($this->connection,$sql);

            if($query)
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        function updateDog()
        {
            //sanitizing values
            $this->DogId = mysqli_real_escape_string($this->connection,$this->DogId);
            $this->Name = mysqli_real_escape_string($this->connection,$this->Name);
            $this->Image = mysqli_real_escape_string($this->connection,$this->Image);
            $this->Breed = mysqli_real_escape_string($this->connection,$this->Breed);
            $this->Status = mysqli_real_escape_string($this->connection,$this->Status);

            $sql="UPDATE dog SET Name='$this->Name', Breed='$this->Breed', Image='$this->Image', Status='$this->Status' WHERE DogId='$this->DogId';";
            $query = mysqli_query($this->connection,$sql);

            if($query)
            {
                return true;
            }
            else
            {
               return false;
            }
        }

        function deleteDog()
        {
            $this->DogId = mysqli_real_escape_string($this->connection,$this->DogId);

            $sql = "DELETE FROM dog WHERE DogId LIKE '$this->DogId';";
            $query = mysqli_query($this->connection, $sql);

            if($query)
            {
                return "true";
            }
            else
            {
                return "false";
            }
        }
    }

    class Cat
    {
        private $connection;

        public $CatId;
        public $Name;
        public $Breed;
        public $Image;
        public $Status;

        //default constructor with database connection
        public function __construct($database)
        {
            $this->connection = $database;
        }

        function readCat()
        {
            $sql = "SELECT * FROM Cat;";
            $query = mysqli_query($this->connection, $sql);

            $cat_array = array();
            $fcat_array = array();

            if(mysqli_num_rows($query) > 0)
            {
                while($row = mysqli_fetch_array($query))
                {
                    
                    $cat_array = array
                    (
                        "CatId" => $row['CatId'],
                        "Name" => $row['Name'],
                        "Breed" => $row['Breed'],
                        "Image" => $row['Image'],
                        "Status" => $row['Status']
                    );

                    array_push($fcat_array,$cat_array);
                }
            }
            return $fcat_array;
        }

        function readOneCat()
        {
            $this->CatId = mysqli_real_escape_string($this->connection,$this->CatId);

            $sql = "SELECT * FROM Cat WHERE CatId LIKE '$this->CatId';";
            $query = mysqli_query($this->connection, $sql);

            $cat_array = array();

            if(mysqli_num_rows($query) > 0)
            {
                while($row = mysqli_fetch_array($query))
                {
                    
                    $cat_array = array
                    (
                        "CatId" => $row['CatId'],
                        "Name" => $row['Name'],
                        "Breed" => $row['Breed'],
                        "Image" => $row['Image'],
                        "Status" => $row['Status']
                    );
                }
            }
            return $cat_array;
        }

        function createCat()
        {
            //sanitizing values
            $this->CatId = mysqli_real_escape_string($this->connection,$this->CatId);
            $this->Name = mysqli_real_escape_string($this->connection,$this->Name);
            $this->Image = mysqli_real_escape_string($this->connection,$this->Image);
            $this->Breed = mysqli_real_escape_string($this->connection,$this->Breed);
            $this->Status = mysqli_real_escape_string($this->connection,$this->Status);

            $sql="INSERT INTO cat(CatId,Name,Breed,Image,Status) VALUES('$this->CatId','$this->Name','$this->Breed','$this->Image','$this->Status')";
            $query = mysqli_query($this->connection,$sql);

            if($query)
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        function updateCat()
        {
            //sanitizing values
            $this->CatId = mysqli_real_escape_string($this->connection,$this->CatId);
            $this->Name = mysqli_real_escape_string($this->connection,$this->Name);
            $this->Image = mysqli_real_escape_string($this->connection,$this->Image);
            $this->Breed = mysqli_real_escape_string($this->connection,$this->Breed);
            $this->Status = mysqli_real_escape_string($this->connection,$this->Status);

            $sql="UPDATE cat SET Name='$this->Name', Breed='$this->Breed', Image='$this->Image', Status='$this->Status' WHERE CatId='$this->CatId';";
            $query = mysqli_query($this->connection,$sql);

            if($query)
            {
                return true;
            }
            else
            {
               return false;
            }
        }

        function deleteCat()
        {
            $this->CatId = mysqli_real_escape_string($this->connection,$this->CatId);

            $sql = "DELETE FROM cat WHERE CatId LIKE '$this->CatId';";
            $query = mysqli_query($this->connection, $sql);

            if($query)
            {
                return "true";
            }
            else
            {
                return "false";
            }
        }
    }
    
?>