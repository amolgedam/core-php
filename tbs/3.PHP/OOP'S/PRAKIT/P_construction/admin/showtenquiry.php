<?php
require_once("includes/config.php");

/*----------------------Code for show enquiries--------------*/
$enquiries = new enquiries;
$sql=$enquiries->select($enquiries->table,'',"id='".$_GET['id']."'");
//print_r($sql);exit;
/*----------------------Code End for show enquiries--------------*/

?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Show Enquiries</title>
  
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
            <h2 class="title">Show Enquiries</h2>
			<div class="actions-bar wat-cf">
            
            </div>
			
            <div class="inner">
			<form method="post" class="form" enctype="multipart/form-data">
				<table align="center" cellpadding="10px" cellspacing="10px" width="840px" border="0" align="center">
				     <tr>
					     <td class="label right">Name:</td>
						 <td><strong><?php echo $sql[0]['name'];?></strong></td>
					 </tr>
					 <tr>
					     <td class="label right">Email-Id:</td>
						 <td><?php echo $sql[0]['email'];?></td>
					 </tr>
					 <tr>
					     <td class="label right">Subject:</td>
						 <td><?php echo $sql[0]['subject'];?></td>
					 </tr>
					 <tr>
					     <td class="label right">Comments:</td>
						 <td><?php echo $sql[0]['comment'];?></td>
					 </tr>
					 <tr>
					     <td class="label right">Contact No:</td>
						 <td><?php echo $sql[0]['contact_no'];?></td>
					 </tr>
					  <tr>
					     <td class="label right">Created:</td>
						 <td><?php echo $sql[0]['created'];?></td>
					 </tr>
					  <tr>
					     <td class="label right">Modified:</td>
						 <td><?php echo $sql[0]['modified'];?></td>
					 </tr>
					 <tr>
					    <td>
						  <div class="actions-bar wat-cf">
						    <div class="actions">
                              <button class="button" type="button" name="back" onclick="windows:location='enquiry.php';">
                                <img src="images/icons/back.png"/> Back
                              </button> 
                            </div>
						  </div>
						</td>
						<td>&nbsp;</td>
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