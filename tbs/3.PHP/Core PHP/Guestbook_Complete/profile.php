<?php
require_once("includes/config.php");
    $id=$_SESSION['auth']['id'];
	$result = mysql_query("select * from users where id='$id'");
	while($row = mysql_fetch_array($result))
{
$name=$row['id'];
$name=$row['name'];
$email_address=$row['email_address'];
}

?>
<html>
     <head>
	     <title>Profile Page</title>
		 <link href="css/style.css" rel="stylesheet"/>
	 </head>
	 <body>
	      <div class="head">
		     <h1>GUESTBOOK </h1>
	           <?php require_once("includes/nav.php");?>
		 </div>
	     <div class="header_bottom1">&nbsp;</div>
	     <div class="header_bottom2">Show USer Details</div>
	     <form method="post" id="form">
		     <table>
			     <tr>
				     <td>id :</td>
					 <td><input type="text" name="id" value="<?php echo $id ?>"/></td>

				 </tr>
			     <tr>
				     <td>Name :</td>
					 <td><input type="text" name="name" value="<?php echo $name ?>"/></td>
				 </tr>
			     <tr>
				     <td>Email Address :</td>
					 <td><input type="email" name="email_address" value="<?php echo $email_address ?>"/></td>
				 </tr>
				 <tr>
				    <td colspan="2"><button type="submit" name="update">update</button>
					                <button type="button" onclick="window.location='manage_users.php'">Back</button>
					</td>
				 </tr>
			 </table>
		 </form>
	 </body>
</html>