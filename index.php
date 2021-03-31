<?php require_once('global.inc.php'); ?>
<!DOCTYPE html 
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
  <head>
    <title>ragnaTRUE // Registro de Contas</title>
    <meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type"/>
    <link rel="stylesheet" href="res/html/style.css" type="text/css" />
  <style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style></head>
  <body>
    <div id="register">
      <?php 
      if(array_key_exists('user', $_POST)) require_once('res/register.inc.php');
      else include_once('res/html/regform.html'); 
      ?>
    </div>
  </body>

</html>