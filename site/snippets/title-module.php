<?php
  $title = $title ?? '';
  $isPageTitle = $isPageTitle ?? false;
  $heading = $isPageTitle === true ? 'h1' : 'h2';
  $titleStyle = $titleStyle ?? 's-medium';
?>

<section class="module title-module d-flex v-center">
  <div class="d-flex flex-row">
    <div class="element d-whole d-flex center" data-reveal="parent">
      <?php if ($title): ?>
        <<?= $heading; ?> class="uppercase <?= $titleStyle ?> spacing-b-2" data-reveal="child"><?= $title ?></<?= $heading; ?>>
      <?php endif; ?>
    </div>
  </div>
</section>