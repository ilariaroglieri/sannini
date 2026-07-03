<?php
	$orientation = $img->dimensions()->orientation();
  $focus = $img->focus();
  $ratio = $ratio ?? 'r-rectangle';
  $showCaption = $showCaption ?? true;
?>
<figure class="<?= $ratio; ?>">
  <img class="<?= $orientation ?>" src="<?= $img->url() ?>" style="object-position: <?= $img->focus()->isNotEmpty() ? $img->focus() : 'center'?>" alt="<?= $img->alt() ?>">
</figure>
<?php if ($showCaption !== false && $img->alt()->isNotEmpty()): ?>
  <figcaption class="spacing-t-2 s-sm-1 t-center"><?= html($img->alt()) ?></figcaption>
<?php endif ?>