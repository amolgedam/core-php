<?php
require_once("includes/config.php");
if(!isset($_SESSION['auth']['id']))
{
	header("location:index.php");
}
$sql = mysql_query("select id, name,email_address,status from users where role='user'");
$columns_total  =  mysql_num_fields($sql);
$output = "";
for($i=0; $i < $columns_total; $i++)
{
	$heading =  mysql_field_name($sql,$i);
	$output .='"'.$heading.'",';
}
$output .="\n";

while($rows  =  mysql_fetch_array($sql))
{
	for ($i=0; $i < $columns_total; $i++)
	{
		$output .= $rows[$i].","; 
	}
	$output .="\n";
}

$filename =  'db_export_users_'.date('Y-m-d').'.csv';
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);

echo $output;
exit;
?>