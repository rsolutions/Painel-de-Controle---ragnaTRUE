<?php if(!defined('ODIN_ROOT')) exit;

  $POST_DATA = array('user','pass','email','sex','captcha');
  
    foreach($POST_DATA as $value) {
    ${$value} = $_POST[$value];
    }
    
  require_once('res/msg.inc.php');
  
    if(!isset($user) || !isset($pass) || !isset($email) || !isset($sex) || !isset($captcha)) 
      $ERROR['incompleteForm'] = TRUE;
      
    if(strlen($user) < 4 || strlen($user) > 16 || checkString($user)==TRUE) 
      $ERROR['userLength'] = TRUE;
      
    if(strlen($pass) < 4 || strlen($pass) > 16 || checkString($pass)==TRUE) 
      $ERROR['passLength'] = TRUE;
      
    if($pass == $user) 
      $ERROR['userLikePass'] = TRUE;
      
    if($sex != "M" && $sex != "F") 
      $ERROR['invalidGender'] = TRUE;
      
    if(!eregi("^[^@]*@[^@]*\.[^@]*$", $email) || strlen($email) > 30) 
      $ERROR['invalidEmail'] = TRUE;
      
    if($captcha != $_SESSION['PASSKEY']) 
      $ERROR['captchaError'] = TRUE;

    if(!isset($ERROR)) {
    
      SQL($MYSQL);
      
        $checkUser = mysql_num_rows(mysql_query("SELECT userid FROM `login` WHERE userid LIKE '" . mysql_real_escape_string($user) . "'"));
        $checkMail = mysql_num_rows(mysql_query("SELECT email FROM `login` WHERE userid LIKE '" . mysql_real_escape_string($email) . "'"));

        if($checkUser != 0) 
          $ERROR['userTaken'] = TRUE;
          
        if($checkMail != 0) 
          $ERROR['mailUsed'] = TRUE;
        
          if($USE_MD5 == TRUE) 
            $pass = md5($pass);
        
          if(!isset($ERROR)) {
          
            if(
            mysql_query("
            
              INSERT INTO `login` (
              userid, 
              user_pass, 
              sex, 
              email, 
              last_ip, 
              lastlogin
              ) 
              
              VALUES (
              '" . mysql_real_escape_string($user) . "',
              '" . mysql_real_escape_string($pass) . "',
              '" . mysql_real_escape_string($sex) . "',
              '" . mysql_real_escape_string($email) . "',
              '" . $_SERVER['REMOTE_ADDR'] . "',
              NOW()
              )
              
            ")) 
            
              include_once('res/html/reg_succeed.html');
            
            else {
              include_once('res/html/reg_fail.html');
              echo "<div class=\"errors\">\n" . mysql_error() . "</div>".
                   "<a class=\"alink\" href=\"index.php\">Go back</a>";
            }
          
          }
          
          else {
          $ERRORLIST = printErrors($ERRORMSG, $ERROR);
          include_once('res/html/reg_fail.html');
          echo "<div class=\"errors\">\n$ERRORLIST</div>".
               "<a class=\"alink\" href=\"index.php\">Go back</a>";
          }
    }
  
    else {
      $ERRORLIST = printErrors($ERRORMSG, $ERROR);
      include_once('res/html/reg_fail.html');
      echo "<div class=\"errors\">\n$ERRORLIST</div>".
           "<a class=\"alink\" href=\"index.php\">Go back</a>";
    }

  $_SESSION['PASSKEY'] = randStr(7);

?>