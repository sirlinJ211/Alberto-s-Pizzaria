<?php function naviForm($email){ ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="pizza.css">

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="image\logo.png" width="170" height="45" class="d-inline-block align-top" alt="" loading="lazy">
        
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
      
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="menu.php">Menu</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="orderpizza.php">Order Pizza</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="previousOrders.php">Previous Orders</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="userInformation.php"> Welcome <?php echo $email; ?></a>
        </li>
        </ul>
    </div>
</nav>
<?php } ?>
