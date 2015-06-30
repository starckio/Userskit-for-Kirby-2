<nav role="navigation">
  <div class="button gray toggle">Menu</div>
	<ul class="menu cf">
		<?php foreach($pages->visible() as $p): ?>
		<li><a<?php e($p->isOpen(), ' class="active"') ?> href="<?php echo $p->url() ?>"><?php echo $p->title()->html() ?></a></li>
		<?php endforeach ?>

		<?php if($user = $site->user()): ?>
		<li class="span"></li>
		<?php if($user->hasPanelAccess()): ?>
		<li><a href="<?php echo url('panel') ?>">Panel</a></li>
		<?php endif ?>
		<li><a<?php e($pages->find('account')->isOpen(), ' class="active"') ?>  href="<?php echo url('account') ?>">Profil</a></li>
		<li><a href="<?php echo url('logout') ?>">Log out</a></li>
		<?php else: ?>
		<li class="span"></li>
		<li><a<?php e($pages->find('login')->isOpen(), ' class="active"') ?>  href="<?php echo url('login') ?>">Log in</a></li>
		<li><a<?php e($pages->find('register')->isOpen(), ' class="active"') ?>  href="<?php echo url('register') ?>">Join</a></li>
		<?php endif ?>
	</ul>
</nav>
