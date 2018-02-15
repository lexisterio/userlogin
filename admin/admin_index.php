<?php
  ini_set('display_errors', 1);
  error_reporting(E_ALL);
  require_once('phpscripts/config.php');
  require_once('phpscripts/functions.php');
  confirm_logged_in();
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>CMS Portal</title>
</head>
<body>
  <h1>Welcome Company Name to your admin page</h1>
  <?php echo "<h2>Hi-{$_SESSION['user_name']} last login : {$_SESSION['user_lastlogin']}</h2>"; ?>
  <div>
      <?php 
        $messageDay = welcomeTimeMessage();
        echo $messageDay;
      ?>
  </div>
  
  
</body>
</html>
