<?php
require_once("includes/config.php");
if(!isset($_SESSION['auth']['id']))
{
     header("location:index.php");
}

define('CSV_PATH','D:/SURAJ 1/important/AAA/htdocs/Training/task7/import/');
$csv_file = CSV_PATH . "test.csv";

if (($handle = fopen($csv_file, "r")) !== FALSE)
{
   fgetcsv($handle);   
while(($data = fgetcsv($handle,1000, ",")) !==FALSE)
{
	$num = count($data);
	for($a=0; $a< $num; $a++)
	{
	  $col[$a] = $data[$a];	
	}
	$col1 = $col[0];
	$col2 = $col[1];
	$col3 = $col[2];
	
	$query = "INSERT INTO emp (name,email,address) VALUES ('".$col1."','".$col2."','".$col3."')";
	$s = mysql_query($query);
	}	
	fclose($handle);
}
echo "File data successfully imported to database";
?>