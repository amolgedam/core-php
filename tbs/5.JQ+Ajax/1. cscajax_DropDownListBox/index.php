<?php
$mysql_db_hostname = "localhost";
$mysql_db_user = "root";
$mysql_db_password = "";
$mysql_db_database = "batch_25_csc"; 


$con = mysql_connect($mysql_db_hostname, $mysql_db_user, $mysql_db_password) or die("Could not connect database");
mysql_select_db($mysql_db_database, $con) or die("Could not select database");

$sqlCountry="select * from countries  order by name asc ";
$resCountry=mysql_query($sqlCountry);
$checkCountry=mysql_num_rows($resCountry);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP Ajax Country State City Drop Down </title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<script type="text/javascript" src="js/jquery-1.4.1.min.js"></script>
<script type="text/javascript">
function selectCity(country_id){
	alert(country_id);
	if(country_id!="-1"){
		loadData("states",country_id);
		$("#city_dropdown").html("<option value='-1'>--Select city--</option>");	
	}else{
		$("#state_dropdown").html("<option value='-1'>--Select state--</option>");
		$("#city_dropdown").html("<option value='-1'>--Select city--</option>");		
	}
}

function selectState(state_id){
	if(state_id!="-1"){
		loadData('cities',state_id);
	}else{
		$("#cities_dropdown").html("<option value='-1'>--Select city--</option>");		
	}
}

function loadData(loadType,loadId){
	alert(loadType);
	alert(loadId);
	
	
	var dataString = 'loadType='+ loadType +'&loadId='+ loadId;
	
	$("#"+loadType+"_loader").show();
    $("#"+loadType+"_loader").fadeIn(3000).html('Please wait... <img src="image/loading.gif" />');
	
	
	$.ajax({
		type: "POST",
		url: "loadData.php",
		data: dataString,
		cache: false,
		
		
		success: function(result){
		alert(result);
			$("#"+loadType+"_loader").hide();
			$("#"+loadType+"_dropdown").html("<option value='-1'>--Select "+loadType+"--</option>");  
			$("#"+loadType+"_dropdown").append(result);  
		}
	});
}
</script>
</head>
<body>
<div id="container">
    
    <div id="wrapper">
		<div class="wrap_box">
			<?php
			if($checkCountry > 0){
				?>
				<table>
					<tr>
						<td>
							<select onchange="selectCity(this.options[this.selectedIndex].value)">
								<option value="-1">Select country</option>
								<?php
								while($rowCountry=mysql_fetch_array($resCountry)){
									?>
									<option value="<?php echo $rowCountry['id']?>"><?php echo $rowCountry['name']?></option>
									<?php
								}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<select id="states_dropdown" onchange="selectState(this.options[this.selectedIndex].value)">
								<option value="-1">Select state</option>
							</select>
							<span id="states_loader"></span>
						</td>
					</tr>
					
					<tr>
						<td>
							<select id="cities_dropdown">
								<option value="-1">Select city</option>
							</select>
							<span id="cities_loader"></span>
						</td>
					</tr>
				</table>
				<?php
			}else{
				echo 'No Country Name Found';
			}
			?>
		</div>
    </div>

    
</div>

</body>
</html>
