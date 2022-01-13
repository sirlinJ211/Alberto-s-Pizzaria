<?php
function insertPizzaData($db_conn, $dough, $cheese, $sauce, $toppings){
	$stmt = $db_conn->prepare('INSERT INTO tblPizza (dough, cheese, sauce, toppings) values(:dough,:cheese,:sauce,:toppings)');
	if (!$stmt){
	  echo "Error ".$db_conn->errorCode()."\nMessage ".implode($db_conn->errorInfo())."\n";
	  exit(1);
	}
	$data = array(":dough" => $dough, ":cheese" => $cheese, ":sauce" => $sauce, ":toppings" => $toppings);
	$status = $stmt->execute($data);
	if(!$status){
			  echo "Error ".$stmt->errorCode()."\nMessage ".implode($stmt->errorInfo())."\n";
		exit(1);
	}
}

function insertSignUpData($db_conn, $email, $contact_number){
	$stmt = $db_conn->prepare('INSERT INTO tblCustomers (email, contact_number) values(:email,:contact_number)');
	if (!$stmt){
	  echo "Error ".$db_conn->errorCode()."\nMessage ".implode($db_conn->errorInfo())."\n";
	  exit(1);
	}
	$data = array(":email" => $email, ":contact_number" => $contact_number);
	$status = $stmt->execute($data);
	if(!$status){
			  echo "Error ".$stmt->errorCode()."\nMessage ".implode($stmt->errorInfo())."\n";
		exit(1);
	}
}

function insertOrderData($db_conn, $email, $date) { 
    
    // $stmt = $db_conn->prepare('INSERT INTO tblOrders (email, date) values(:email,:date)');
    
    $stmt = $db_conn->prepare ('INSERT INTO tblOrders (email, date) values 
    ((select email from tblCustomers where email = :email), :date)');
    if (!$stmt){
        echo "Error ".$db_conn->errorCode()."\nMessage ".implode($db_conn->errorInfo())."\n";
        exit(1);
    }
    $data = array(":email" => $email, ":date" => $date);
    $status = $stmt->execute($data);
    if(!$status){
        echo "Error ".$stmt->errorCode()."\nMessage ".implode($stmt->errorInfo())."\n";
        exit(1);
    }
}

function insertPizzaOrders($db_conn, $date, $dough, $cheese, $sauce, $toppingsArray) {
    
    $stmt = $db_conn->prepare ('INSERT INTO tblPizzaOrders (Orders_ID, Pizza_ID) values ((select Orders_ID from tblOrders where date = :date), (select Pizza_ID from tblPizza where dough = :dough and cheese = :cheese and sauce = :sauce and toppings = :toppings) )'); 	
    
    if (!$stmt){
        echo "Error ".$db_conn->errorCode()."\nMessage ".implode($db_conn->errorInfo())."\n";
        exit(1);
    }
    //$data = array(":Orders_ID" => $Orders_ID, ":Pizza_ID" => $Pizza_ID);
    $data = array(":date" => $date, ":dough" => $dough, ":cheese" => $cheese, ":sauce" => $sauce, ":toppings" => $toppingsArray);
    $status = $stmt->execute($data);
    if(!$status){
        echo "Error ".$stmt->errorCode()."\nMessage ".implode($stmt->errorInfo())."\n";
        exit(1);
    }
}

function checkCustomerData ($db_conn, $email){
	
	$query = $db_conn->prepare( "SELECT * FROM tblCustomers WHERE email =  '". $email ."' AND first_name IS NULL AND last_name IS NULL AND address IS NULL AND city IS NULL AND province IS NULL AND postal_code IS NULL" );
	$query->bindValue( 1, $email );
	$query->execute();	

	if( $query->rowCount() > 0 ) { 
	  header("location:userInformation.php");
	}
	
	else {
	  header("location:orderSummary.php");    
	}
}



function updateUserInfoData($db_conn, $email, $first_name, $last_name, $address, $city, $province, $postal_code){

	$stmt = $db_conn->prepare('UPDATE tblCustomers SET first_name = :first_name ,last_name = :last_name, address = :address, city = :city, province = :province, postal_code = :postal_code WHERE email = :email');

	if (!$stmt){
	  echo "Error ".$db_conn->errorCode()."\nMessage ".implode($db_conn->errorInfo())."\n";
	  exit(1);
	}
	$data = array(":email" => $email, ":first_name" => $first_name, ":last_name" => $last_name, ":address" => $address, ":city" => $city, ":province" => $province, ":postal_code" => $postal_code);
	$status = $stmt->execute($data);
	if(!$status){
			  echo "Error ".$stmt->errorCode()."\nMessage ".implode($stmt->errorInfo())."\n";
		exit(1);
	}
}

function display_error($error_msg){
	echo "<p>\n";
	foreach($error_msg as $v){
		echo $v."<br>\n";
	}
	echo "</p>\n";
}

function display_success(){
  echo "<p>\n The input data is valid </p>\n";
}

function insertReOrderData($db_conn, $date, $Pizza_ID){
	$stmt = $db_conn->prepare ('INSERT INTO tblPizzaOrders (Orders_ID, Pizza_ID) values ((select Orders_ID from tblOrders where date = :date), :Pizza_ID)'); 	
    
    if (!$stmt){
        echo "Error ".$db_conn->errorCode()."\nMessage ".implode($db_conn->errorInfo())."\n";
        exit(1);
    }
    //$data = array(":Orders_ID" => $Orders_ID, ":Pizza_ID" => $Pizza_ID);
    $data = array(":date" => $date, ":Pizza_ID" => $Pizza_ID);
    $status = $stmt->execute($data);
    if(!$status){
        echo "Error ".$stmt->errorCode()."\nMessage ".implode($stmt->errorInfo())."\n";
        exit(1);
    }
}
?>