<?php snippet('header') ?>

<main class="main" role="main">

	<h1 class="title center"><?= $page->subtitle()->or($page->title()) ?></h1>

	<form method="post" class="burger">

		<?php if($error): ?>
		<div class="alert error">
			<p><?= $error ?></p>
		</div>
		<?php endif ?>

		<div class="field">
			<label for="email">Adresse email</label>
			<input type="email" id="email" name="email">
		</div>
		<div class="field">
			<label for="password">Mot de passe</label>
			<input type="password" id="password" name="password">
		</div>
		<div class="field">
			<input class="btn" type="submit" name="login" value="Se connecter">
			<a class="link" href="<?= url('account/register') ?>">S'inscrire</a><br />
		</div>
		<div class="field center cf"><a href="<?= url('account/reset') ?>">Mot de passe oublié?</a></div>
	</form>

</main>

<?php snippet('footer') ?>