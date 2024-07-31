		<table cellpadding="10px" cellspacing="0px" width="90%" align="center" border="1">
			<tr>
				<td>Welcome <?php echo $_SESSION['auth']['name'];?></td>
				<td><a href="logout.php">Logout</a></td>
			</tr>
		</table>
		<br/>
		<table cellpadding="10px" cellspacing="0px" width="90%" align="center" border="1">
			<tr>
				<td><a href="dashboard.php">Dashboard</a></td>
				<?php if($_SESSION['auth']['role']=='admin'){?>
				<td><a href="manage_users.php">Manage Users</td>
				<td>Manage Cities</td>
				<?php } ?>
				<td>Manage Guests</td>
			</tr>
		</table>