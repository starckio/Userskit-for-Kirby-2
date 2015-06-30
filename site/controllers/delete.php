<?php 

return function($site, $pages, $page) {

  // handle the form submission
  if(r::is('post') and get('delete')) {

    // fetch the user by username and run the 
    // login method with the password
    if($user = $site->user(get('username'))->delete()) {
      // redirect to the homepage 
      // if the login was successful
      go('register');
    } else {
      // make sure the alert is being 
      // displayed in the template
      $error = true;
    }

  } else {
    // nothing has been submitted
    // nothing has gone wrong
    $error = false;  
  }

  return array('error' => $error);

};