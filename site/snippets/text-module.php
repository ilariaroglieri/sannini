<?php
  $width  = $width ?? 'd-whole';
  $spanMap = [
    'd-whole'      => ['span' => 3, 'class' => 's-large'],
    'd-two-thirds' => ['span' => 2, 'class' => 's-regular'],
  ];

  $span_x    = $spanMap[$width]['span'] ?? 3;
  $textClass = $spanMap[$width]['class'] ?? '';
?>

<section class="module text-module" data-span-x="<?= $span_x ?>">
  <div class="d-flex flex-row m-column <?= $alignment ?>">
    <div class="element reveal <?= $width ?>">
      <?php if ($title): ?>
        <h3 class="reveal mono uppercase s-xsmall spacing-b-2"><?= $title ?></h3>
      <?php endif; ?>
      <div class="reveal text <?= $textClass ?>">
        <?= $text; ?>
      </div>
    </div>
  </div>
</section>