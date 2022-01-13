<!DOCTYPE html>
<html>
	<head>	
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">   
	<link rel="stylesheet" href="./css/table.css" type="text/css" rel="stylesheet"/>
    <title>Previous Orders</title>      
    </head>
    <body>
    
        <?php
            session_start();
            include_once 'projectdb.php';
            include_once 'navigationMenu.php';
            include_once 'function.php';
            include_once 'navigationMenu.php';
            
            if (isset($_SESSION['email'])) {
                naviForm($_SESSION['email']);
            }
            else{
                header("location:index.php");
            }           

            $db_conn = connectDB();
            $useremail = $_SESSION['email'];
         
            $stmt = $db_conn->prepare("SELECT email,dough,cheese,sauce,toppings,p.Pizza_ID FROM 
            tblOrders AS o JOIN tblPizzaOrders
            AS po ON o.Orders_ID = po.Orders_ID INNER JOIN tblPizza 
            AS p ON po.Pizza_ID = p.Pizza_ID WHERE email = '" .$useremail. "';");

            function reOrderdata($pizzaID){
                $db_conn = connectDB();
                $useremail = $_SESSION['email'];

                $newDate = strftime("%A %d %B %Y %T", time()); 
                insertOrderData($db_conn, $useremail, $newDate);          
                insertReOrderData($db_conn, $newDate, $pizzaID);
                echo("<br><p>Successfully re-ordered!</p>");
            } 
            
            if (!$stmt){
                echo "ERROR ".$db_conn->errorCode()."\nMessage ".implode($db_conn->errorInfo())."\n";
                exit(1);
            }
            $status = $stmt->execute();
            if($status){
                if ($stmt->rowCount() > 0){
           
            ?>
            
       
            <div>
            <img src="image/previousOrder.png" alt="previous order" style="width:100%">
      
          
            <table> 
           
            <tr><th>Num</th><th>Dough</th><th>Cheese</th><th>Sauce</th><th>Toppings</th><th>Pizza_ID</th><th>Re-order</th></tr>

            <?php
                $index = 1;
                $previousArray = []; 

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    printf ("<tr><td>" . $index . "</td><td>" . $row['dough'] . "</td><td>" . $row['cheese'] . "</td><td>" . $row['sauce'] . "</td><td>" . $row['toppings'] . "</td><td>" . $row['Pizza_ID'] . 
                        "</td><td><form method='post'> <input type='submit' name='reorder".$index."' id='reorder' value='Re-order' /></form></td></tr>\n");

                    //array_push($previousArray, [ $index , $row['Pizza_ID']]);
                    $previousArray[$index] = $row['Pizza_ID'];

                    $index ++;
                }


                echo "</table>\n";
                } 
                else {
                    echo "<p>No previous order. Please order now.</p>\n";
                }
                } 
                else {
                    echo "<p>ERROR ".$stmt->errorCode()."<br/>\nMessage ".implode($stmt->errorInfo())."</p>\n";
                    exit(1);
                }

            $db_conn = NULL;

                
            if(isset($previousArray)){               
                $lenghth = count($previousArray);                                                      
                for ($i=1; $i < $lenghth+1; $i++) {                     
                    if(array_key_exists("reorder".$i,$_POST)){                    
                        $lenghth = count($previousArray);                                               
            reOrderdata($previousArray[$i]);                       
                    }                               
                }             
            }
            
            ?>
            
            
        </div>
    </body>
</html>
