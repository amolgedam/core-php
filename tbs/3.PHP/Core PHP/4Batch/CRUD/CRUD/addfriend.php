<?php 
require_once("includes/config.php");
if(!isset($_SESSION['auth']['id']))
{
	header("location:index.php");
}
if(isset($_POST['save']))
{
	/*print_r($_POST);
	print_r($_FILES);
	exit;*/
	$errors = array();
	$errors = validate_friend();
	
	if(!count($errors))
	{
		$no = time();
		if($_FILES['avatar']['error']==0)
		{
			$src = $_FILES['avatar']['tmp_name'];
			$dest = "images/avatar/".$no."_".$_FILES['avatar']['name'];
			if(move_uploaded_file($src,$dest))
			{
				$_POST['avatar'] = $no."_".$_FILES['avatar']['name'];

				$_POST['hobbies'] = implode(", ",$_POST['hobbies']);
				
				$insert = "insert into friends set 
				user_id='".$_SESSION['auth']['id']."',
				name='".$_POST['name']."',
				address='".$_POST['address']."',
				gender='".$_POST['gender']."',
				hobbies='".$_POST['hobbies']."',
				city_id='".$_POST['city_id']."',
				avatar='".$_POST['avatar']."',
				created=Now()";
				
				if(mysql_query($insert))
				{
					$success =  "Friend Save Successfully";
					$_POST['hobbies'] = explode(", ",$_POST['hobbies']);
				}
				else
				{
					$error =  "Fail to Save Friend";
				}
				
				
			}
			else
			{
				$error =  "Fail To move File";
			}
		}			
	}
}

$selectcity = mysql_query("select * from cities order by name");

?>

<html>
	<head>
		<title>Dashboard</title>
		<link href="css/style.css" rel="stylesheet"/>
	</head>
	<body>
		<h1>SLAMBOOK - DASHBOARD</h1>
		<?php require_once("includes/nav.php");?>
			<form method="post" enctype="multipart/form-data">
			<table cellpadding="10px" cellspacing="0px" width="400px" align="center" border="1">
				<tr>
					<td colspan="2">
						<?php 
							if(isset($success))
							{
								echo "<font style='color:green'>".$success."</font>";
							}
							if(isset($error))
							{
								echo "<font style='color:red'>".$error."</font>";
							}
						?>
					</td>
				</tr>
				<tr>
					<td>Name :</td>
					<td><input type="text" name="name" value="<?php echo isset($_POST['name'])?$_POST['name']:''; ?>"/>
					<?php if(isset($errors['name'])){?>
					<div class="errors">
						<?php echo $errors['name'];?>
					</div>
					<?php } ?>
					</td>
				</tr>
				<tr>
					<td>Address :</td>
					<td><textarea rows="5" col="30" name="address"><?php echo isset($_POST['address'])?$_POST['address']:''; ?></textarea>
					<?php if(isset($errors['address'])){?>
					<div class="errors">
						<?php echo $errors['address'];?>
					</div>
					<?php } ?>
					</td>
				</tr>
				<tr>
					<td>Gender :</td>
					<td><input type="radio" name="gender" value="male" <?php echo isset($_POST['gender']) && $_POST['gender']=='male'?'checked':''; ?>/>Male
					<input type="radio" name="gender" value="female" <?php echo isset($_POST['gender']) && $_POST['gender']=='female'?'checked':''; ?>/>Female
					<?php if(isset($errors['gender'])){?>
					<div class="errors">
						<?php echo $errors['gender'];?>
					</div>
					<?php } ?>
					</td>
				</tr>
				<tr>
					<td>Hobbies :</td>
					<td><input type="checkbox" name="hobbies[]" value="reading" <?php echo isset($_POST['hobbies']) && in_array("reading",$_POST['hobbies'])?'checked':''; ?>/>Reading
					<input type="checkbox" name="hobbies[]" value="singing" <?php echo isset($_POST['hobbies']) && in_array("singing",$_POST['hobbies'])?'checked':''; ?>/>Singing
					<?php if(isset($errors['hobbies'])){?>
					<div class="errors">
						<?php echo $errors['hobbies'];?>
					</div>
					<?php } ?>
					</td>
				</tr>
				<tr>
					<td>City :</td>
					<td>
						<select name="city_id">
							<option value="0">--Select City--</option>
							<?php while($rows = mysql_fetch_array($selectcity)){?>
							<option value="<?php echo $rows['id']; ?>" <?php echo isset($_POST['city_id'])&& ($_POST['city_id']==$rows['id'])?'selected':'';?>><?php echo $rows['name']; ?></option>
							<?php } ?>
						</select>
						<?php if(isset($errors['city_id'])){?>
						<div class="errors">
							<?php echo $errors['city_id'];?>
						</div>
						<?php } ?>
					</td>
				</tr>
				<tr>
					<td>Avatar :</td>
					<td><input type="file" name="avatar"/>
						<?php if(isset($errors['avatar'])){?>
						<div class="errors">
							<?php echo $errors['avatar'];?>
						</div>
						<?php } ?>
					</td>
				</tr>
				<tr>
					<td></td>
					<td><button type="submit" name="save">Save</button>
					<button type="button" onclick="window.location='manage_friends.php'">Back </button>
					</td>
				</tr>
			</table>
			</form>
		<h6>&copy; Copyright 2016. All Rights Reserved</h6>	
	</body>
</html>