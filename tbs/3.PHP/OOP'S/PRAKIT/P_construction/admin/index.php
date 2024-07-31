<?php
require_once("includes/config.php");
if(isset($_POST['submit']))
{
	$admins = new admins;
	$errors = $admins -> validate_login();
	if(!count($errors))
	{
		$sql = ($admins -> select($admins->table,'',"username='".$_POST['username']."' and password=md5('".$_POST['password']."')"));
		//print_r($sql);exit;
		if(isset($sql[0]['id']))
		{
			if($sql[0]['status']=="inactive")
			{
				$msg = "You account is inactive. Please Contact Admin";	
			}
			else
			{
			$_SESSION['auth'] = $sql[0];
			unset($_SESSION['auth']['password']);
			//print_r($_SESSION['auth']);exit;
			header("location:dashboard.php");
			}
		}
		else
		{
			$msg =  "You are not authorised";
		}
	}
}	



 ?>



<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Admin Panel</title>
  <link rel="stylesheet" href="css/guest.css" type="text/css" media="screen" />
  <link rel="stylesheet" id="current-theme" href="css/bec/style.css" type="text/css" media="screen" />  
</head>
<body>

  <div id="container">
    <div id="header">
      <h1><a href="index.php">Admin Panel</a></h1>  
    </div>
    <div id="wrapper" class="wat-cf">
  
    <div id="box">
     
      <div class="block" id="block-login">
        <h2>Login</h2>
        <div class="content login">
          <div class="flash">
            <div class="message notice">
              <!--<p>Logged in successfully</p>-->
			  <?php if(isset($msg)){ ?>
			  <?php echo $msg; } ?>
            </div>
			
		     
			
				
          </div>
          <form  class="form login" method="post" enctype="multipart/form-data">
            <div class="group wat-cf">
              <div class="left">
                <label class="label right">Username</label>
              </div>
              <div class="right">
                <input type="text" class="text_field" name="username" value="<?php echo isset($_POST['username'])?$_POST['username']:''; ?>"/>
              </div>
			  
            </div>
				<?php if(isset($errors['username']))
				{?>
					<div class="error">
						<?php echo $errors['username'];?>
					</div>	
				<?php } ?>
		
			
            <div class="group wat-cf">
              <div class="left">
                <label class="label right">Password</label>
              </div>
              <div class="right">
                <input type="password" class="text_field" name="password" />
              </div>
            </div>
			
			    <?php if(isset($errors['password'])){?>
				<div class="error">
				   <?php echo $errors['password'];?>
				</div>
				<?php }?>
				
            <div class="group navform wat-cf">
              <div class="right">
                <button class="button" type="submit" name="submit" />
                  <img src="images/icons/key.png" alt="Save" /> Login
                </button>
		
		
                  
              </div>
            </div>
	    
          </form>
	  <div class="group navform wat-cf">
              <div class="right">
                
		<span class="text_button_padding">If you forgot the password. Please click on <a class="text_button_padding link_button" style="float:right;padding-top:0px;" href="forget_password.php">Forgot Password</a></span>
                  
              </div>
            </div>
        </div>
      </div>

     
    </div>
  </div>
</body>
</html>

