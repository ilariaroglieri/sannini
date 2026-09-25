<?php snippet('header') ?>

<main id="realizations-page">
  <?php
	$realizations = $page->children()->listed();
	$total = $realizations->count();
	$limit = 12;
	$offset = 12;

	if ($realizations): ?>
		<section id="realizations-list">
			<div id="realizations-list-inner" class="d-flex wrap" data-limit="<?= $limit ?>" data-offset="<?= $offset ?>" data-total="<?= $total; ?>">

		  	<?php foreach ($realizations->slice(0, $limit) as $realization): 
		  		$slug = $realization->slug();
		  	?>
			  	<div id="<?= $slug ?>" class="realization">
				  	<?php snippet('title-module-realization', [
							'url' => $realization->url(),
							'title' => $realization->title()->fancypants(),
							'caption' => $realization->realization_caption()->fancypants(),
							'img' => $realization->cover_img()->toFile(),
							'isArchive' => true,
						]) ?>
					</div>
			  <?php endforeach; ?>
			</div>
		</section>

		<?php if ($total > $limit): ?>
			<div id="load-more-container" class="module d-flex v-center">
			  <button id="load-more" class="element s-small mono uppercase" data-reveal="parent">
			    More
			  </button>
			</div>
		<?php endif ?>
	<?php endif; ?>
</main>

<?php snippet('footer') ?>

<!-- load more -->
<script>
	window.realizationsEndpoint = '<?= page('realizzazioni')->url() ?>/more';
</script>

<script src="<?= url('assets/js/load-more.js') ?>"></script>