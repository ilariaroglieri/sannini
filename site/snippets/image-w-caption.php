<?php
	$orientation = $img->dimensions()->orientation();
  $focus = $img->focus();
?>
<figure class="<?= $orientation ?>">
  <img src="<?= $img->url() ?>" style="object-position: <?= $img->focus()->isNotEmpty() ? $img->focus() : 'center'?>" alt="<?= $img->alt() ?>">
  <?php if ($img->alt()->isNotEmpty()): ?>
    <figcaption class="spacing-t-2 s-sm-1 t-center"><?= html($img->alt()) ?></figcaption>
  <?php endif ?>
</figure>