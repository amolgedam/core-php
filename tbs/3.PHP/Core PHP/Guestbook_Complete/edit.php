<?php 
require_once("includes/config.php");
if(!isset($_SESSION['auth']['id']))
{
	header("location:index.php");
}
if(!isset($_GET['id']))
{
	header("location:guest.php");
}
if(isset($_POST['update']))
{
	/*print_r($_POST);
	print_r($_FILES);
	exit;*/
	$errors = array();
	$errors = validate_edit();
	
	if(!count($errors))
	{
		$_POST['hobbies'] = implode(", ",$_POST['hobbies']);
		$no = time();
		if($_FILES['avatar']['error']==0)
		{
			$src = $_FILES['avatar']['tmp_name'];
			$dest = "images/avatar/".$no."_".$_FILES['avatar']['name'];
			if(move_uploaded_file($src,$dest))
			{
				$_POST['avatar'] = $no."_".$_FILES['avatar']['name'];
				unlink("images/avatar/".$_POST['oldavatar']);
				$update = "update friends set 
				name='".$_POST['name']."',
				address='".$_POST['address']."',
				gender='".$_POST['gender']."',
				hobbies='".$_POST['hobbies']."',
				city_id='".$_POST['city_id']."',
				avatar='".$_POST['avatar']."',
				modified=Now() where id='".$_GET['id']."'";
			}
			else
			{
				$error = "Fail to Move File";
			}		
				
				
		}
		else
		{
				$update = "update friends set 
				name='".$_POST['name']."',
				address='".$_POST['address']."',
				gender='".$_POST['gender']."',
				hobbies='".$_POST['hobbies']."',
				city_id='".$_POST['city_id']."',
				modified=Now() where id='".$_GET['id']."'";
		}	
		if(mysql_query($update))
		{
			$success =  "Friend Update Successfully";
			
		}
		else
		{
			$error =  "Fail to Save Friend";
		}
		
				
			
	}
}
$_POST = mysql_fetch_assoc(mysql_query("select * from friends where id='".$_GET['id']."'"));
$_POST['hobbies'] = explode(", ",$_POST['hobbies']);
$selectcity = mysql_query("select * from cities order by name");

?>
<html>
        <!--head section-->
     <head>
	     <title>Edit guest Details</title>
		 <link href="css/style.css" rel="stylesheet">
	 </head>
	    <!--head section-->
		<!--body section-->
	 <body>
	     <!--heading section-->
	     <div class="head">
		     <h1>GUESTBOOK</h1>
	   <div class="navy">
	       <ul>
                 <li><a href="#">Profile</a></li> &nbsp; |
	             <li><a href="#">Change Password</a></li> &nbsp; |
	             <li><a href="logout.php">Logout</a></li> &nbsp; |
	      </ul>
	   </div>
	      <?php require_once("includes/nav.php");?>			 
        </div>
		 <!--heading section-->
		 <div id="content_left">
	     <!--form section-->
		<form method="post" enctype="multipart/form-data">
		 <!--header_bottom1 section-->
		 <div class="header_bottom1">&nbsp;</div>
		  <!--header section-->
		  <!--header_bottom2 section-->
	 <div class="header_bottom2">Add New Guests</div>
	      <!--header_bottom2 section-->
		  <div>
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
		  </div>
		  <!--name section-->
	         <div><label>Name</label></div></br>
	         <div><input type="text" name="name" value="<?php echo isset($_POST['name'])?$_POST['name']:''; ?>" size="120px"/></input></br>
	            <?php if (isset($erros['name'])) { ?>
		        <div class="errors">
		        <?php echo ($errors['name']);?>
		        </div>
		        <?php } ?>
			 </div>
		 <!--name section-->
		 <!--address section-->
		 <div><label>Address</label></div></br>
      <div ><textarea rows="4" width="60px" id="textarea" name="address"><?php echo isset($_POST['address'])?$_POST['address']:''; ?></textarea></br>
	     <?php if (isset($errors['address'])) { ?>
	  <div class="errors">
	     <?php echo ($errors['address']);?>
	  </div>
	     <?php } ?>
	 </div>
	 <!--address section-->
	  <!--Gender section-->
      <div><label>Gender</label></div></br>
      <div><label>Male</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="gender" value="male" <?php echo isset($_POST['gender']) && $_POST['gender']=='male'?'checked':''; ?>/></br>
		 <?php if(isset($errors['gender'])){
		   echo $errors['gender'];
			}else{?>
        <label>Female</label>&nbsp;&nbsp;<input type="radio" name="gender" value="female" <?php echo isset($_POST['gender']) && $_POST['gender']=='female'?'checked':''; ?>/>
	  <?php } ?>
	  </div></br>
		<!--Hobbies section-->
     <div>
	<label>Hobbies </label></br></br>
        <label>Reading</label><input type="checkbox" name="hobbies[]" value="reading" <?php echo isset($_POST['hobbies']) && in_array("reading",$_POST['hobbies'])?'checked':''; ?>/></br>
	  <label>Singing</label> <input type="checkbox" name="hobbies[]" value="singing" <?php echo isset($_POST['hobbies']) && in_array("singing",$_POST['hobbies'])?'checked':''; ?>/>
					<?php if(isset($errors['hobbies'])){?>
					<div class="errors">
						<?php echo $errors['hobbies'];?>
					</div>
					<?php } ?>
	   </div></br>
	   <!--Hobbies section-->
	   <!--Cities section-->
	   <div>
	     <label>City<label></br>
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
	   </div></br>
	   <!--Cities section-->
	   	   <!--Avatar section-->
      <div>
	     <label>Avatar</label>
<input type="hidden" name="oldavatar" value="<?php echo $_POST['avatar']; ?>"/>
					<input type="file" name="avatar"/>
					<img src="images/avatar/<?php echo $_POST['avatar']; ?>" alt="avatar" width="50px"/>
						<?php if(isset($errors['avatar'])){?>
						<div class="errors">
							<?php echo $errors['avatar'];?>
						</div>
						<?php } ?>
		</div></br>
		<!--Avatar section-->
	   <!--button section-->
		<div id="content_bottom">
	     <button type="submit" name="update">Update</button>
		 <button type="button" onclick="window.location='guest.php'">Back</button>
	  </div>
	  <!--button section-->
		</form>
		<!--form section-->
		</div>
		<!--footer section-->
		<div id="footer">&copy; Copyright 2016. All Rights Reserved</footer>		 
	   <!--footer section-->
	 </body>
	    <!--body section-->
</html>