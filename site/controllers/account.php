<?php 

return function($site, $pages, $page) {

  // handle the form submission
  if(r::is('post') and get('update')) {

    try {
      $user = $site->user()->update(array(
        'firstname' => get('firstname'),
        'lastname'  => get('lastname'),
        'email'     => get('email'),
        'bio'       => get('bio'),
        'link'      => get('link'),
        'language'  => 'en'
      ));
      if (get('password') === '') {
        // No password change
      } else {
        // Update password
        $user = $site->user()->update(array(
          'password'  => get('password')
        ));
      }
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