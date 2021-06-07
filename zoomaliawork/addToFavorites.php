<?php

    $curl = curl_init();

    $id = $_POST['ID'];

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.thedogapi.com/v1/favourites',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS =>'{
        "image_id":"'.$id.'",
        "sub_id": "my-user-1234"
    }',
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'x-api-key: 9af6f15e-f9b1-44d0-9355-fc7ae4cd3c38'
    ),
    ));

    //$response = curl_exec($curl));
    $response = json_decode(curl_exec($curl));

    if(isset($response->status))
    {
        echo "Already in favorites";
        //echo $response;
    }

    curl_close($curl);    
?>