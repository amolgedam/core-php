<div id="header">
      <h1><a href="dashboard.php">Admin Panel</a></h1>
      <div id="user-navigation">
        <ul class="wat-cf">
          <li><a href="cpass.php">Change Password</a></li>
          <li><a class="logout" href="logout.php">Logout</a></li>
          <li><a href="#"><img src="images/icons/mail.png" alt="mail"/></a></li>		  
        </ul>
		
      </div>
      <div id="main-navigation">
	  <?php $a="/php/guestbook_crud/includes/";?>
        <ul class="wat-cf">
          
		  <li <?php if($_SERVER['PHP_SELF'] == $a.'dashboard.php'){echo 'class="active"';} else{echo 'class="inactive"';}  ?>><a href="dashboard.php">Dashboard</a></li>
          <li <?php if($_SERVER['PHP_SELF'] == $a.'pages.php'){echo 'class="active"';} else{echo 'class="inactive"';}  ?>><a href="pages.php">Pages</a></li>
		  <li <?php if($_SERVER['PHP_SELF'] == $a.'news.php'){echo 'class="active"';} else{echo 'class="inactive"';}  ?>><a href="news.php">News</a></li>
		  <li <?php if($_SERVER['PHP_SELF'] == $a.'testimonials.php'){echo 'class="active"';} else{echo 'class="inactive"';}  ?>><a href="testimonials.php">Testimonials</a></li>
		  <li <?php if($_SERVER['PHP_SELF'] == $a.'services.php'){echo 'class="active"';} else{echo 'class="inactive"';}  ?>><a href="services.php">Services</a></li>
		  <li <?php if($_SERVER['PHP_SELF'] == $a.'settings.php'){echo 'class="active"';} else{echo 'class="inactive"';}  ?>><a href="settings.php">Settings</a></li>
		  <li <?php if($_SERVER['PHP_SELF'] == $a.'projects.php'){echo 'class="active"';} else{echo 'class="inactive"';}  ?>><a href="projects.php">Projects</a></li>
		  <li <?php if($_SERVER['PHP_SELF'] == $a.'enquiry.php'){echo 'class="active"';} else{echo 'class="inactive"';}  ?>><a href="enquiry.php">Enquiry</a></li>
          
		</ul>
      </div>
    </div>