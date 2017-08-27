<?php

/* -----------------------------------
   License Setup
--------------------------------------

Please add your license key, which you've received
via email after purchasing Kirby on http://getkirby.com/buy

It is not permitted to run a public website without a
valid license key. Please read the End User License Agreement
for more information: http://getkirby.com/license

*/

c::set('license', 'put your license key here');


/* -----------------------------------
   User roles
-------------------------------------- */

c::set('roles', array(
	array(
		'id'      => 'admin',
		'name'    => 'Admin',
		'panel'   => true
	),
	array(
		'id'      => 'client',
		'name'    => 'Client',
		'default' => true,
		'panel'   => false
	)
));


/* -----------------------------------
   Routes
-------------------------------------- */
c::set('routes', array(
	array(
		'pattern' => 'logout',
		'action'  => function() {
			if($user = site()->user()) $user->logout();
			go('login');
		}
	),
	array(
		// Mot de passe remis à zéro et compte vérifié par l'adresse de courriel
		'pattern' => 'token/([a-f0-9]{32})',
		'action'  => function($token) {

			// Déconnecter tous les utilisateurs actifs
			if($u = site()->user()) $u->logout();

			// Trouver l'utilisateur par jeton
			if($user = site()->users()->findBy('token', $token)) {

				// Détruire le jeton et mettre à jour le mot de passe temporaire
				$user->update([
					'token' => '',
					'password' => $token,
				]);

				// Redirection puis identification
				if($user->login($token)) {
					return go('/account/account:true');
				} else {
					return go('/');
				} 
			} else {
				return false;
			}
		}
	),
));


/* -----------------------------------
   Debug
-------------------------------------- */

c::set('debug',true);