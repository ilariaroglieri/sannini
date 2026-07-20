<?php
  $span_x    = $spanMap[$width]['span'] ?? 3;
  $imgLayout = $imgLayout ?? 'full';
?>

<section class="module img-module">
  <div class="d-flex flex-row m-column <?= $alignment ?>">
    <?php if ($imgLayout == 'full'): ?>
      <div class="element d-whole"  data-span-x="3">
        1 immagine
        <!-- <?= snippet('image-w-caption'); ?> -->
      </div>
    <?php elseif ($imgLayout == 'm-s'): ?>
      2 immagini
    <?php else: ?>
      2 immagini
    <?php endif; ?>
  </div>
</section>