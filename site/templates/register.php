<?php snippet('header') ?>

<main class="main" role="main">
	<article class="text">
		<h1 class="title"><?php echo $page->subtitle()->or($page->title()) ?></h1>
  </article>

  <form method="post">
    <?php if($success): ?>
    <div class="alert success">
      <?php echo $page->success()->kirbytext() ?>
    </div>
    <?php endif ?>
  
    <?php if($error): ?>
    <div class="alert error">
      <?php echo $page->error()->kirbytext() ?>
    </div>
    <?php endif ?>

    <div>
      <label for="username">Username</label>
      <input type="text" id="username" name="username">
      <p class="help">It will not be possible to change it.</p>
    </div>
    <div>
      <label for="username">Email</label>
      <input type="text" id="email" name="email">
    </div>
    <div>
      <label for="password">Password</label>
      <input type="password" id="password" name="password">
    </div>
    <div class="center">
    	<input type="submit" name="register" value="Create account">
    </div>
    <div class="center">
      <a href="<?php echo url('login') ?>">I already have an account.</a>
    </div>
  </form>
</main>

<?php snippet('footer') ?>