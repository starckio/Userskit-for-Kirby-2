<?php

return function($site, $pages, $page) {

	// Seuls les utilisateurs connectés sont autorisés!
	$user = $site->user();
	if(!$user) go('login');

	$error = null;

	if(r::is('post') && get('update')) {
		if(!empty(get('website'))) {
			// Disons au robot que tout va bien
			go('error');
			exit;
		}
		$data = array(
			'firstname' => esc(get('firstname')),
			'lastname'  => esc(get('lastname')),
			'email'     => esc(get('email')),
			'password'  => esc(get('password'))
		);

		$rules = array(
			'firstname' => array('required'),
			'lastname'  => array('required'),
			'email'     => array('required', 'email'),
		);
		$messages = array(
			'firstname' => 'Veuillez entrer un prénom valide',
			'lastname'  => 'Veuillez entrer un nom valide',
			'email'     => 'S\'il vous plaît, mettez une adresse email valide',
		);

		// Si certaines données sont invalides
		if($invalid = invalid($data, $rules, $messages)) {
			$error = $invalid;
		} else {

			// Si tout va bien, essayons de mettre à jour les informations
			try {

				$user = $site->user()->update(array(
					'firstname' => $data['firstname'],
					'lastname'  => $data['lastname'],
					'email'     => $data['email'],
					'language'  => 'en'
				));
				if(get('password') === '') {
					// No password change
				} else {
					// Update password
					$user = $site->user()->update(array(
						'password'  => get('password')
					));
				}

				$success = 'Vos informations ont été mises à jour.';
				$data = array();

			} catch(Exception $e) {
				$error = 'Votre enregistrement a échoué';
			}
		}
	}

	return compact('user', 'error', 'data', 'success');
};