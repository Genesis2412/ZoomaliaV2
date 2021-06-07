<?php

	if(isset($_POST['ID']))
	{
		$Id=$_POST['ID'];

        if(str_contains($Id, 'D')) 
        {
            $data = json_encode(array("DogId" => $Id));

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "http://localhost/zoomaliawork/api/pet/delete/dog");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $output = curl_exec($ch);
            curl_close($ch);

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, 'http://localhost/zoomaliawork/api/pet/dog');
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

                $view="";

                $view=$view.'<div class="table-responsive">';
                $view=$view.'<table class="table table-bordered">';
                $view=$view.'<tr>';
                $view=$view.'<th width="10%">ID</th>';
                $view=$view.'<th width="20%">Name</th>';
                $view=$view.'<th width="30%">Breed</th>';
                $view=$view.'<th width="10%">Status</th>';
                $view=$view.'<th width="40%">Image</th>';
                $view=$view.'<th width="40%"></th>';
                $view=$view.'</tr>';

                foreach($result as $final)
                {      
                    $view=$view.'<tr>';
                    $view=$view.'<td>'.$final->DogId.'</td>';
                    $view=$view.'<td>'.$final->Name.'</td>';
                    $view=$view.'<td>'.$final->Breed.'</td>';  
                    $view=$view.'<td>'.$final->Status.'</td>';
                    $view=$view.'<td><img src="'.$final->Image.'" width="50%"></td>'; 
                    $view=$view.'<td>'.'<button class="btn btn-danger" value="'.$final->DogId.'" onclick="deletePet(this)">Remove</button>'.'</td>';
                    $view=$view.'<td>'.'<button class="btn btn-info" value="'.$final->DogId.'" onclick="getBtnValue(this)" data-toggle="modal" data-target="#myModal">Update</button>'.'</td>';
                    $view=$view.'</tr>';  
                }
            }
                        
            echo $view;

        }
        elseif(str_contains($Id, 'C'))
        {
            $data = json_encode(array("CatId" => $Id));

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "http://localhost/zoomaliawork/api/pet/delete/cat");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $output = curl_exec($ch);
            curl_close($ch);

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, 'http://localhost/zoomaliawork/api/pet/cat');
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

                $view="";

                $view=$view.'<div class="table-responsive">';
                $view=$view.'<table class="table table-bordered">';
                $view=$view.'<tr>';
                $view=$view.'<th width="10%">ID</th>';
                $view=$view.'<th width="20%">Name</th>';
                $view=$view.'<th width="30%">Breed</th>';
                $view=$view.'<th width="10%">Status</th>';
                $view=$view.'<th width="40%">Image</th>';
                $view=$view.'<th width="40%"></th>';
                $view=$view.'</tr>';

                foreach($result as $final)
                {      
                    $view=$view.'<tr>';
                    $view=$view.'<td>'.$final->CatId.'</td>';
                    $view=$view.'<td>'.$final->Name.'</td>';
                    $view=$view.'<td>'.$final->Breed.'</td>';  
                    $view=$view.'<td>'.$final->Status.'</td>';
                    $view=$view.'<td><img src="'.$final->Image.'" width="50%"></td>'; 
                    $view=$view.'<td>'.'<button class="btn btn-danger" value="'.$final->CatId.'" onclick="deletePet(this)">Remove</button>'.'</td>';
                    $view=$view.'<td>'.'<button class="btn btn-info" value="'.$final->CatId.'" onclick="getBtnValue(this)" data-toggle="modal" data-target="#myModal">Update</button>'.'</td>';
                    $view=$view.'</tr>';  
                }
            }
                        
            echo $view;
        } 
	}
?>