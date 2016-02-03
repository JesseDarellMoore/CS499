<?php
$this->start('navigation');
echo $this->element('navigation/login_admin');
echo $this->element('navigation/main');
echo $this->element('navigation/logo');
$this->end();
?>
<!DOCTYPE html>
<html>
<head>
	<?= $this->Html->charset() ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		<?= $this->fetch('title') ?>
	</title>
	<?= $this->Html->meta('icon') ?>

	<?= $this->Html->css('base.css') ?>
	<?= $this->Html->css('app.css') ?>
	<?= $this->Html->css('admin.css') ?>

	<?php if (isset($css)) foreach ($css as $c) { ?>
		<?= $this->Html->css($c) ?>
	<?php } ?>

	<?= $this->fetch('meta') ?>
	<?= $this->fetch('css') ?>
	<?= $this->fetch('script') ?>
</head>
<body>
<div class="wrap admin">
	<div class="header">
		<div class="navigation">
			<div class="navigation-inner responsive-inner">
				<?= $this->fetch('navigation') ?>
			</div>
		</div>
		<div class="admin-header">

		</div>
	</div>
	<div class="flash">
		<div class="flash-inner responsive-inner">
			<?= $this->Flash->render() ?>
		</div>
	</div>
	<div class="body">
		<?= $this->fetch("content") ?>
	</div>
</div>
</body>
</html>


