<?php
require_once("includes/config.php");
$enquiries = new enquiries;
	$sql = $enquiries -> select($enquiries->table)  
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
                  <p>Welcome Mr. <?php echo $_SESSION['auth']['name'];?>!</p>
                </div>
              </div>
        </div>
        <div class="block" id="block-tables">
          <div class="secondary-navigation"></div>
          <div class="content">
            <h2 class="title">Persons Details:</h2>
	    <div class="actions-bar wat-cf">
        </div>
            <div class="inner">
              <form action="#" class="form" method="post">
                <table class="table">
                  <tr>
                    <th class="first"><input type="checkbox" class="checkbox toggle" /></th>
                    <th>Sr. No.</th>
                    <th id="center">Name</th>
                    <th id="center">Email Id</th>
                    <th id="center">Contact No.</th>
                    <th class="last">&nbsp;</th>
                  </tr>
				  <?php foreach ($sql as $rows){ ?>
                  <tr class="odd">
                    <td class="cellmail"><input type="checkbox" class="checkbox" name="selector[]" value="<?php echo $rows['id'];?>" /></td>
					<td class="cellmail"><?php echo $rows['id']; ?></td>
					<td id="center" class="cellmail"><?php echo $rows['name'];?></td>
					<td id="center" class="cellmail"><?php echo $rows['email'];?></td>
					<td id="center" class="cellmail"><?php echo $rows['contact_no'];?></td>
					<td class="last cellmail" id="decoration"><a href="showtenquiry.php?id=<?php echo $rows['id']; ?>"><img src="images/icons/show.gif" alt="show" /></a> | <a href="editguest.php?id=<?php echo $rows['id'];?>"><img src="images/icons/edit.png" alt="edit" /></a> | <a href="delete.php?id=<?php echo $rows['id'];?>" onclick="return confirm('Do You Really Want to Delete this Record?')"><img src="images/icons/del.gif" alt="del" /></a></td>
                  </tr>
				  <?php } ?>
                </table>
                <div class="actions-bar wat-cf">
                  <div class="actions">
                    <button class="button" type="submit" name="deleteall" onclick="return confirm('Do You really want to Delete All Selected Records?')">
                      <img src="images/icons/cross.png" alt="Delete" /> Delete
                    </button>
                  </div>
                  <div class="pagination">
				  <?php
				  /*for($i=1;$i<=$tp;$i++)
				  {
					if($i!=$page)
					{
						echo "<a href='#'>".$i."</a>&nbsp;";
					}
					else
					{
						echo "<span class='current'>".$i."</span>&nbsp;";
					}						
				  }
				  */
				  
				  ?>     
                  </div>
                </div>
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