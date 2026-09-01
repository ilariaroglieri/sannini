<?php snippet('header') ?>

<main id="cladding-systems-page">

	<?php snippet('title-module', [
		'title' => $page->page_title()->fancypants(),
		'isPageTitle' => true
	]) ?>

  <?php snippet('text-module', [
		'text' => $page->intro_text()->fancypants(),
		'width' => 'd-whole',
	]) ?>

	<?php snippet('img-module', [
		'fullImg' => $page->cover_img()->toFile(),
		'imgLayout' => 'full',
	]) ?>


  <?php
  	$claddingSystems = $page->children()->listed();

  	foreach ($claddingSystems as $claddingSystem): 
  		$slug = $claddingSystem->slug();
  ?>
  	<item id="<?= $slug ?>">
	  	<?php snippet('title-module', [
				'title' => $claddingSystem->title()->fancypants(),
			]) ?>

			<?php snippet('text-module', [
				'text' => $claddingSystem->intro_text()->fancypants(),
				'width' => 'd-whole',
			]) ?>

			<?= $claddingSystem->blocks()->toBlocks() ?>
		</item>

  <?php endforeach; ?>
</main>

<?php snippet('footer') ?>