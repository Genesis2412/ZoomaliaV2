<?php

    if($_SERVER['REQUEST_METHOD'] == 'GET')
    {
        // required headers
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");

        if($_GET['type'] == 'dog')
        {
            //including database connection and dog properties
            include_once 'config.php';
            include_once 'pet.php';

            $db = new Database();
            $database = $db->getConnection();

            //initialise dog
            $dog = new Dog($database);

            $query = $dog->readDog();

            if($query > 0)
            {
                http_response_code(200);
                exit(json_encode($query));
            }
            else
            {
                http_response_code(404);
                exit(json_encode(array("Message" => "Sorry, no dogs found!")));
            }
        }
        elseif($_GET['type'] == 'cat')
        {
            //including database connection and dog properties
            include_once 'config.php';
            include_once 'pet.php';

            $db = new Database();
            $database = $db->getConnection();

            //initialise dog
            $cat = new Cat($database);

            $query = $cat->readCat();

            if($query > 0)
            {
                http_response_code(200);
                exit(json_encode($query));
            }
            else
            {
                http_response_code(404);
                exit(json_encode(array("Message" => "Sorry, no cats found!")));
            }
        }               
    }
?>