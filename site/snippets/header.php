<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>
  <meta name="description" content="<?php echo $site->description()->html() ?>">
  <meta name="keywords" content="<?php echo $site->keywords()->html() ?>">

  <?php echo css('http://fonts.googleapis.com/css?family=Roboto:400,700italic,700,400italic,300italic,300') ?>
  <?php echo css('assets/css/main.css') ?>

</head>
<body id="<?php echo $page->template() ?>">

<header class="header cf" role="banner">
  <a class="logo" href="<?php echo url() ?>"><?php echo $site->title()->html() ?></a>
  <?php snippet('menu') ?>
</header>