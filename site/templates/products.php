<?php snippet('header') ?>

<main id="products-page">
	<?php snippet('text-module', [
		'text' => $page->intro_text()->fancypants(),
	]) ?>

	<?php snippet('title-module', [
		'title' => $page->page_title()->fancypants(),
		'isPageTitle' => true
	]) ?>

	<?php 
	$products = $page->children();
	$total = $products->count();

	if ($products): ?>
		<section id="products-list" class="module" data-offset="3" data-total="<?= $total; ?>">
			<div class="d-flex wrap">
				<?php foreach($products->slice(0, 3) as $item): 
					snippet('product-card', [
						'item' => $item
					]);
				endforeach ?>
			</div>
		</section>
		
		<?php if ($total > 3): ?>
			<div id="load-more-container" class="module d-flex v-center">
			  <button id="load-more" class="element s-small mono uppercase">
			    More
			  </button>
			</div>
		<?php endif ?>
	<?php endif; ?>

	
</main>

<?php snippet('footer') ?>