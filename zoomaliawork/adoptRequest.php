<?php

    if(isset($_POST['pId']))
    {
        include_once 'connection.php';

        $pId = $_POST['pId'];
        $pName = $_POST['pName'];
        $pBreed = $_POST['pBreed'];
        $pImage = $_POST['pImage'];
        $pStatus = $_POST['pStatus'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $pNumber = $_POST['pNumber'];
        $hNumber = $_POST['hNumber'];
        $dob = $_POST['dob']; 
        $reason = $_POST['reason'];

        $sql = "INSERT INTO adoption(FullName,Address,PhoneNumber,TelephoneNumber,DOB,Reason,PetId)
                VALUES('$name', '$address', '$pNumber', '$hNumber', '$dob', '$reason', '$pId');";
        $query = mysqli_query($connection, $sql);

        if(str_contains($pId, 'D')) 
        {   
            $status = "InProgress";
            $data = json_encode(array("DogId" => $pId, "Name" => $pName, "Breed" => $pBreed, "Image" => $pImage, "Status" => $status));

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "http://localhost/zoomaliawork/api/pet/update/dog");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $output = curl_exec($ch);
            echo "Your details has been added, For more details Contact Us. Thank you";
            curl_close($ch);
        }
        elseif(str_contains($pId, 'C'))
        {
            $status = "InProgress";
            $data = json_encode(array("CatId" => $pId, "Name" => $pName, "Breed" => $pBreed, "Image" => $pImage, "Status" => $status));

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "http://localhost/zoomaliawork/api/pet/update/cat");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $output = curl_exec($ch);
            echo "Your details has been added, For more details Contact Us. Thank you";
            curl_close($ch);
        }
    }
?>