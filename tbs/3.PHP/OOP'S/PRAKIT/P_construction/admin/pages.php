<?php
require_once("includes/config.php");
$pages = new pages;

/*-------------------Code for Show data-------------------------*/
$sql=$pages->select($pages->table,'','','','');

/*-------------------Code for Delete Records-------------------*/
	if(isset($_GET['id']))
	{
		$pages->delete($pages->table,"id='".$_GET['id']."'");
		
		header("location:pages.php");
	   
	}
/*-------------------Code for Pagination----------------------*/
if(isset($_GET['page']))
{
	$page = $_GET['page'];/*2-finding page*/
}
else
{
	$page = 1;
}
$rpp =3;/*1-records per page*/
$rsf = ($page*$rpp)-$rpp;/*3-records starts from*/
$limit = "$rsf,$rpp";
$sql = $pages->select($pages->table,'','','',$limit);/*4-total records*/

$sqlcount = $pages->select($pages->table);
$tot = count($sqlcount);
$totpages = ceil($tot/$rpp);/*5-total pages*/
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
            <h2 class="title">Pages</h2>
			<div class="actions-bar wat-cf">
                  <div class="actions" style="float:right;padding-right:5px;">
                    <button class="button" type="submit" onclick="window.location='addpage.php';">
                      <img src="images/icons/tick.png" alt="Add New Guest" /> Add Pages
                    </button>
                  </div>
             </div>
            <div class="inner">
			<form method="post" class="form" enctype="multipart/form-data">
				<table align="center" cellpadding="10px" cellspacing="10px" width="840px" border="0" align="center">
				    <table class="table">
                  <tr>
                    <th class="first"><input type="checkbox" class="checkbox toggle" /></th>
                    <th>Sr. No.</th>
                    <th id="center">Title</th>
                    <th id="center">Actions</th>
                  </tr>
				  <?php foreach($sql as $rows){?>
                  <tr class="odd">
                    <td class="cellmail"><input type="checkbox" class="checkbox" name="selector[]"/></td>
					<td class="cellmail"><?php echo $rows['id'];?></td>
					<td id="center" class="cellmail"><?php echo $rows['title'];?></td>
					<td id="center" class="last cellmail" id="decoration"><a href="showpage.php?id=<?php echo $rows['id']; ?>"><img src="images/icons/show.gif" alt="show" /></a> | <a href="editpage.php?id=<?php echo $rows['id'];?>"><img src="images/icons/edit.png" alt="edit" /></a> | <a href="pages.php?id=<?php echo $rows['id'];?>" onclick="return confirm('Do You Really Want to Delete this Record?')"><img src="images/icons/del.gif" alt="del" /></a></td>
                  </tr>
				  <?php }?>
				<table class="table">
                    <div class="pagination">
				  <?php
				  for($i=1;$i<=$totpages;$i++)
				  {
					if($i!=$page)
					{
						echo "<a href='pages.php?page=$i'>".$i."</a>&nbsp;";
					}
					else
					{
						echo "<span class='current'>".$i."</span>&nbsp;";
					}						
				  }
				  
				  ?> 
                  </div>				
                </table>
                </table> 				
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