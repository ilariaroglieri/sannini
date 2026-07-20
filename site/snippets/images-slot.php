<?php
  $count = count($images);
?>

<div class="element d-one-third <?= $count === 1 ? '' : 'd-flex flex-row' ?>" data-span-x="1">
  <?php foreach ($images as $img): ?>
    <?php if ($count === 1): ?>
      <?= snippet('image-w-caption', ['img' => $img]) ?>
    <?php else: ?>
      <div class="d-half">
        <?= snippet('image-w-caption', ['img' => $img]) ?>
      </div>
    <?php endif ?>
  <?php endforeach ?>
</div>