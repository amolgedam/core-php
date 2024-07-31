<?php
     require_once("includes/config.php");
	 if (!isset($_SESSION['auth']['name']))
      {
		 header("location:index.php");
	  }
	 
     if(isset($_GET['id']))
	 {
		 $select = mysql_fetch_assoc(mysql_query("select * from friends where id=".$_GET['id']));
	 }
    else
	{
		header("location:guest.php");
	}		
?>
<html>
         <!--head section-->
     <head>
	     <title> Show Details</title>
         <link href="css/style.css" rel="stylesheet"/>		 
	 </head>
	     <!--head section-->
	     <!--body section-->
	 <body>
	      <div class="head">
		     <h1>GUESTBOOK </h1>
		     <div class="navy">
	         <ul>
	             <li><a href="profile.php">Profile</a></li>
	             <li><a href="#">Change Password</a></li>
	             <li><a href="logout.php">Logout</a></li>
	         </ul>
	      </div>
	           <?php require_once("includes/nav.php");?>
		 </div>
         <div class="header_bottom1">&nbsp;</div>
	     <div class="header_bottom2">Show Guest Details</div>
         <form method="post" id="form">
		     <div><label>Details of :</label> <?php echo strtoupper($select['name']);?></div></br></br>
		     <div>Address : <?php echo $select['address'];?></div></br>
			 <div>Gender : <?php echo $select['gender'];?></div></br>
			 <div>Hobbies : <?php echo $select['hobbies'];?></div></br>
			 <div>City :
			    <?php 
			      $getcity = mysql_fetch_assoc(mysql_query("select * from cities where id='".$select['city_id']."'"));
			      echo $getcity['name'];?>
			  </div></br>
		     <div>Avatar :
			     <img src="images/avatar/<?php echo $select['avatar'];?>" width="50px" alt="avatar"/></div></br>
              <div><button type="button" onclick="window.location='guest.php'">Back</button></div>			 
         </form>
             <div id="footer">&copy; Copyright 2016. All Rights Reserved</footer>		 
	 </body>
	     <!--body section-->
</html>