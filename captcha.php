<?php require('global.inc.php');

  $code = randStr(7);
  
  $_SESSION['PASSKEY'] = $code;

  header("Cache-Control: no-cache, must-revalidate");
  header("Expires: Mon, 1 Jan 1970 00:00:00 GMT");

  securityCode(80, 20, $code);
  
?>