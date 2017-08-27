<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0">

	<title><?= $site->title()->html() ?> | <?= $page->title()->html() ?></title>
	<meta name="description" content="<?= $site->description()->html() ?>">
	<meta name="keywords" content="<?= $site->keywords()->html() ?>">

	<?= css('assets/css/main.css') ?>

</head>
<body>

<header class="header cf" role="banner">
	<a class="logo" href="<?= url() ?>">
		<img src="<?= url('assets/images/logo.svg') ?>" alt="<?= $site->title()->html() ?>" />
	</a>
	<?php snippet('menu') ?>
</header>