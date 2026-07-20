<?php
  $imgLayout = $imgLayout ?? 'full';
  $alignment = $alignment ?? '';
?>

<section class="module img-module" data-span-x="3">
  <div class="d-flex m-column <?= $alignment ?>">
    <?php if ($imgLayout == 'full'): ?>
      <div class="element d-whole">
        <?= snippet('image-w-caption', [
          'img' => $fullImg
        ]); ?>
      </div>
    <?php elseif ($imgLayout == 'm-s'): ?>
      <div class="element d-two-thirds"  data-span-x="2">
        <?= snippet('image-w-caption', [
          'img' => $mediumImg
        ]); ?>
      </div>
      <div class="element d-one-third"  data-span-x="1">
        <?php foreach ($smallImg as $img): ?>
          <?= snippet('image-w-caption', ['img' => $img]) ?>
        <?php endforeach ?>
      </div>
    <?php else: ?>
      <div class="element d-one-third"  data-span-x="1">
        <?php foreach ($smallImg1 as $img): ?>
          <?= snippet('image-w-caption', ['img' => $img]) ?>
        <?php endforeach ?>
      </div>
      <div class="element d-one-third"  data-span-x="1">
        <?php foreach ($smallImg2 as $img): ?>
          <?= snippet('image-w-caption', ['img' => $img]) ?>
        <?php endforeach ?>
      </div>
      <div class="element d-one-third"  data-span-x="1">
        <?php foreach ($smallImg3 as $img): ?>
          <?= snippet('image-w-caption', ['img' => $img]) ?>
        <?php endforeach ?>
      </div>
    <?php endif; ?>
  </div>
</section>