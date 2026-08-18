<?php
	$orientation = $img->dimensions()->orientation();
  $focus = $img->focus();
  $showCaption = $showCaption ?? true;
?>
<figure class="<?= $orientation ?>">
  <img src="<?= $img->url() ?>" style="object-position: <?= $img->focus()->isNotEmpty() ? $img->focus() : 'center'?>" alt="<?= $img->alt() ?>">
  <?php if (($showCaption == true) && ($img->caption()->isNotEmpty())): ?>
    <figcaption class="s-xsmall"><?= html($img->caption()) ?></figcaption>
  <?php endif ?>
</figure>