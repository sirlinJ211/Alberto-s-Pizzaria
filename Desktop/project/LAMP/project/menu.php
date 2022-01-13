<!DOCTYPE html> 
<style>
.menu{
	text-align:center;
	color:red;
	font-weight: bold;
	font-size: 70px;
	border-top: 5px double red;

}
.container{
margin-top: 50px;
}



</style> 
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="pizzamenu.css">
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
          header("location:index.php");
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
  
 <div class="container">
 <h1 class="menu">Menu</h1>
  <div class="row">
    <div class="col">
     <img src="image/menu1.png" class="d-block w-60 mx-auto" alt="...">
    </div>
    <div class="col">
    <img src="image/menu2.png" class="d-block w-60 mx-auto" alt="...">
    </div>
    <div class="w-100"></div>
    <div class="col">
    <img src="image/menu3.png" class="d-block w-60 mx-auto" alt="...">
    </div>
    <div class="col">
    <img src="image/menu4.png" class="d-block w-60 mx-auto" alt="...">
    </div>
  </div>
</div>
 
  <footer class="footer">
    <div class="footer-copyright text-center py-3">© 2020 Copyright:
      <a href="https://mdbootstrap.com/"> MDBootstrap.com</a>
    </div>    
  </footer>  
</html>
