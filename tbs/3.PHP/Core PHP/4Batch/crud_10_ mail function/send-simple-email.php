<?php
/*--------------------------------------------------------------------------------------------
|    @Desc:        Simple Mail Function     index.php
|    @Author:      Shriram Bhadang [Mob : +91 97643 70007]
|  	 @license:     Free!, to Share,copy, distribute and transmit , 
---------------------------------------------------------------------------------------------*/

//if "email" variable is filled out, send email
  if (isset($_POST['submit']))  {
  
  //Email information
  $admin_email = "someone@example.com";
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $comment = $_POST['comment'];
  
  //send email
  if(mail($admin_email, "$subject", $comment, "From:" . $email))
  
  //Email response
  echo "Thank you for contacting us!";
  }
  
  //if "email" variable is not filled out, display the form
  else  {
	  
  }
?>

 <form method="post" enctype="multipart/form-data">
  Email: <input name="email" type="text" /><br />
  Subject: <input name="subject" type="text" /><br />
  Message:<br />
  <textarea name="comment" rows="15" cols="40"></textarea><br />
  <input type="submit" value="Submit" name="submit" />
  </form>
  
<?php
  }
?>