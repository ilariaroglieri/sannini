<?php
  $showCaption = $showCaption ?? true;
  $mobileImg = $mobileImg ?? null;
  $orientationM = '';
?>

<?php if ($img !== null):
	$orientation = $img->dimensions()->orientation();
  $focus = $img->focus();

  if ($mobileImg !== null):
    $orientationM = 'm-' . $mobileImg->dimensions()->orientation();
  endif;
?>

  <figure class="<?= $orientation ?> <?= $orientationM ?>">
    <picture>
      <?php if ($mobileImg): ?>
        <source media="(max-width: 768px)" srcset="<?= $mobileImg->url() ?>">
      <?php endif ?>
      <img src="<?= $img->url() ?>" style="object-position: <?= $img->focus()->isNotEmpty() ? $img->focus() : 'center'?>" alt="<?= $img->alt() ?>">
      <?php if (($showCaption == true) && ($img->caption()->isNotEmpty())): ?>
        <figcaption class="s-xsmall"><?= html($img->caption()) ?></figcaption>
      <?php endif ?>
    </picture>
  </figure>

<?php endif; ?>