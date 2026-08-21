<?php
  $title = $title ?? '';
  $isPageTitle = $isPageTitle ?? false;
  $heading = $isPageTitle === true ? 'h1' : 'h2';
?>

<section class="module title-module d-flex v-center">
  <div class="d-flex flex-row">
    <div class="element reveal-parent d-whole d-flex center">
      <?php if ($title): ?>
        <<?= $heading; ?> class="reveal-child uppercase s-medium spacing-b-2"><?= $title ?></<?= $heading; ?>>
      <?php endif; ?>
    </div>
  </div>
</section>