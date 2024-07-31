<?php
require_once("includes/config.php");
$admins = new admins;
{
	$sql = $admins -> select($admins -> table);
	//print_r($sql);	
}
?>

<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Guestbook</title>
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
            <h2 class="title">Dashboard</h2>
            <div class="inner">
			<form method="post" class="form" enctype="multipart/form-data">
				<table align="center" cellpadding="10px" cellspacing="10px" width="840px" border="0" align="center">
				<tr class="group">
                    <td><label class="label" for="post_title">Avatar:</label></td>
					<td><img src="<?php echo FTP_AVATAR_DIR.$sql[0]['avatar'];?>"alt="avatar" width="200px" height="200px" align="center" border="1px green"/></td>
				</tr>
                <tr class="group">
                  <td><label class="label">Name:<span class="mandatory"></span></label></td>
				  <td><?php echo $sql[0]['name'];?></td>
				</tr>
                <tr class="group">
                    <td><label class="label" for="post_title">Email Id:</label></td>
					<td><?php echo $sql[0]['username'];?></td>
				</tr>
				<tr class="group">
                    <td><label class="label" for="post_title">Last Login:</label></td>
					<td><?php echo $sql[0]['lastlogin'];?></td>
				</tr>
				<tr class="group">
                    <td><label class="label" for="post_title">Last IP:</label></td>
					<td><?php echo $_SERVER['REMOTE_ADDR'];?></td>
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


