<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">   
	<link rel="stylesheet" href="./css/style.css" type="text/css" >	
	<title>Order Your Pizza</title>		
	</head>
<body>
<?php
session_start();
include_once 'projectdb.php';
include_once 'function.php';
include_once 'navigationMenu.php';

if (isset($_SESSION['email'])) {
    naviForm($_SESSION['email']);
}
else{
    header("location:index.php");
} 

$db_conn = connectDB();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $error_msg = [];
  
    if (!isset($_POST['first_name'])){
		$error_msg[] = "first_name field not defined";
	} else if (isset($_POST['first_name'])){
		$first_name = trim($_POST['first_name']);
		if (empty($first_name)){
			$error_msg[] = "The first_name field is empty";
		} else {
			if (strlen($first_name) >  20){
				$error_msg[] = "The first_name field contains too many characters";
			}
		}
	}

	if (!isset($_POST['last_name'])){
		$error_msg[] = "last_name field not defined";
	} else if (isset($_POST['last_name'])){
		$last_name = trim($_POST['last_name']);
		if (empty($last_name)){
			$error_msg[] = "The last_name field is empty";
		} else {
			if (strlen($last_name) >  20){
				$error_msg[] = "The last_name field contains too many characters";
			}
		}
	}

	if (!isset($_POST['address'])){
		$error_msg[] = "address field not defined";
	} else if (isset($_POST['address'])){
		$address = trim($_POST['address']);
		if (empty($address)){
			$error_msg[] = "The address field is empty";
		} else {
			if (strlen($address) >  20){
				$error_msg[] = "The address field contains too many characters";
			}
		}
	}

	if (!isset($_POST['city'])){
		$error_msg[] = "City field not defined";
	} else if (isset($_POST['city'])){
		$city = trim($_POST['city']);
		if (empty($city)){
			$error_msg[] = "The city field is empty";
		} else {
			if (strlen($city) >  20){
				$error_msg[] = "The city field contains too many characters";
			}
		}
	}

	if (!isset($_POST['province'])){
		$error_msg[] = "province not checked";
	}

	if (!isset($_POST['postal_code'])){
		$error_msg[] = "postal_code field not defined";
	} else if (isset($_POST['postal_code'])){
		$postal_code = trim($_POST['postal_code']);
		if (empty($postal_code)){
			$error_msg[] = "The postal_code field is empty";
		} else {
			if (strlen($postal_code) >  7){
				$error_msg[] = "The postal_code field contains too many characters";
			}
		}
	} 
    
    // Display error
    if (count($error_msg) > 0) {
      display_error($error_msg);     
    } 
    else {
      if(isset($_POST['submit'])){
        $db_conn = connectDB();
        		  
        $first_name = htmlspecialchars($_POST['first_name']);
		$email = $_SESSION['email'];
        $last_name = htmlspecialchars($_POST['last_name']);
        $address = htmlspecialchars($_POST['address']);
        $city = htmlspecialchars($_POST['city']);
        $province = $_POST['province'];
        $postal_code = htmlspecialchars($_POST['postal_code']);
    
		updateUserInfoData($db_conn, $email, $first_name, $last_name, $address, $city, $province, $postal_code);
		
        header("location:orderSummary.php");          
      }
    }
}
            
?>
  <div>
  
  </style>
    <form method='POST' action="userInformation.php">
      <img src="image/fast.gif" alt="Delivery" style="width:100%">
      <h3><br/>Please fill in the delivery information.</h3>

      <br/>First Name <input type='text' name='first_name' id='first_name'><br/><br/>
      Last Name <input type='text' name='last_name' id='last_name' ><br/><br/>
      Address <input type='text' name='address' id='address' ><br/><br/>
      City <input type='text' name='city' id='city' ><br/><br/>
      Province
      <select type='text' name='province' id='province'>
        <option value="ON">ON : Ontario</option>
	    <option value="AB">AB : Alberta</option>
        <option value="BC">BC : British Columbia</option>
        <option value="MB">MB : Manitoba</option>
        <option value="NB">NB : New Brunswick</option>
        <option value="NL">NL : Newfoundland and Labrador</option>
        <option value="NS">NS : Nova Scotia</option>	
        <option value="PE">PE : Prince Edward Island</option>
        <option value="QC">QC : Quebec</option>
        <option value="SK">SK : Saskatchewan</option>
        <option value="NT">NT : Northwest Territories</option>
        <option value="NU">NU : Nunavut</option>
        <option value="YT">YT : Yukon</option>
      </select><br><br/>
      Postal Code <input type='text' name='postal_code' id='postal_code'><br/><br/> 
      <br/><br/>
      <input type='submit' name='submit' value='SUBMIT'>
    </form>
  </div>
</body>
</html>

  		

