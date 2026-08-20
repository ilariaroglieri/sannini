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

	if ($products): ?>
		<section class="module" id="products-list">
			<div class="d-flex wrap">
				<?php foreach($page->children() as $item): 
					$productImg = $item->cover_img()->toFile();
					$productDesigner = $item->design(); 
				?>
				  <div class="product element reveal-parent d-one-third m-whole">
				  	<div class="product-inner d-flex d-column  p-relative">
					  	<a class="p-absolute overall" href="<?= $item->url() ?>"></a>

					  	<div class="product-title s-small uppercase mono reveal-child t-center"><?= $item->title(); ?></div>

					  	<div class="product-img reveal-child grow" style="background-image: url('<?= $productImg->url() ?>');">
					  	</div>

					  	<?php if ($productDesigner): ?>
					  		<div class="product-designer reveal-child p-absolute">
					  			<p class="s-small mono t-center"><?= $productDesigner; ?></p>
					  		</div>
					  	<?php endif; ?>
					  </div>
				  </div>
				<?php endforeach ?>
			</div>
		</section>
	<?php endif; ?>
</main>

<?php snippet('footer') ?>