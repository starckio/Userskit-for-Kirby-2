<?php snippet('header') ?>

<main class="main" role="main">

	<h1 class="title center"><?= $page->subtitle()->or($page->title()) ?></h1>

	<?php if($error): ?>
	<div class="alert error">
		<?= $error ?>
	</div>
	<?php endif ?>

	<?php if(isset($success)): ?>
	<div class="alert success">
		<?= $success ?>
	</div>
	<?php endif ?>

	<form method="post" class="burger">
		<div class="field">
			<label for="email">Adresse email</label>
			<input type="text" id="email" name="email">
		</div>
		<div class="field honeypot">
			<label for="subject">Honeypot</label>
			<input type="text" id="subject" name="subject">
			<small class="help">For Robots.</small>
		</div>
		<div class="field">
			<input class="btn" type="submit" name="reset" value="Réinistialiser">
			<a class="link" href="<?= url('login') ?>">Se connecter</a>
		</div>
	</form>

</main>

<?php snippet('footer') ?>