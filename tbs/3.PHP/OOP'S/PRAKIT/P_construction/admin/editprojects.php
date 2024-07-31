<?php
require_once("includes/config.php");

/*----------------------Code for update page--------------*/
$projects = new projects;
$update = ($projects->select($projects->table,'',"id='".$_GET['id']."'"));
{
if(isset($_POST['update']))
{
	if($_FILES['avatar']['error']==0)
	{
		$no = time();
		$src = $_FILES['image']['tmp_name'];
		$dest = FTP_AVATAR_DIR.$no."_".$_FILES['image']['name'];
		if(move_uploaded_file($src,$dest))
		{
			$_POST['avatar'] = $no."_".$_FILES['image']['name'];
			unlink(FTP_AVATAR_DIR.$_POST['oldimage']);
		}
	}
	if($projects->save($projects->table,$_POST,"id=".$_GET['id'].""))
	{
	    $msg="Update Sucess";
		header("location:projects.php");
	}
	else
	{
		$msg="Update Fail";
	}
}
}
?>


<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Edit Project</title>
  
  <script src="ckeditor/ckeditor.js"></script>
  <link rel="stylesheet" href="ckeditor/samples/css/sample.css">
  <link rel="stylesheet" href="css/guest.css" type="text/css" media="screen" />
  <link rel="stylesheet" id="current-theme" href="css/bec/style.css" type="text/css" media="screen" />  
  
</head>
<body>
    <div id="container">
	    <?php require_once("includes/main_header.php");?>
        <div id="wrapper" class="wat-cf">
        <div id="main">
	
 	    <div class="inner">
              <div class="flash">
                <div class="message notice">
                  <p>Welcome Mr. <?php echo $_SESSION['auth']['name'];?></p>
                </div>
              </div>
        </div>
        

        <div class="block" id="block-tables">
          <div class="secondary-navigation"></div>
          <div class="content">
            <h2 class="title">Edit Project</h2>
			
            <div class="inner">
			<form method="post" class="form" enctype="multipart/form-data">
				<table align="center" cellpadding="10px" cellspacing="10px" width="840px" border="0" align="center">
				     <tr>
					     <td class="label right">Locality</td>
						 <td><input type="text" class="text_field" name="title" value="<?php echo $update[0]['locality']?>"/></td>
					 </tr>
					 <tr>
					     <td class="label right">Address</td>
						 <td><textarea  class="ckeditor" rows="5" col="300" style="width:500px; height:200px;"class="text_field" name="address"><?php echo $update[0]['address']?></textarea></td>
					 </tr>
					 <tr>
					 <tr>
					     <td class="label right">Image</td>
						 <td>
						     <input type="file" name="image"/>
							 <input type="hidden" name="oldavatar" value="<?php echo $_POST['image']; ?>"/>
					         <img src="<?php echo HTTP_AVATAR_DIR.$_POST['image']; ?>" alt="Profile" width="100px" height="100px"/>
                             <span class="description">jpeg or png or gif
						 </td>
					 </tr>
					     <td>&nbsp;</td>
						 <td>
						    <div class="actions-bar wat-cf">
						    <div class="actions">
                              <button class="button" type="submit" name="save" onclick="return confirm('Do you want to update?')">
                              <img src="images/icons/tick.png" alt="save" /> Update
                              </button>
                            </div>
							</div>
						 </td>
					 </tr>
					 </table>
					 
              </form>
            </div>
          </div>
        </div>       
        <?php require_once("includes/footer.php");?>
        </div>     
        <?php require_once("includes/sidebar.php");?>
        </div>
    </div>
</body>
</html>

