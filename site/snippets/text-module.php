<?php
  $width  = $width ?? 'd-whole';
  $spanMap = [
    'd-whole'      => ['class' => 's-large'],
    'd-two-thirds' => ['class' => 's-regular'],
  ];

  $textClass = $spanMap[$width]['class'] ?? '';
  $alignment = $alignment ?? '';
  $title = $title ?? '';

  if (empty((string)$text)) return;
?>

<section class="module text-module">
  <div class="d-flex flex-row m-column <?= $alignment ?>">
    <div class="element <?= $width ?> m-whole" data-reveal="parent">
      <?php if ($title): ?>
        <h3 class="mono uppercase s-xsmall spacing-b-2" data-reveal="child"><?= $title ?></h3>
      <?php endif; ?>
      <div class="text <?= $textClass ?>" data-reveal="child">
        <?= $text; ?>
      </div>
    </div>
  </div>
</section>