<?php

    if(isset($_POST['id']))
    {
        $Id = $_POST['id'];
        $Name = $_POST['name'];        
        $Breed = $_POST['breed'];
        $Image = $_POST['image'];
        $Status = $_POST['status'];

        if(str_contains($Id, 'D')) 
        {        
            $data = json_encode(array("DogId" => $Id, "Name" => $Name, "Breed" => $Breed, "Image" => $Image, "Status" => $Status));

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "http://localhost/zoomaliawork/api/pet/update/dog");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $output = curl_exec($ch);
            $response = json_decode($output);
            echo $response->Message;
            curl_close($ch);
        }
        elseif(str_contains($Id, 'C'))
        {
            $data = json_encode(array("CatId" => $Id, "Name" => $Name, "Breed" => $Breed, "Image" => $Image, "Status" => $Status));

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "http://localhost/zoomaliawork/api/pet/update/cat");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $output = curl_exec($ch);
            $response = json_decode($output);
            echo $response->Message;
            curl_close($ch);
        }
    }
?>