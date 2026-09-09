<?php
  $showCaption = $showCaption ?? true;
  $mobileImg = $mobileImg ?? null;
  $orientationM = '';
  $classes = $classes ?? '';
?>

<?php if ($img !== null):
	$orientation = $img->dimensions()->orientation();
  $focus = $img->focus();
  $mobileCrop = $img->mobileCropVertical()->toBool() ?? false;

  if ($mobileImg !== null):
    $orientationM = 'm-' . $mobileImg->dimensions()->orientation();
  else:
    if ($mobileCrop === true):
      $orientationM = 'm-portrait';
    else: 
      $orientationM = 'm-' . $img->dimensions()->orientation();
    endif;
  endif;
?>


  <figure class="<?= $classes .' '. $orientation .' '. $orientationM ?>">
    <picture>
      <?php if ($mobileImg): ?>
        <source media="(max-width: 640px)" srcset="<?= $mobileImg->url() ?>">
      <?php endif ?>
      <img src="<?= $img->url() ?>" style="object-position: <?= $img->focus()->isNotEmpty() ? $img->focus() : 'center'?>" alt="<?= $img->alt() ?>">
      <?php if (($showCaption == true) && ($img->caption()->isNotEmpty())): ?>
        <figcaption class="s-xsmall"><?= html($img->caption()) ?></figcaption>
      <?php endif ?>
    </picture>
  </figure>

<?php endif; ?>