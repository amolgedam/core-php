<?php
$mysql_db_hostname = "localhost";
$mysql_db_user = "root";
$mysql_db_password = "";
$mysql_db_database = "batch_25_csc"; 


$con = mysql_connect($mysql_db_hostname, $mysql_db_user, $mysql_db_password) or die("Could not connect database");
mysql_select_db($mysql_db_database, $con) or die("Could not select database");

//print_r($_POST);exit;

$loadType=$_POST['loadType'];
$loadId=$_POST['loadId'];

if($loadType=="states"){
	$sql="select id,name from states where country_id='".$loadId."' order by name asc";
	
}else{
	$sql="select id,name from cities where state_id='".$loadId."' order by name asc";
	
}
$res=mysql_query($sql);
$check=mysql_num_rows($res);
if($check > 0){
	$HTML="";
	
	
	while($row=mysql_fetch_array($res)){
		$HTML.="<option value='".$row['id']."' >".$row['name']."</option>";
	}
	
	
	//print_r($HTML);exit;
	echo $HTML;
	
}
?>