<?php
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

        if(!empty($data->DogId))
        {
            $dog->DogId = $data->DogId;

            if($dog->deleteDog())
            {
                http_response_code(201);

                echo json_encode(array("Message" => "Dog has been deleted"));
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

        if(!empty($data->CatId))
        {
            $cat->CatId = $data->CatId;

            if($cat->deleteCat())
            {
                http_response_code(201);

                echo json_encode(array("Message" => "Cat has been deleted"));
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
?>