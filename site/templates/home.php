<?php snippet('header') ?>

<main id="default-page">
	<div class="container d-grid">
		<?= $page->blocks()->toBlocks() ?>
	</div>
</main>

<?php snippet('footer') ?>