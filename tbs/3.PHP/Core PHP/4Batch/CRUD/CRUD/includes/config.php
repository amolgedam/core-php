<?php 
//Connection with Server
$conn = mysql_connect("localhost","root","") or die("Could not connect with server");

//Select Database
mysql_select_db("batch_4",$conn) or die("Could not connect with Database");;

// Implimentation of Validation
require_once("includes/validations.php");

//Start the Session
session_start();

//Initialized session
session_name('auth');
?>	