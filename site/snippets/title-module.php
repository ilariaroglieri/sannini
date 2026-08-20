<?php
  $width  = $width ?? 'd-whole';
  $spanMap = [
    'd-whole'      => ['span' => 3, 'class' => 's-large'],
    'd-two-thirds' => ['span' => 2, 'class' => 's-regular'],
  ];
  $span_x    = $spanMap[$width]['span'] ?? 3;
  $title = $title ?? '';
  $isPageTitle = $isPageTitle ?? false;

  $heading = $isPageTitle === true ? 'h1' : 'h2';
?>

<section class="module title-module d-flex v-center" data-span-x="<?= $span_x ?>">
  <div class="d-flex flex-row">
    <div class="element reveal-parent <?= $width ?> d-flex center">
      <?php if ($title): ?>
        <<?= $heading; ?> class="reveal-child uppercase s-medium spacing-b-2"><?= $title ?></<?= $heading; ?>>
      <?php endif; ?>
    </div>
  </div>
</section>