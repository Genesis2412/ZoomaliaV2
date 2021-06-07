<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        // required headers
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        include_once 'config.php';
        include_once 'pet.php';

        if($_GET['type'] == 'dog')
        {
            $db = new Database();
            $database = $db->getConnection();

            $dog = new Dog($database);
            

            $data = json_decode(file_get_contents('php://input'));

            if(!empty($data->DogId) && !empty($data->Name) && !empty($data->Image) && !empty($data->Status))
            {
                $dog->DogId = $data->DogId;
                $dog->Name = $data->Name;        
                $dog->Breed = $data->Breed;
                $dog->Image = $data->Image;
                $dog->Status = $data->Status;

                if($dog->createDog())
                {
                    http_response_code(201);

                    echo json_encode(array("Message" => "Dog has been added"));
                }
                else
                {
                    http_response_code(503);

                    echo json_encode(array("Message" => "Sorry, there has been an issue, try again!"));
                    
                }
            }
            else
            {
                http_response_code(400);

                echo json_encode(array("Message" => "Please enter all details correctly"));
            }
        }
        elseif($_GET['type'] == 'cat')
        {
            $db = new Database();
            $database = $db->getConnection();

            $cat = new Cat($database);        

            $data = json_decode(file_get_contents('php://input'));

            if(!empty($data->CatId) && !empty($data->Name) && !empty($data->Image) && !empty($data->Status))
            {
                $cat->CatId = $data->CatId;
                $cat->Name = $data->Name;        
                $cat->Breed = $data->Breed;
                $cat->Image = $data->Image;
                $cat->Status = $data->Status;

                if($cat->createCat())
                {
                    http_response_code(201);

                    echo json_encode(array("Message" => "Cat has been added"));
                }
                else
                {
                    http_response_code(503);

                    echo json_encode(array("Message" => "Sorry, there has been an issue, try again!"));
                    
                }
            }
            else
            {
                http_response_code(400);

                echo json_encode(array("Message" => "Please enter all details correctly"));
            }
        }
    }
?>