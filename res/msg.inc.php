<?php if(!defined('ODIN_ROOT')) exit;

  $DEFAULTMSG = array(
    
    'REGISTRATION' => array (
      'None' => 'None'
    )
  
  );
  
  $ERRORMSG = array(
  'incompleteForm' => '<b>You need to fill out all the fields before submitting your registration.</b>',
  'userLength' => 'The length of your username is invalid, or it contains unusable characters.',
  'userLikePass' => 'Your password is the same as your username. Please change it to something distinct.',
  'passLength' => 'The length of your password is invalid, or it contains unusable characters.',
  'invalidEmail' => 'The email address you entered is invalid or too long.',
  'invalidGender' => 'Unable to figure out which gender you chose.',
  'captchaError' => 'You failed to enter the correct security code. Aborting registration.',
  'userTaken' => 'The username you entered is currently in use. Please register with another one.',
  'mailUsed' => 'The submitted email address is already used. Please contact the administrator in case of abuse.'
  );

?>