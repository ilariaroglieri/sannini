<!doctype html>
<html lang="en">
	<head>

	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width,initial-scale=1.0">

	  <title><?= $site->title() ?> | <?= $page->title() ?></title>

	  <?= css(['assets/css/style.css', '@auto']) ?>

	  <link rel="icon" type="image/x-icon" href="">
	  <link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	</head>

	<?php $topLevel = $page->parent() ? $page->parents()->last() : $page; ?>
	<body class="<?= $topLevel->slug() ?> <?= $page->parents()->count() ? $page->parent()->uid() . ' ' . $page->uid() : $page->uid(); ?>">

		<header id="header" class="p-fixed">
			<div class="d-flex flex-row space-between center">


			</div>

		</header>
		
		<?= snippet('menu'); ?>

