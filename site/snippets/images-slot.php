<?php
  $count = count($images);
  $w = $count === 1 ? '' : 'd-half';
?>

<div class="element reveal-parent d-one-third m-whole <?php if ($count > 1): ?>d-flex flex-row m-column<?php endif; ?>">
  <?php foreach ($images as $img): ?>
    <?= snippet('image-w-caption', [
      'img' => $img,
      'classes' => $w . ' reveal-child'
    ]) ?>
  <?php endforeach ?>
</div>
