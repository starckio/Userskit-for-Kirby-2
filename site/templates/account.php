<?php snippet('header') ?>

<main class="main" role="main">

	<h1 class="title center"><?= $page->subtitle()->or($page->title()) ?></h1>

	<form method="post" class="burger">

		<?php if(param('account') === 'true'): ?>
		<div class="alert success">
			<p>Entrer un mot de passe pour terminer l'inscription et assurez-vous que vos informations sont à jour.</p>
		</div>
		<?php endif ?>

		<?php if(isset($success)): ?>
		<div class="alert success">
			<p><?= $success ?></p>
		</div>
		<?php endif ?>

		<?php if($error): ?>
		<div class="alert error">
			<?php foreach($error as $message): ?>
			<p><?= html($message) ?></p>
			<?php endforeach ?>
		</div>
		<?php endif ?>

		<div class="field">
			<label for="username">Prénom</label>
			<input type="text" id="firstname" name="firstname" value="<?= $user->firstname() ?>">
		</div>
		<div class="field">
			<label for="username">Nom</label>
			<input type="text" id="lastname" name="lastname" value="<?= $user->lastname() ?>">
		</div>
		<div class="field">
			<label for="username">Adresse email</label>
			<input type="text" id="email" name="email" value="<?= $user->email() ?>">
		</div>
		<div class="field">
			<label for="password">Mot de passe</label>
			<input type="password" id="password" name="password" value="">
			<?php if(param('account') === 'true'): ?>
			<small class="help">Veuillez entrer un mot de passe</small>
			<? else: ?>
			<small class="help">Laissez vide pour le garder identique.</small>
			<?php endif ?>
		</div>
		<div class="field">
			<input class="btn" type="submit" name="update" value="Enregistrer">
			<?php if(!$user->hasPanelAccess()): ?><a class="link" href="<?= url('account/delete') ?>">Supprimer mon compte</a><?php endif ?>
		</div>
	</form>

</main>

<?php snippet('footer') ?>