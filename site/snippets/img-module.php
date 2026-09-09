<?php
  $imgLayout = $imgLayout ?? 'full';
  $alignment = $alignment ?? '';
?>

<section class="module img-module">
  <div class="d-flex m-column <?= $alignment ?>">
    <?php if ($imgLayout == 'full'): ?>
      <div class="element d-whole m-whole <?= !$fullImg ? 'm-hidden' : '' ?>" data-reveal="parent">
        <div class="element-image">
          <?php snippet('image-w-caption', [
            'img' => $fullImg
          ]); ?>
        </div>
      </div>
    <?php elseif ($imgLayout == 'm-s'): ?>
      <div class="element d-two-thirds m-whole <?= !$mediumImg ? 'm-hidden' : '' ?>" data-reveal="parent">
        <div class="element-image">
          <?php snippet('image-w-caption', [
            'img' => $mediumImg
          ]); ?>
        </div>
      </div>
      
      <?php snippet('images-slot', ['images' => $smallImg]) ?>
    <?php else: ?>
      <?php snippet('images-slot', ['images' => $smallImg1]) ?>
      <?php snippet('images-slot', ['images' => $smallImg2]) ?>
      <?php snippet('images-slot', ['images' => $smallImg3]) ?>
    <?php endif; ?>
  </div>
</section>