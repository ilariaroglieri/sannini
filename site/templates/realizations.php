<?php snippet('header') ?>

<main id="realizations-page">
  <?php
  	$realizations = $page->children()->listed();

  	foreach ($realizations as $realization): 
  		$slug = $realization->slug();
  ?>
  	<item id="<?= $slug ?>" class="realization">
	  	<?php snippet('title-module-realization', [
				'url' => $realization->url(),
				'title' => $realization->title()->fancypants(),
				'caption' => $realization->realization_caption()->fancypants(),
				'img' => $realization->cover_img()->toFile(),
				'isArchive' => true,
			]) ?>
		</item>

  <?php endforeach; ?>
</main>

<?php snippet('footer') ?>