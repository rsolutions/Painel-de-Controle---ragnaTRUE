<?php session_start(); 

  /* Enter your database details */
  
  $MYSQL = array (
  'host' => 'localhost',
  'user' => 'root',
  'pass' => 'aqEreUx8AGfVmxaW',
  'db'   => 'rag_TRUE'
  );
  
  /* Use MD5 hash for passwords? */
  
  $USE_MD5 = FALSE;
  
  /* You don't need to change anything below */

  define("ODIN_ROOT", TRUE);

  require_once('res/functions.inc.php');

  if(!isset($_SESSION['PASSKEY'])) $_SESSION['PASSKEY'] = randStr(7);

?>