<?php
//insertdata

include_once 'projectdb.php';
include_once 'function.php';
if(isset($_POST['submit'])){
   
    $email = $_POST['email'];
    $contact_number = $_POST['contact_number'];  
    $db_conn = connectDB();
    
	// $sql = "INSERT INTO tblCustomers (email, contact_number) VALUES ('$email', '$contactNum')";
	
    // $statement = $db_conn->prepare($sql);
    
    // $inserted = $statement->execute();
    //     if($inserted){
    //        echo "<script> alert('Thank you for sign up! NOW start your order.'); window.location='orderpizza.php' </script>";                 
	//     }
	

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$error = [];
	  
		if (!isset($_POST['email'])) {
		  $error[] = '*Please input email.';
		}    
	   
		if (!isset($_POST['contact_number'])) {
		  $error[] = '*Please input contact number.';
		} 
		
		// Display error
		if (count($error) > 0) {
		  display_error($error);     
		} 
		else {
		  if(isset($_POST['submit'])){
			$db_conn = connectDB();
					  
			$email = $_POST['email'];
			$contact_number = $_POST['contact_number'];

		
			insertSignUpData($db_conn, $email, $contact_number);
			echo 'Thank you for filling in the form.'; 
			header("location:index.php"); 
			
			$_SESSION['email'] = $email;
			$_SESSION['contact_number'] = $contact_number;
		  }
		}
	  }
}

?>

<!DOCTYPE html>  
<html lang="en">
  <head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">   
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


  </head>  
  <body>   
 	 <div class="container">
 		<div class="row">
 			<div class="col-md-4 offset-md-4 form-div">	
				<section class="section-default">
					<h3 class="text-center">Your first time order? Please sign up!</h3> 
					<form action="signup.php" method="post">
						<div class="form-group"> 
							<input type="text" name="email" required placeholder="E-mail"  class="form-control formcontrol-lg">
						</div>		
						<div class="form-group"> 		
							<input type="text" name="contact_number" required placeholder="Contact Number Format : 0000000000" class="form-control formcontrol-lg" pattern="[0-9]{10}" required>					
						</div>		
						<div>				
							<button type="submit" name="submit" class="btn-primary btn-block btn-lg">Sign up</button>		
						</div>	
											
					</form>
				</section>
			</div>
 		</div>
  	</div> 
  </body>   
</html>