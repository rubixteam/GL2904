<?php
	//set off all error for security purposes
error_reporting(E_ALL);

//define some contstant

	define( "DB_DSN", "mysql:host=localhost;dbname=website2" ); //this constant will be use as our connectionstring/dsn 
	
	 define( "DB_USERNAME", "root" ); //username of the database 
	 define( "DB_PASSWORD", "root" ); //password of the database
	 
	 define( "CLS_PATH", "class" ); //the class path of our project
	 
	 //include the classes 
	 include_once( CLS_PATH . "/user.php" ); 
?>
	 