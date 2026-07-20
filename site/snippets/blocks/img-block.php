<?php snippet('img-module', [
  'imgLayout' => $block->img_layout()->value(),
  'alignment' => $block->alignment()->value(),
  'fullImg'   => $block->full_w_img()->toFiles()->first(),
  'mediumImg' => $block->medium_img()->toFiles()->first(),
  'smallImg'  => $block->small_img()->toFiles(),
  'smallImg1'   => $block->image_s1()->toFiles(),
  'smallImg2'   => $block->image_s2()->toFiles(),
  'smallImg3'   => $block->image_s3()->toFiles(),
]) ?>