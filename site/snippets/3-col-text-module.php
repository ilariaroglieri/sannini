<section class="module text-module" data-span-x="3">
  <div class="d-flex flex-row m-column">
    <div class="element d-one-third m-whole">
      <?php if ($title_1): ?>
        <h3 class="mono uppercase s-xsmall spacing-b-2"><?= $title_1 ?></h3>
      <?php endif; ?>
      <div class="text s-regular">
        <?= $text_1; ?>
      </div>
    </div>

    <div class="element d-one-third m-whole">
      <?php if ($title_2): ?>
        <h3 class="mono uppercase s-xsmall spacing-b-2"><?= $title_2 ?></h3>
      <?php endif; ?>
      <div class="text s-regular">
        <?= $text_2; ?>
      </div>
    </div>

    <div class="element d-one-third m-whole">
      <?php if ($title_3): ?>
        <h3 class="mono uppercase s-xsmall spacing-b-2"><?= $title_3 ?></h3>
      <?php endif; ?>
      <div class="text s-regular">
        <?= $text_3; ?>
      </div>
    </div>
  </div>
</section>