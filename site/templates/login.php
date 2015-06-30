<?php snippet('header') ?>

<main class="main" role="main">
	<article class="text">
		<h1 class="title"><?php echo $page->subtitle()->or($page->title()) ?></h1>
		<?php echo $page->text()->kirbytext() ?>
	</article>
	
	<form method="post">
	  <?php if($error): ?>
	  <div class="alert error">
	  	<p><?php echo $page->alert()->html() ?></p>
	  </div>
	  <?php endif ?>

	  <div>
	    <label for="username">Username</label>
	    <input type="text" id="username" name="username">
	  </div>
	  <div>
	    <label for="password">Password</label>
	    <input type="password" id="password" name="password">
	  </div>
	  <div class="center">
	    <input type="submit" name="login" value="Login">
	  </div>
	  <div class="center">
	    <a href="<?php echo url('register') ?>">I need an account.</a>
	  </div>
	</form>
</main>

<?php snippet('footer') ?>