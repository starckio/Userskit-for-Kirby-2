<?php

function resetPassword($email,$firstTime = false) {

	// Trouver l'utilisateur
	$user = site()->users()->findBy('email',$email);
	if (!$user) return false;

	// Générer un jeton hexadécimal aléatoire sécurisé de 32 caractères
	do {
		$bytes = openssl_random_pseudo_bytes(16, $crypto_strong);
		$token = bin2hex($bytes);
	} while(!$crypto_strong);

	// Ajouter le jeton au profil de l'utilisateur
	$user->update([
		'token' => $token,
	]);

	// Définir le lien de réinitialisation
	$domain = str_replace('www.', '', $_SERVER['HTTP_HOST']);
	$resetLink = site()->url().'/token/'.$token;

	// Construire le texte du courrier électronique
	if ($firstTime) {
		$subject = 'Activez votre compte';
		$body = 'Votre courriel est incrit sur le site '.str_replace('www.', '', $_SERVER['HTTP_HOST']).'. Accédez au lien ci-dessous afin d\'activer votre compte.'."\n\n".$resetLink."\n\n".'Si vous n\'avez pas crée ce compte, aucun action n\'est requis. Le compte restera inactivé.';
	} else {
		$subject = 'Réinitialisez votre mot de passe';
		$body = 'Quelqu\'un a demandé un nouveau mot de passe pour votre compte sur le site '.str_replace('www.', '', $_SERVER['HTTP_HOST']).'. Accédez au lien ci-dessous afin de réinitialiser votre mot de passe.'."\n\n".$resetLink."\n\n".'Si vous n\'avez pas demandé cet action, aucune action n\'est requis.';
	}

	// Envoyer le courrier électronique de confirmation
	$email = new Email(array(
		'to'      => $user->email(),
		'from'    => 'noreply@'.$domain,
		'subject' => $subject,
		'body'    => $body,
	));

	if($email->send()) {
		return true;
	} else {
		return false;
	}

}