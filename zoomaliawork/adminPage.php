<?php 
	session_start();
	if(isset($_SESSION['adminName']))
	{
?>
<!DOCTYPE html>
<html lang="en">
  <head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="./css/adminPage.css">
		<title>ADMINISTRATOR || ZOOMALIA</title>
  </head>
  <body>
	  	<!--Navigation Bar-->
	    <header>
	        <div class="logo">
	          <a href="#"><img src="./img/logo.svg" alt="ZoomaliaLogo"></a>
	        </div>

	        <nav>
	          <ul>
	            <li><a class="active" href="adminPage.php">HOME</a></li>
	            <li><a href="#" onclick="allDog();return false;">DOGS</a></li>
				<li><a href="#" onclick="allCat();return false;">CATS</a></li>
	            <li><a href="#" onclick="addPet();return false;">ADD NEW PETS</a></li>
	            <li><a href="adminRegister.php">NEW ADMIN</a></li>
	            <li><a href="adminLogout.php">LOGOUT</a></li>
	          </ul>
	        </nav>

	        <!--Hamburger-->
	        <div class="menu-toggle">
	          <i class="fa fa-bars" aria-hidden="true"></i>
	        </div>
	    </header>

	    <!--Front Page-->
		<div class="content">
	  		<img src="./img/logo.svg" width="20%" style="margin-top:121px;">
	  		<h1 style="padding-top: 20px;">WELCOME <span style="color: green;text-transform: uppercase;"><?php echo $_SESSION['adminName'];?></span> TO ZOOMALIA ADMINISTRATOR PAGE</h1>
	  	</div>

	  	<!-- Modal for update -->
		<div id="myModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Update Details</h4>
		      </div>
		      <div class="modal-body">
		        <form method="POST" id="update_form">
		        	<label>Name</label>
		        	<input type="text" name="name" id="name">
		        	<br>
		        	<label>Breed</label>
		        	<input type="text" name="breed" id="breed">
		        	<br>
		        	<label>Image</label>
		        	<input type="text" name="image" id="image">
		        	<br>
		        	<label>Status</label>
		        	<input type="text" name="status" id="status">
		        	<br><br>
		        	<input type="button" class="btn btn-primary" name="update" id="update" value="Update">
		        </form>
		      </div>
		      <div class="modal-footer">
		      	<p id="error_message" style="text-align: center; color: red; font-size: 18px;"></p>
		      	<p id="success_message" style="text-align: center; color: green; font-size: 18px;"></p>
		      </div>
		    </div>
		  </div>
		</div>

		<div style="clear:both"></div>

		<!--Footer-->
	  	<div class="footer">
	  		<img src="./img/logo.svg" style="width: 3%;height:auto;">
		</div>

		<script src="https://code.jquery.com/jquery-3.3.1.js"></script>

		<!--Navigation Bar Javascript-->
	  	<script type="text/javascript">
	        $(document).ready(function()
	        {
	          $('.menu-toggle').click(function()
	          {
	            $('nav').toggleClass('active')
	          })      
	        });	          
	  	</script>

		<!--Get all dogs on click-->
		<script type="text/javascript">
			function allDog()
			{
				$.ajax({
					type:"POST",
					url:"adminDog.php",
					success: function(value){
						$(".content").html(value);
					}
				});
			}
		</script>

		<!--Get all cats on click-->
		<script type="text/javascript">
			function allCat()
			{
				$.ajax({
					type:"POST",
					url:"adminCat.php",
					success: function(value){
						$(".content").html(value);
					}
				});
			}
		</script>

		<!--Get form add new pets on click-->
		<script type="text/javascript">
			function addPet()
			{
				$.ajax({
					type:"POST",
					url:"adminNewPet.php",
					success: function(value){
						$(".content").html(value);
					}
				});
			}
		</script>	

		<!--Delete product on click-->
		<script type="text/javascript">
			function deletePet(deleteBtn)
			{
				var ID=deleteBtn.value;
				$.ajax({
					type:"POST",
					url:"adminDeletePet.php",
					data: {ID:ID},
					success: function(value){ 
	                  $('.content').fadeIn("Slow").html(value);  
					}
				});
			}
		</script>

		<!--Getting product id on button click-->
		<script type="text/javascript">
			var ID=0;
			function getBtnValue(valBtn)
			{
				ID=valBtn.value;
			}
		</script> 

		<!--Form submission Ajax-->
		<script>  
	      $(document).ready(function(){ 
	        $('#update').click(function(){
	          var id=ID;  
	          var name = $('#name').val();  
	          var breed = $('#breed').val();  
	          var image = $('#image').val();
	          var status = $('#status').val();  
	          if(name == '' || breed == '' ||  image == '' ||  status == '') 
	          { 
	            $('#error_message').html("All fields are required");
	          } 
	          else  
	          { 
	            $('#error_message').html(''); 
	            $.ajax({  
	                    url:"adminUpdatePet.php", 
	                    method:"POST",  
	                    data:{id:id, name:name, breed:breed, image:image, status:status},
	                    success: function(value){
	                      $("#update_form").trigger("reset");  
                          $('#success_message').fadeIn().html(value);  
                          setTimeout(function(){
                               $('#success_message').fadeOut("Slow"); 
                          }, 5000); 
							}		
	                    });
	                  }
	                });
	              });
		</script>
  	</body>
  </html>
<?php  
}
?>