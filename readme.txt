  
  #############################
  # rSOLUTIONS Account Registration #
  # by Rafael Almeida         #
  #############################
  
  IRIS is a lightweight script to register accounts for SQL based eAthena emulator.
  
  Dependencies:
    * PHP5
    * php_mysql and php_gd2 extensions
    
  Included Languages:
    * English
    
  Install:
    * Extract files to a new folder and configure MySQL account settings in global.inc.php
    * If you use MD5 encryptions on passwords, change the MD5 setting
  
  Features:
    * Proposed HTML layout
    * A simple CAPTCHA using TTF fonts (Arial, Impact and Tahoma fonts included)
  
  Notes:
    * It's recommended to only give read/write access to `login` as it doesn't need ability
      to access any other tables.
    * The current layout looks somewhat better in Mozilla Firefox (takes use of -moz-border-radius)
    * While IRIS does require a valid email address, it does not send any activation mail
    * Any IP address may register an infinite amount of accounts
    
  All included artwork is copyright Gravity Corp. and/or Myung-jin Lee
  