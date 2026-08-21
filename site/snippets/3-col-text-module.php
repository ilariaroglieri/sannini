<section class="module text-module">
  <div class="d-flex m-column">
    <div class="element reveal-parent d-one-third m-whole">
      <?php if ($title_1): ?>
        <h3 class="reveal-child mono uppercase s-xsmall spacing-b-2"><?= $title_1 ?></h3>
      <?php endif; ?>
      <div class="reveal-child text s-regular <?php if (!($title_1)): ?>no-title-padding<?php endif; ?>">
        <?= $text_1; ?>
      </div>
    </div>

    <div class="element reveal-parent d-one-third m-whole">
      <?php if ($title_2): ?>
        <h3 class="reveal-child mono uppercase s-xsmall spacing-b-2"><?= $title_2 ?></h3>
      <?php endif; ?>
      <div class="reveal-child text s-regular <?php if (!($title_2)): ?>no-title-padding<?php endif; ?>">
        <?= $text_2; ?>
      </div>
    </div>

    <div class="element reveal-parent d-one-third m-whole">
      <?php if ($title_3): ?>
        <h3 class="reveal-child mono uppercase s-xsmall spacing-b-2"><?= $title_3 ?></h3>
      <?php endif; ?>
      <div class="reveal-child text s-regular <?php if (!($title_3)): ?>no-title-padding<?php endif; ?>">
        <?= $text_3; ?>
      </div>
    </div>
  </div>
</section>