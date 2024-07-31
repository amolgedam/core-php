<p style="text-align:left; border:2px solid green;padding:5px 20px;">Welcome <?php echo $_SESSION['auth']['name'];?> [ <a href="logout.php">Logout</a> ] &nbsp;  &nbsp;  &nbsp;  | &nbsp;  &nbsp;  &nbsp; 
<a href="dashboard.php">Dashboard</a> |  
<a href="manage_friends.php">Manage Friends</a> | 
<?php if($_SESSION['auth']['role']=='admin'){?>
<a href="manage_users.php">Manage Users</a> |
<?php }?> 


</p>