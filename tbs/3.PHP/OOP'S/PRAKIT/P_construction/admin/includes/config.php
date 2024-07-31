<?php   
define('HTTP_DOMAIN','http://localhost/training/construction/');
define('FTP_DOMAIN', 'G:/xampp/htdocs/training/construction/');

define('FTP_AVATAR_DIR', FTP_DOMAIN.'images/Avatar/');
define('HTTP_AVATAR_DIR', HTTP_DOMAIN.'images/Avatar/');

define('FTP_DOC_DIR', FTP_DOMAIN.'images/Documents/');
define('HTTP_DOC_DIR', HTTP_DOMAIN.'images/Documents/');

require_once('models/db.php');
require_once('includes/database.php');

session_start();
session_name('auth');
?>

