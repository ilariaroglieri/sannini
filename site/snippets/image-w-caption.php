<?php
	$orientation = $img->dimensions()->orientation();
  $focus = $img->focus();
?>
<figure class="<?= $orientation ?>">
  <img src="<?= $img->url() ?>" style="object-position: <?= $img->focus()->isNotEmpty() ? $img->focus() : 'center'?>" alt="<?= $img->alt() ?>">
  <?php if ($img->caption()->isNotEmpty()): ?>
    <figcaption class="s-xsmall"><?= html($img->caption()) ?></figcaption>
  <?php endif ?>
</figure>