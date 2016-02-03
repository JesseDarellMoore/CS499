<?php
$this->start('navigation');
echo $this->element('navigation/login_guest');
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
		<?= $cakeDescription ?>:
		<?= $this->fetch('title') ?>
	</title>
	<?= $this->Html->meta('icon') ?>

	<?= $this->Html->css('base.css') ?>
	<?= $this->Html->css('app.css') ?>

	<?= $this->fetch('meta') ?>
	<?= $this->fetch('css') ?>
	<?= $this->fetch('script') ?>
</head>
<body>
	<div class="wrap">
		<div class="header">
			<div class="navigation">
				<div class="navigation-inner responsive-inner">
					<?= $this->fetch('navigation') ?>
				</div>
			</div>
		</div>
		<div class="flash">
			<div class="flash-inner responsive-inner">
				<?= $this->Flash->render() ?>
			</div>
		</div>
		<div class="body">
			<?= $this->fetch('content') ?>
		</div>
	</div>
</body>
</html>
