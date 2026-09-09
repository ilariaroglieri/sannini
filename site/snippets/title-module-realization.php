<?php
  $url = $url ?? '';
  $title = $title ?? '';
  $caption = $caption ?? '';
  $isPageTitle = $isPageTitle ?? false;
  $heading = $isPageTitle === true ? 'h1' : 'h2';
  $isArchive = $isArchive ?? false;
?>

<section class="module title-module-realization">
  <div class="d-flex m-column-reverse p-relative">
    <?php if ($isArchive): ?>
      <?php if ($url): ?><a class="overall p-absolute" href="<?= $url ?>" aria-label="<?= $title ?>"></a><?php endif; ?>
      <div class="element caption-element d-one-third m-whole d-flex center v-center" data-reveal="parent">
        <h3 class="uppercase mono s-small t-center"><?= $caption ?></h3>
      </div>
    <?php else: ?>
      <div class="element d-one-third m-hidden"></div>
    <?php endif; ?>
    <div class="element title-element d-one-third m-whole d-flex center v-center" data-reveal="parent">
      <?php if ($title): ?>
        <<?= $heading; ?> class="uppercase s-medium spacing-b-2 spacing-m-b-0" data-reveal="child"><?= $title ?></<?= $heading; ?>>
      <?php endif; ?>
    </div>
    <div class="element img-element d-one-third m-whole" data-reveal="parent">
      <?php snippet('image-w-caption', [
        'img' => $img
      ]); ?>
    </div>
  </div>
</section>