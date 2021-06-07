<?php
	require_once("nusoap/lib/nusoap.php");
	include('connection.php');

	$code = $_POST['getPlace'];

	$wsdl   = "http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso?WSDL";
	$client = new nusoap_client($wsdl, 'wsdl');

	$action = "CapitalCity"; // webservice method name

	$result = array();

	//$code = "MUR";

	$input = '<CapitalCity xmlns="http://www.oorsprong.org/websamples.countryinfo"><sCountryISOCode>'.$code.'</sCountryISOCode></CapitalCity>';

	if (isset($action))
	{
   	 $result= $client->call($action, $input);
	}

	$param = array('sCountryISOCode'=>$code); 
	$result = $client->call('CapitalCity', $param);
	

	$result = json_decode(json_encode($result), true);	

	$area = $result['CapitalCityResult'];

	if($area != "Country not found in the database")
	{
		$sql = "SELECT * FROM branch WHERE name LIKE '$area';";
		$query = mysqli_query($connection, $sql);

		$view = "";
		if($query)
		{
			while($row = mysqli_fetch_assoc($query))
			{
				$view=$view.'<br><p><strong>You may find our Vet Clinic at the details below</strong></p>';
				$view=$view.'Address: '.$row['Address'].', '.$row['Name'].' ';
				$view=$view.'<br><br>Phone Number: <a href="tel:'.$row['Phone'].'">'.$row['Phone'].'</a>';
				$view=$view.'<br><br>Phone Number: <a href="tel:'.$row['Home'].'">'.$row['Home'].'</a>';
			}

			echo $view;
			
		}
		else
		{
			echo '<p style="color:red;"><strong>Sorry, there is no Zoomalia Vet in your Country</strong></p>';
		}
	}
	else
	{
		echo '<p style="color:red;"><strong>Sorry, insert a valid ISO Code</strong></p>';
	}




?>