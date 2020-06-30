<?php

//You can connect in two ways to the datbase. this is the first method
//$connection= mysqli_connect("localhost","root","","cms");
//if(mysqli_connect_errno()){
//	echo "error".mysqli_connect_error();}

//This is the second method to connect to the database
$db['db_host']="localhost";
$db['db_user']="root";
$db['db_pass']="";
$db['db_name']="cms";

foreach($db as $key=>$value){
	define(strtoupper($key),$value);
}
$connection=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);


?>
