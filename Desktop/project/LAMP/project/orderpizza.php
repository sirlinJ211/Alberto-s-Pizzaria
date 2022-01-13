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
    $error = [];
  
    if (!isset($_POST['dough'])) {
      $error[] = '*Please choose the dough.';
    }    
   
    if (!isset($_POST['sauce'])) {
      $error[] = '*Please choose the sauce.';
    } 
    
    if (!isset($_POST['cheese'])) {
        $error[] = '*Please choose the cheese.';
    } 
    
    if (!isset($_POST['toppings'])) {
      $error[] = '*Please choose the toppings.';
    } 
    
    // Display error
    if (count($error) > 0) {
      display_error($error);     
    } 
    else {

      $db_conn = connectDB();

      $email = $_SESSION['email'];
      $t = time();
      $date = strftime("%A %d %B %Y %T", $t);            		  
      $dough = $_POST['dough'];
      $cheese = $_POST['cheese'];
      $sauce = $_POST['sauce'];
      $toppings = $_POST['toppings'];
      $toppingsArray = implode(',', $_POST['toppings']);

      if(isset($_POST['submit'])){ 
        $_SESSION['date'] = $date;  

        insertPizzaData($db_conn, $dough, $cheese, $sauce, $toppingsArray);
        insertOrderData($db_conn,$email, $date);          
        insertPizzaOrders($db_conn, $date, $dough, $cheese, $sauce, $toppingsArray);  
        checkCustomerData($db_conn, $email);

      }      
      
      if(isset($_POST['add'])){           
        $_SESSION['date'] = $date;
        // $dayDate = substr_replace($date,"________", strlen($date)-8, strlen($date));

        insertPizzaData($db_conn, $dough, $cheese, $sauce, $toppingsArray);
        insertOrderData($db_conn,$email, $date);           
        insertPizzaOrders($db_conn, $date, $dough, $cheese, $sauce, $toppingsArray);
        echo "<script>alert('Do you want to order more pizza?');</script>"; 
      }
    }
  }
  

            
?>
 <div>   
      <form method='POST' action="orderpizza.php">
      <img src="image/orderpizza.png" alt="pizza" style="width:100%">
      <h3>Please choose below!</h3>
      <!-- <button>Single Pizza</button> <button>Multiple Pizza</button><br><br> -->
      <label for="dough">Dough (Please choose 1 of 3 options) </label><br><br>
      <!--Radio Buttons-->
      <!--Dough-->
      <input type="radio" id="regular" name="dough" value="regular">
      <label for="regular">Regular</label><br>
      <input type="radio" id="thin" name="dough" value="thin">
      <label for="thin">Thin</label><br>
      <input type="radio" id="thick" name="dough" value="thick">
      <label for="thick">Thick</label><br><br>
      <!--Sauce-->
      <label for="sauce">Sauce (Please choose 1 of 3 options) </label><br/><br/>
      <input type="radio" id="marinara" name="sauce" value="marinara">
      <label for="regular">Marinara(Tomoato)</label><br>
      <input type="radio" id="barbecue" name="sauce" value="barbecue">
      <label for="barbecue">Barbecue</label><br>
      <input type="radio" id="garlic" name="sauce" value="garlic">
      <label for="thick">Garlic</label><br><br>
      
      <!--Cheese-->
      <label for="cheese">Cheese (Please choose 1 of 3 options) </label><br/><br/>
      <input type="radio" id="mozzarella" name="cheese" value="mozzarella">
      <label for="mozzarella">Mozzarella</label><br>
      <input type="radio" id="cheddar" name="cheese" value="cheddar">
      <label for="cheddar">Cheddar</label><br>
      <input type="radio" id="gouda" name="cheese" value="gouda">
      <label for="gouda">Gouda</label><br><br>
          
      <!--Toppings-->
      <label for="toppings">Toppings (Please choose 1-5 of 10 options) </label><br/><br/>
      <input type="checkbox" id="toppings" name="toppings[]" value="pepperoni">
      <label for="top1">Pepperoni</label><br>
      <input type="checkbox" id="toppings" name="toppings[]"  value="salami">
      <label for="top2">Salami</label><br>
      <input type="checkbox" id="toppings" name="toppings[]"  value="bacon">
      <label for="top3">Bacon</label><br>
      <input type="checkbox" id="toppings" name="toppings[]"  value="ham">
      <label for="top4">Ham</label><br>
      <input type="checkbox" id="toppings" name="toppings[]"  value="beef">
      <label for="top5">Ground Beef</label><br>
      <input type="checkbox" id="toppings" name="toppings[]"  value="tomato">
      <label for="top6">Sun-dried Tomato</label><br>
      <input type="checkbox" id="toppings" name="toppings[]"  value="broccoli">
      <label for="top7">Broccoli</label><br>
      <input type="checkbox" id="toppings" name="toppings[]" value="olive">
      <label for="top8">Black Olive</label><br>
      <input type="checkbox" id="toppings" name="toppings[]" value="mushroom">
      <label for="top9">Mushroom</label><br>
      <input type="checkbox" id="toppings" name="toppings[]" value="pineapple">
      <label for="top10">Pineapple</label><br><br/><br/> 

      <!--Submit-->    
      <input type='submit' name='add' value='ADD PIZZA'><br><br/> 
      <input type='submit' name='submit' value='ORDER NOW'>
    </form>
  </div>
</body>
</html>

  		

