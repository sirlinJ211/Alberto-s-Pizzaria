<!DOCTYPE html>
<html>
   <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">   
		<link rel="stylesheet" href="./css/table.css" type="text/css" >	
        <title>Order Summary</title>
        
        <?php        
        session_start();          
        include_once 'navigationMenu.php';        
        include_once 'projectdb.php';        
        naviForm($_SESSION['email']); 
        ?>
        
        
        <div>
		<img src="image/orderSummary.png" alt="order summary" style="width:100%">
		</div>
        
    </head>
    <body>

        <div>
        <?php
                    
            $dbc = connectDB();            
          
            $useremail = $_SESSION['email'];
                       
            $date = $_SESSION['date'];
            $dayDate = substr_replace($date,"________", strlen($date)-8, strlen($date));
            
            $stmt = $dbc->prepare("select email,dough,cheese,sauce,toppings FROM tblOrders AS o JOIN tblPizzaOrders AS po 
            ON o.Orders_ID = po.Orders_ID INNER JOIN tblPizza AS p ON po.Pizza_ID = p.Pizza_ID WHERE email = '" .$useremail. 
            "' AND date LIKE '" .$dayDate. "';");
                
            echo "<p>Thank you for your order\n" . $useremail ."!"."<br/>";


            if (!$stmt){
                echo "ERROR ".$dbc->errorCode()."\nMessage ".implode($dbc->errorInfo())."\n";
                exit(1);
            }
            $status = $stmt->execute();
            if($status){
                
                if ($stmt->rowCount() > 0){

            ?>          

            <table>
            <tr><th>Num</th><th>Dough</th><th>Cheese</th><th>Sauce</th><th>Toppings</th></tr>

            <?php
                    $index = 1;
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                       printf ("<tr><td>" . $index . "</td><td>" . $row['dough'] . "</td><td>" . $row['cheese'] . "</td><td>" . $row['sauce'] . "</td><td>" . $row['toppings'] . "</td></tr>\n" );
                    $index ++;
                    
                }
                    echo "</table></br>\n";
                } else {
                    echo "<p>Nothing to output</p>\n";
                }
            } 
            else {
                    echo "<p>ERROR ".$stmt->errorCode()."<br/>\nMessage ".implode($stmt->errorInfo())."</p>\n";
                    exit(1);
            }


            $dbconn = NULL;

            $getAddress =$dbc->prepare("select address,city,province,postal_code from tblCustomers where email = '" .$useremail. "';");
            if (!$getAddress){
                echo "ERROR ".$dbc->errorCode()."\nMessage ".implode($dbc->errorInfo())."\n";
                exit(1);
            }
            $address = $getAddress->execute();
            if($address){
               // echo "<p>Number of rows found is --> ".$getAddress->rowCount()."</p>\n";
                if ($getAddress->rowCount()>0){
                    
                    while ($row = $getAddress->fetch(PDO::FETCH_ASSOC)){
                        printf ("Pizza will be ready in 40 minutes and will be delivered to Address: " . $row['address'].", " . $row['city'] .", ". $row['province'].", " . $row['postal_code']. "."
                    );
                        
                   }
                  }
                 } 
            
            else {
                echo "<p>ERROR ".$address->errorCode()."<br/>\nMessage ".implode($address->errorInfo())."</p>\n";
                    exit(1);
            }
            ?>        
            
           
        </div>
    </body>
</html>
