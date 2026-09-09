<?php snippet('header') ?>

<main id="single-realization-page">
	<?php snippet('title-module-realization', [
		'title' => $page->title()->fancypants(),
		'img' => $page->cover_img()->toFile(),
		'isPageTitle' => true
	]) ?>

	<?php snippet('title-module', [
		'title' => $page->realization_caption()->fancypants(),
		'titleStyle' => 'mono s-small t-center',
		'classes' => 'm-hidden'
	]) ?>

	<?php snippet('text-module', [
		'title' => $page->subtitle()->fancypants(),
		'text' => $page->intro_text()->fancypants(),
		'width' => 'd-whole',
	]) ?>

	<?= $page->blocks()->toBlocks() ?>

	<section class="module credits-module">
		<div class="d-flex m-column">
			<div class="d-one-third m-whole element" data-reveal="parent">
				<?php 
				$info = $page->credits()->toStructure();
				foreach ($info as $item): ?>
					<div class="info d-flex spacing-b-2" data-reveal="child">
						<span class="mono uppercase s-xsmall label"><?= $item->title()->smartypants() ?></span>
						<div class="d-flex d-column wysiwyg s-small">
					  	<?= $item->info()->kt() ?>
					  </div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</section>

	<?php snippet('navi-module') ?>
</main>

<?php snippet('footer') ?>