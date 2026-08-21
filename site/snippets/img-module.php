<?php
  $imgLayout = $imgLayout ?? 'full';
  $alignment = $alignment ?? '';
?>

<section class="module img-module">
  <div class="d-flex m-column <?= $alignment ?>">
    <?php if ($imgLayout == 'full'): ?>
      <div class="element reveal-parent d-whole m-whole">
        <?= snippet('image-w-caption', [
          'img' => $fullImg
        ]); ?>
      </div>
    <?php elseif ($imgLayout == 'm-s'): ?>
      <div class="element reveal-parent d-two-thirds m-whole">
        <?= snippet('image-w-caption', [
          'img' => $mediumImg
        ]); ?>
      </div>
      
      <?= snippet('images-slot', ['images' => $smallImg]) ?>
    <?php else: ?>
      <?= snippet('images-slot', ['images' => $smallImg1]) ?>
      <?= snippet('images-slot', ['images' => $smallImg2]) ?>
      <?= snippet('images-slot', ['images' => $smallImg2]) ?>
    <?php endif; ?>
  </div>
</section>