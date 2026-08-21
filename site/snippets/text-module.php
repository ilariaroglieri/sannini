<?php
  $width  = $width ?? 'd-whole';
  $spanMap = [
    'd-whole'      => ['class' => 's-large'],
    'd-two-thirds' => ['class' => 's-regular'],
  ];

  $textClass = $spanMap[$width]['class'] ?? '';
  $alignment = $alignment ?? '';
  $title = $title ?? '';
?>

<section class="module text-module">
  <div class="d-flex flex-row m-column <?= $alignment ?>">
    <div class="element reveal-parent <?= $width ?> m-whole">
      <?php if ($title): ?>
        <h3 class="reveal-child mono uppercase s-xsmall spacing-b-2"><?= $title ?></h3>
      <?php endif; ?>
      <div class="reveal-child text <?= $textClass ?>">
        <?= $text; ?>
      </div>
    </div>
  </div>
</section>