<?php

define("DBHOST", "localhost");  
define("DBDB", "project"); 
define("DBUSER", "project1");  
define("DBPW", "Project1!");  

function connectDB() { 	
	$dsn = "mysql:host=".DBHOST.";dbname=".DBDB.";charset=utf8";
	
	try {
		$db_conn = new PDO($dsn, DBUSER, DBPW);
		return $db_conn;
	} catch (PDOException $err) {
		echo "<p>Error connecting to database <br />\n".$err->getMessage()."</p>\n";
		
		exit(1);
	}
}
?>

