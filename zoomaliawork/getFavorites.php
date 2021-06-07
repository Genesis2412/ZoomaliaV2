<?php

$curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.thedogapi.com/v1/favourites',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'x-api-key: 9af6f15e-f9b1-44d0-9355-fc7ae4cd3c38'
    ),
    ));

    $response = json_decode(curl_exec($curl));

    foreach($response as $final)
    {
        $view="";
        $view=$view.'<div class="col-sm-4 col-lg-3 col-md-3">';                                
        $view=$view.'<div style="border:2px solid #8F8F8F; border-radius:5px; padding:16px; margin-bottom:40px; height:350px;">';                              
        $view=$view.'<img src="'. $final->image->url .'" alt="" class="img-responsive" style="width:280px;height:230px;background-size:cover;">';
        $view=$view.'<p style="text-align:center;" class="none"><strong><br><br>For more details, <a href="dogCatalogue.php">Visit Here</a></strong></p>';
        $view=$view.'</div></div>';

        echo $view;
    }
?>