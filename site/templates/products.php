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
					$productImg = $item->cover_img()->toFile();
					$productDesigner = $item->design(); 
				?>
				  <div class="product element reveal-parent d-one-third m-whole">
				  	<div class="product-inner d-flex d-column  p-relative">
					  	<a class="p-absolute overall" href="<?= $item->url() ?>"></a>

					  	<div class="product-title s-small uppercase mono reveal-child t-center"><?= $item->title(); ?></div>

					  	<div class="product-img reveal-child grow" style="background-image: url('<?= $productImg->url() ?>');">
					  	</div>

					  	<?php if ($productDesigner->isNotEmpty()): ?>
					  		<div class="product-designer reveal-child p-absolute">
					  			<p class="s-small mono t-center"><?= $productDesigner; ?></p>
					  		</div>
					  	<?php endif; ?>
					  </div>
				  </div>
				<?php endforeach ?>
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