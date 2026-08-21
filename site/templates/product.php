<?php snippet('header') ?>

<main id="single-product-page">

	<?php snippet('title-module', [
		'title' => $page->title()->fancypants(),
		'isPageTitle' => true
	]) ?>

	<section class="module tech-info-module">
	  <div class="d-flex m-column">
      <div class="element reveal-parent d-two-thirds m-whole">
        <?= snippet('image-w-caption', [
          'img' => $page->tech_drawing()->toFile(),
          'mobileImg' => $page->tech_drawing_mobile()->toFile(),
        ]); ?>

	    	<div class="reveal-child text s-large spacing-t-6">
        	<?= $page->intro_text()->fancypants(); ?>
      	</div>
      </div>

    	<div class="element reveal-parent d-one-third m-whole">
    	</div>
	  </div>
	</section>

	<?= $page->blocks()->toBlocks() ?>
</main>

<?php snippet('footer') ?>