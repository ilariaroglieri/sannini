<?php
	$productImg = $item->cover_img()->toFile();
	$productDesigner = $item->design(); 
	$productImg = $item->cover_img()->toFile();
	$imgUrl = $productImg ? $productImg->url() : '';
?>
<div class="product element d-one-third m-whole" data-reveal="parent">
	<div class="product-inner d-flex d-column  p-relative">
  	<a class="p-absolute overall" href="<?= $item->url() ?>"></a>

  	<div class="product-title s-small uppercase mono t-center" data-reveal="child"><?= $item->title(); ?></div>

  	<div class="product-img grow" data-reveal="child" style="background-image: url('<?= $imgUrl ?>');"></div>

  	<?php if ($productDesigner->isNotEmpty()): ?>
  		<div class="product-designer p-absolute" data-reveal="child">
  			<p class="s-small mono t-center"><?= $productDesigner; ?></p>
  		</div>
  	<?php endif; ?>
  </div>
</div>