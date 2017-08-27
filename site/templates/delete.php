<?php snippet('header') ?>

<main class="main" role="main">

	<h1 class="title center"><?= $page->subtitle()->or($page->title()) ?></h1>

	<form method="post" class="burger">
		<div class="field checkbox">
			<input id="deleteConfirm" type="checkbox" name="deleteConfirm" required>
			<label for="deleteConfirm">Supprimer mon compte pour toujours</label>
			<small class="help">Je comprends que la suppression de mon compte est permanente et sera supprimé à jamais.</small>
		</div>
		<div class="field">
			<input class="btn" type="submit" name="delete" value="Supprimer mon compte">
			<a class="link" href="<?= url('account') ?>">Annuler</a>
		</div>
	</form>

</main>

<?php snippet('footer') ?>