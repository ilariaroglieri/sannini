<?php
  $count = count($images);
  $w = $count === 1 ? '' : 'd-half';
?>

<div class="element d-one-third m-whole <?php if ($count > 1): ?>d-flex flex-row m-column <?php elseif ($count == 0): ?>m-hidden<?php endif; ?>" data-reveal="parent">
  <?php foreach ($images as $img): ?>
    <div class="inner-img-element">
      <?= snippet('image-w-caption', [
        'img' => $img,
        'classes' => 'm-whole reveal-child'
      ]) ?>
    </div>
  <?php endforeach ?>
</div>
