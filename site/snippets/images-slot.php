<?php
  $count = count($images);
?>

  <?php foreach ($images as $img): ?>
    <?php if ($count === 1): ?>
      <div class="element d-one-third" data-span-x="1">
        <?= snippet('image-w-caption', ['img' => $img]) ?>
      </div>
    <?php else: ?>
      <div class="element d-2-twelfth d-flex flex-row" data-span-x=".5">
        <?= snippet('image-w-caption', ['img' => $img]) ?>
      </div>
    <?php endif ?>
  <?php endforeach ?>
