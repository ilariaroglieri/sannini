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
	$products = $page->children()->listed();
	$total = $products->count();
	$limit = 12;
	$offset = 12;

	if ($products): ?>
		<section id="products-list" class="module">
			<div id="products-list-inner" class="d-flex wrap" data-limit="<?= $limit ?>" data-offset="<?= $offset ?>" data-total="<?= $total; ?>">
				<?php foreach($products->slice(0, $limit) as $item): 
					snippet('product-card', [
						'item' => $item
					]);
				endforeach ?>
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
	window.productsEndpoint = '<?= page('prodotti')->url() ?>/more';
</script>

<script src="<?= url('assets/js/load-more.js') ?>"></script>