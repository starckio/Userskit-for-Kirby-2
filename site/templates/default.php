<?php snippet('header') ?>

<main class="main" role="main">
	<article class="text">
		<h1 class="title"><?php echo $page->subtitle()->or($page->title()) ?></h1>
		<?php echo $page->text()->kirbytext() ?>
	</article>
</main>

<?php snippet('footer') ?>