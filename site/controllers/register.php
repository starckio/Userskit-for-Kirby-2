<?php 

return function($site, $pages, $page) {

  // handle the form submission
  if(r::is('post') and get('register')) {

    try {

      $user = $site->users()->create(array(
        'username'  => get('username'),
        'email'     => get('email'),
        'password'  => get('password'),
        'language'  => 'en'
      ));
      // make sure the alert is being 
      // displayed in the template
      $success = true;

      } catch(Exception $e) {
      // make sure the alert is being 
      // displayed in the template
      $error = true;

      }

  } else {
    // nothing has been submitted
    // nothing has gone wrong
    $error = false;
  }

  return array('error' => $error, 'success' => $success);

};