<?php

return function ($site, $pages, $page) {

	// Disons au robot que tout va bien
	if(r::is('post') and get('subject') != '') go(url('error'));

	// Processus du formulaire d'inscription
	if(r::is('post') and get('register') !== null) {

		// Le nom d'utilisateur sera l'adresse courriel avec la ponctuation supprimée.
		// Les utilisateurs finaux ne l'utiliseront pas, nous avons juste besoin d'un ID unique pour le compte.
		$username = str::slug(get('email'),'');

		// Vérifie les doublons de comptes
		$duplicateEmail = $site->users()->findBy('email',trim(get('email')));
		$duplicateUsername = $site->users()->findBy('username',$username);

		if(count($duplicateEmail) === 0 and count($duplicateUsername) === 0) {
			try {
				// Mot de passe aléatoire pour la configuration initiale.
				// L'utilisateur va créer son propre mot de passe après la vérification par adresse courriel.
				$password = bin2hex(openssl_random_pseudo_bytes(16));

				// Créer un compte
				$user = $site->users()->create(array(
					'username'  => $username,
					'firstname' => trim(get('firstname')),
					'lastname'  => trim(get('lastname')),
					'email'     => trim(get('email')),
					'password'  => $password,
					'language'  => 'en'
				));

				// Envoyer un email de réinitialisation
				resetPassword($user->email(),true);

				$success = 'Votre compte vient d\'être créé! Vous allez recevoir un courriel afin de l\'activer.';

			} catch(Exception $e) {
				$error = 'Assurez-vous d\'avoir inscrit toute les infos correctement, y compris votre courriel.';
			}
		} else {
			$error = 'Un compte a déjà été créé avec cette adresse email.';
		}
	} else {
		$error = false;
	}

	// Passer les variables au modèle
	return compact('error', 'success');
};