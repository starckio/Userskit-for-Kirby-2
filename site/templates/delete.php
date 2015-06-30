<?php if(!$user = $site->user()) go('/register') ?>

<?php snippet('header') ?>

<main class="main" role="main">
	<article class="text center">
		<h1><?php echo $page->subtitle()->or($page->title()) ?></h1>
		<?php echo $page->text()->kirbytext() ?>
  </article>

  <form method="post">
    <div class="center">
      <a class="button gray" href="<?php echo url('account') ?>">Cancel</a>
    	<input class="red" type="submit" name="delete" value="Delete my account forever">
    </div>
  </form>
</main>

<?php snippet('footer') ?>