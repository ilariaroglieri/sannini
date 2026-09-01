<?php
  $count = count($images);
  $w = $count === 1 ? '' : 'd-half';
?>

<div class="element d-one-third m-whole <?php if ($count > 1): ?>d-flex flex-row m-column<?php endif; ?>" data-reveal="parent">
  <?php foreach ($images as $img): ?>
    <?= snippet('image-w-caption', [
      'img' => $img,
      'classes' => $w . ' reveal-child'
    ]) ?>
  <?php endforeach ?>
</div>
