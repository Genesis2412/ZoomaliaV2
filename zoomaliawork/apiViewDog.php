<?php

$curl = curl_init();

if(isset($_POST['request']))
{
    if($_POST['request'] != "All")
    {
        $id = $_POST['request'];
        $url = "https://api.thedogapi.com/v1/breeds/$id";

        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = json_decode(curl_exec($curl));

        //var_dump($response);

        $view = "";
        $view=$view.'<div class="display">';
        $view=$view.'<div class="container">';
        $view=$view.'<div class="row">';
        $view=$view.'<div class="col">';

        $curls = curl_init();
        $imgLink = $response->reference_image_id;

        $urls = "https://api.thedogapi.com/v1/images/$imgLink";

        curl_setopt_array($curls, array(
        CURLOPT_URL => $urls,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $responses = json_decode(curl_exec($curls));

        $view=$view.'<img src="'.$responses->url.'" style="width:420px;height:360px;background-size:cover;">';
        $view=$view.'</div>';
        $view=$view.'<div class="col">';
        $view=$view.'<h3>'.$response->name.'</h3><br>';
        $view=$view.'<h5>'.$response->temperament.'</h5><br>';
        $view=$view.'<h5>Weight: '.$response->weight->imperial.' kgs</h5><br>';
        $view=$view.'<h5>Height: '.$response->height->imperial.'</h5><br>';
        $view=$view.'<button onclick="getBtnValue(this)" value="'.$imgLink.'"><i style="position:relative;bottom:130px;left:270px;" onclick="myFunction(this)" id="heart" class="fa fa-heart-o" aria-hidden="true"></i></button>';
        $view=$view.'</div></div></div>';

        echo $view;

        curl_close($curl);
        curl_close($curls);
    }
    elseif($_POST['request'] == "All")
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://api.thedogapi.com/v1/breeds?limit=12&page=0');
        curl_setopt($curl, CURLOPT_HEADER, 0);  
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 

        $response = curl_exec($curl);

        if($error = curl_error($curl))
        {
            echo $error;
        }
        else
        {
            $result = json_decode($response);

            foreach($result as $final)
            {
                $view="";
                $view=$view.'<div class="col-sm-4 col-lg-3 col-md-3">';                                
                $view=$view.'<div style="border:2px solid #8F8F8F; border-radius:5px; padding:16px; margin-bottom:40px; height:520px;">';                              
                $view=$view.'<img src="'. $final->image->url .'" alt="" class="img-responsive" style="width:280px;height:230px;background-size:cover;">';
                $view=$view.'<h4 style="text-align:center;" class="none">'. $final->name .'</h4>';
                $view=$view.'<p style="text-align:center;" class="none"><strong> id: '. $final->id .'</strong></p>';
                $view=$view.'<p style="text-align:center;font-style: italic;" class="none" >'. $final->temperament .'</p>';
                $view=$view.'<p style="text-align:center;" class="none">'. $final->weight->imperial .' kgs</p>';
                $view=$view.'<p style="text-align:center;" class="none">'. $final->height->imperial .' at the withers</p>';
                $view=$view.'<p style="text-align:center;" class="none">'. $final->life_span .' average life span</p>';
                $view=$view.'<button onclick="getBtnValue(this)" value="'.$final->image->id.'"><i onclick="myFunction(this)" id="heart" class="fa fa-heart-o" aria-hidden="true"></i></button>';
                $view=$view.'</div></div>';

                echo $view;
            }
        }
        curl_close($curl);
    }
}
?>