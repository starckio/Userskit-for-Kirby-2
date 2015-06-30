<?php if(!$user = $site->user()) go('/register') ?>

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
      <label for="username">First name</label>
      <input type="text" id="firstname" name="firstname" value="<?php echo $user->firstname() ?>">
    </div>
    <div>
      <label for="username">Last name</label>
      <input type="text" id="lastname" name="lastname" value="<?php echo $user->lastname() ?>">
    </div>
    <div>
      <label for="username">Email address</label>
      <input type="text" id="email" name="email" value="<?php echo $user->email() ?>">
    </div>
    <div>
      <label for="password">New password</label>
      <input type="password" id="password" name="password" value="">
      <p class="help">Leave blank to keep it the same</p>
    </div>
    <div>
      <label for="bio">Bio</label>
      <textarea name="bio" id="bio"><?php echo $user->bio() ?></textarea>
    </div>
    <div>
      <label for="link">Personal link</label>
      <input type="text" id="link" name="link" value="<?php echo $user->link() ?>">
    </div>
    <div class="center">
    	<input type="submit" name="update" value="Save">
    </div>
    <div class="center">
      <a href="<?php echo url('delete') ?>">Delete my account.</a>
    </div>
  </form>
</main>

<?php snippet('footer') ?>