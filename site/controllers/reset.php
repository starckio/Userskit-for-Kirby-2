<?php

return function ($site, $pages, $page) {

    // Disons au robot que tout va bien
    if(r::is('post') and get('subject') != '') go(url('error'));

    // Processus de réinitialisation du formulaire
    if(r::is('post') and get('reset') !== null) {

        if(resetPassword(get('email'))) {
            $success = 'Vous recevrez un courriel avec les instructions pour réinitialiser votre mot de passe.';
        } else {
            $error = 'Aucun compte correspondant au critère.';
        }
    } else {
        $error = false;
    }

	// Passer les variables au modèle
	return compact('error', 'success');
};