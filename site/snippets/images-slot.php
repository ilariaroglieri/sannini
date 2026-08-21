<?php
  $count = count($images);
?>

  <?php foreach ($images as $img): ?>
    <?php if ($count === 1): ?>
      <div class="element reveal-parent d-one-third m-whole">
        <?= snippet('image-w-caption', ['img' => $img]) ?>
      </div>
    <?php else: ?>
      <div class="element reveal-parent d-2-twelfth m-whole d-flex flex-row m-column">
        <?= snippet('image-w-caption', ['img' => $img]) ?>
      </div>
    <?php endif ?>
  <?php endforeach ?>
