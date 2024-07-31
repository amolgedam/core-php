<?php 
//Connection with Server
$conn = mysql_connect("localhost","root","")or die("Could not connect with server");

//Connection with Database
mysql_select_db("batch_25_coreproject",$conn)or die("Could not connect with server");

require_once("includes/validations.php");

//To start Session
session_start();

//Assign NAme to Session
session_name("auth");


?>