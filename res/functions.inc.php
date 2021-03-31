<?php if(!defined('ODIN_ROOT')) exit;

  function SQL($sql) {
    $con = mysql_connect($sql['host'],$sql['user'],$sql['pass']);
      if (!$con) 
        die('There is currently an error with the database: ' . mysql_error() . ' Please notify an administrator.');
        
    $dba = mysql_select_db($sql['db']);
      if (!$dba) 
        die('There is currently an error with the database: ' . mysql_error() . ' Please notify an administrator.');    
  }

  function checkString($str) {
    if(preg_match("/[^a-zA-Z0-9]/", $str) != 0) return TRUE;
    else return FALSE;
  }
  
  function randStr($int) {
  return substr(md5(rand(1,1000)),0,$int);
  }

  function securityCode($width, $height, $passkey) {

    $fontList = array (
    'tahoma.ttf',
    'arial.ttf',
    'impact.ttf'
    );

    $selectedFont = $fontList[rand(0,(count($fontList)-1))];

    $font = array(
    'font'   => $selectedFont,
    'size'   => ($height/1.5)
    );

    $captcha  = imagecreate($width, $height);
    $bgColor  = imagecolorallocate($captcha, 0xF5, 0xF5, 0xF5);
    $txtColor = imagecolorallocate($captcha, 0xA1, 0x59, 0x6F);
    $addTxt   = imagettfbbox($font['size'], 0, $font['font'], $passkey);
    //$xalign   = ($width - $addTxt[4])/2;
    $yalign   = ($height - $addTxt[5])/2;

    imagettftext($captcha, $font['size'], 0, 2, $yalign, $txtColor, $font['font'], $passkey);
    header('Content-Type: image/gif');
    imagegif($captcha);
    imagedestroy($captcha);

  }

  function printErrors($errorList, $errors) {
  $output=(string)"";
    foreach($errors as $key => $value) {
      if($value == TRUE) {
      $output .= $errorList[$key] . "<br />\n";
      }
    }
  return $output;
  }

?>