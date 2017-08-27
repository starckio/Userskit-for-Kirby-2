<?php snippet('header') ?>

<main class="main" role="main">

	<div class="text">
		<?php if($user = $site->user()): ?>
		<h1>Bienvenue <?= $user->firstname() ?> !</h1>
		<?php else: ?>
		<h1><?= $page->subtitle()->or($page->title()) ?></h1>
		<?php endif ?>

		<?= $page->text()->kirbytext() ?>
	</div>

</main>

<?php snippet('footer') ?>