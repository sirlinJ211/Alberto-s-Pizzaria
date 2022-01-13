<!DOCTYPE html>  
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="pizza.css">
    <title>Welcome to Pizzaria</title>  

    <?php
    session_start();
    include_once 'navigationMenu.php';
    include_once 'projectdb.php';

      if (isset($_POST['email'])){
        $db_conn = connectDB();
        $email = $_POST['email'];
        $query = $db_conn->prepare( "SELECT `email` FROM `tblCustomers` WHERE `email` = ?" );
        $query->bindValue( 1, $email );
        $query->execute();
        if( $query->rowCount() > 0 ) { 
          $_SESSION['email'] = $email;
          header("location:orderpizza.php");
        }
        else {
          $_SESSION['email'] = $email;
            header("location:signup.php");    
        }

      }
      
      elseif (isset($_SESSION['email'])){
        naviForm($_SESSION['email']); 
      }        
      else {
        naviForm("");
      }

    ?>
      <!-- <img src="https://image.shutterstock.com/image-photo/sliced-pizza-mozzarella-cheese-ham-260nw-1163911864.jpg" class="img-fluid" alt="Responsive image" width="1200" height="250">      -->
  </head>
  
  <body>  
  <div>
   <img src="image/welcome2.png" class="d-block w-30 mx-auto" alt="welcome!order online">
  </div>
    <div>
    <div id="emailcheck" class="container" <?php if (isset($_SESSION['email'])){?>style="display:none"<?php } ?>>
      <div class="row">
        <div class="col-md-4 offset-md-4 form-div">
          <form action="index.php" method="post">   
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>	
            <div class="form-group">
              <button type="submit" name="submit" class="btn-primary btn-block btn-lg">Begin</button>
            </div>
              <p class="text-center">Not a member? <a href=signup.php>Sign Up</a></p>              	 	    
            </div> 
          </form>
      </div>
    </div>
   
     
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="image/pizzaindex1.jpg" class="d-block w-90 mx-auto" alt="...">
            </div>
            
    
  </div>  
  </body> 
 
  <footer class="footer">
    <div class="footer-copyright text-center py-3">© 2020 Copyright:
      <a href="https://mdbootstrap.com/"> MDBootstrap.com</a>
    </div>    
  </footer>  
</html>
