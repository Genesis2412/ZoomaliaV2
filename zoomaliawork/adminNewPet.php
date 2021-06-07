<?php
	
	session_start();

	//if(isset($_SESSION['adminName']))
	//{
		$view="";

		$view=$view.'<h3>'.'ADD PET'.'</h3>';

		$view=$view.'<div class="container">';
		$view=$view.'<form action="adminAddPet.php" method="POST">';

        $view=$view.'<div class="row">';
		$view=$view.'<div class="col-25">';
		$view=$view.'<label for="Id">Id</label>';
		$view=$view.'</div>';
		$view=$view.'<div class="col-75">';
		$view=$view.'<input type="text" id="id" name="id" placeholder="Pet Id" required>';
		$view=$view.'</div>';
		$view=$view.'</div>';

		$view=$view.'<div class="row">';
		$view=$view.'<div class="col-25">';
		$view=$view.'<label for="Name">Name</label>';
		$view=$view.'</div>';
		$view=$view.'<div class="col-75">';
		$view=$view.'<input type="text" id="name" name="name" placeholder="Pet Name" required>';
		$view=$view.'</div>';
		$view=$view.'</div>';

		$view=$view.'<div class="row">';
		$view=$view.'<div class="col-25">';
		$view=$view.'<label for="Breed">Breed</label>';
		$view=$view.'</div>';
		$view=$view.'<div class="col-75">';
		$view=$view.'<input type="text" id="breed" name="breed" placeholder="Pet Breed" required>';
		$view=$view.'</div>';
		$view=$view.'</div>';

		$view=$view.'<div class="row">';
		$view=$view.'<div class="col-25">';
		$view=$view.'<label for="Image">Image</label>';
		$view=$view.'</div>';
		$view=$view.'<div class="col-75">';
		$view=$view.'<input type="text" id="image" name="image" placeholder="Image Location" required>';
		$view=$view.'</div>';
		$view=$view.'</div>';

		$view=$view.'<div class="row">';
		$view=$view.'<div class="col-25">';
		$view=$view.'<label for="Status">Status</label>';
		$view=$view.'</div>';
		$view=$view.'<div class="col-75">';
		$view=$view.'<input type="text" id="status" name="status" placeholder="Pet Status" required>';
		$view=$view.'</div>';
		$view=$view.'</div>';

		$view=$view.'<div class="row">';
		$view=$view.'<input type="submit" value="Add Pet">';
	    $view=$view.'</div>';

	    $view=$view.'<div class="row" id="error_message">';
	    $view=$view.'</div>';     

		$view=$view.'</form>';
		$view=$view.'</div>';

		echo $view;
	//}
?>









	