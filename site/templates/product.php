<?php snippet('header') ?>

<main id="single-product-page">

	<?php snippet('title-module', [
		'title' => $page->title()->fancypants(),
		'isPageTitle' => true
	]) ?>

	<section class="module tech-info-module">
	  <div class="d-flex m-column">
      <div class="element reveal-parent d-two-thirds m-whole">
        <?= snippet('image-w-caption', [
          'img' => $page->tech_drawing()->toFile(),
          'mobileImg' => $page->tech_drawing_mobile()->toFile(),
        ]); ?>

	    	<div class="reveal-child text s-large spacing-t-6">
        	<?= $page->intro_text()->fancypants(); ?>
      	</div>
      </div>

      <?php
				$techFields = [
				  ['label' => t('measures'), 'value' => $page->measures()->fancypants()],
				  ['label' => t('weight'),   'value' => $page->weight()->fancypants()],
				];

				if ($page->finishing()->isNotEmpty()) {
				  $techFields[] = ['label' => t('finishing'), 'value' => $page->finishing()->fancypants()];
				} else {
				  $techFields[] = ['label' => t('finishing_front'), 'value' => $page->finishing_front()->fancypants()];
				  $techFields[] = ['label' => t('finishing_back'),  'value' => $page->finishing_back()->fancypants()];
				  $techFields[] = ['label' => t('coste'),           'value' => $page->coste()->fancypants()];
				}
			?>

			<div class="element reveal-parent d-one-third m-whole">
				<?php foreach ($techFields as $field): ?>
				  <?php if ($field['value']->isNotEmpty()): ?>
				    <div class="tech-info reveal-child d-flex flex-row-smaller">
				      <span class="tech-info__label mono uppercase s-xsmall d-3-twelfth"><?= $field['label'] ?>: </span>
				      <p class="tech-info__value mono s-xsmall"><?= $field['value'] ?></p>
				    </div>
				  <?php endif ?>
				<?php endforeach ?>


				<?php // color variables
					$variables = $page->variables()->toStructure();
					if ($variables->isNotEmpty()):
				?>
					<div class="tech-info reveal-child">
						<div class="d-flex flex-row-smaller">
				      <span class="tech-info__label mono uppercase s-xsmall d-3-twelfth"><?= t('color') ?>: </span>
				      <?php foreach ($variables as $i => $variable): ?>
				      	<div class="color-variant d-3-twelfth d-flex d-column">
							  	<button class="mono s-xsmall spacing-b-3 <?= $i === 0 ? 'active' : '' ?>" role='button' data-color="<?= $variable->title()->slug() ?>"><?= $variable->title()->fancypants() ?></button>

							  	<?= snippet('image-w-caption', [
					          'img' => $variable->image()->toFile(),
					          'classes' => 'square-thumb'
					        ]); ?>
							  </div>
							<?php endforeach ?>
						</div>
						<?php foreach ($variables as $i => $variable): ?>
							<div id="<?= $variable->title()->slug() ?>" class="color-info <?= $i === 0 ? 'active' : '' ?> d-flex flex-row-smaller spacing-t-3">
								<div class="d-3-twelfth m-hidden"></div>
								<div class="d-9-twelfth">
									<div class="text mono s-xsmall">
										<?= $variable->text()->fancypants() ?>
									</div>
								</div>
							</div>
						<?php endforeach ?>
			    </div>
			  <?php endif; ?>

		    <?php 
		    $pdf = $page->pdf()->toFile();
		    if ($pdf !== null): ?>
			    <div class="tech-info reveal-child d-flex flex-row-smaller">
			      <a href="<?= $pdf->url(); ?>" class="tech-info__label mono uppercase s-xsmall"><?= t('pdf') ?> &#8595;</a>
			    </div>
			  <?php endif ?>
			</div>
    	
	  </div>
	</section>

	<?= $page->blocks()->toBlocks() ?>

	<?php // navigation 
		$prevAll = $page->prevAll();
		$nextAll = $page->nextAll();
	?>

	<navi class="module navi-module">
		<div class="d-flex flex-row m-column space-between">
			<div class="element reveal-parent d-one-third m-whole">
				<?php foreach ($prevAll as $prevProduct): ?>
					<a class="navi-item mono uppercase s-xsmall spacing-b-2" href="<?= $prevProduct->url()?>"><?= $prevProduct->title()?></a>
				<?php endforeach ?>
			</div>
			<div class="element reveal-parent d-one-third m-whole">
				<?php foreach ($nextAll as $nextProduct): ?>
					<a class="navi-item mono uppercase s-xsmall spacing-b-2" href="<?= $nextProduct->url()?>"><?= $nextProduct->title()?></a>
				<?php endforeach ?>
			</div>
		</div>
	</navi>
</main>

<?php snippet('footer') ?>