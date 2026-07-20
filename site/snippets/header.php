<!doctype html>
<html lang="en">
	<head>

	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width,initial-scale=1.0">

	  <title><?= $site->title() ?> | <?= $page->title() ?></title>

	  <?= css(['assets/css/style.css', '@auto']) ?>

	  <link rel="icon" type="image/x-icon" href="">
	</head>

	<?php $topLevel = $page->parent() ? $page->parents()->last() : $page; ?>
	<body class="<?= $topLevel->slug() ?> <?= $page->parents()->count() ? $page->parent()->uid() . ' ' . $page->uid() : $page->uid(); ?>">
		<div class="container">
			<header class="module header-module d-flex space-between" data-span-x="3">
				<div class="element d-one-third">
					MENU
					<?= snippet('menu'); ?>
				</div>
				<div class="element d-one-third">
					LOGO
				</div>
			</header>
			

