<?php
 $images = $block->media()->toFiles()
?>

<section class="module special-img-module">
  <div class="d-flex wrap m-column">
    <?php foreach ($images as $img): ?>
      <div class="element reveal d-one-third" data-span-x="1">
        <?= snippet('image-w-caption', [
          'img' => $img,
          'showCaption' => false
        ]) ?>
      </div>
    <?php endforeach ?>
  </div>
</section>