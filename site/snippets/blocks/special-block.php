<?php
 $images = $block->media()->toFiles()
?>

<section class="module special-img-module">
  <div class="d-flex wrap m-column">
    <?php foreach ($images->slice(0, 3) as $img): ?>
      <div class="element reveal d-one-third" data-span-x="1">
        <?= snippet('image-w-caption', ['img' => $img, 'showCaption' => false]) ?>
      </div>
    <?php endforeach ?>

    <div class="caption-row d-whole d-flex flex-row v-center">
      <?php foreach ($images as $img): ?>
      <div class="caption element reveal d-1-twelfth">
        <?php if ($img->caption()->isNotEmpty()): ?>
          <figcaption class="s-xsmall"><?= html($img->caption()) ?></figcaption>
        <?php endif ?>
      </div>
      <?php endforeach ?>
    </div>

    <?php foreach ($images->slice(3, 6) as $img): ?>
      <div class="element reveal d-one-third spacing-b-2" data-span-x="1">
        <?= snippet('image-w-caption', ['img' => $img, 'showCaption' => false]) ?>
      </div>
    <?php endforeach ?>
  </div>
</section>