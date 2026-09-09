<?php snippet('header') ?>

<main id="single-product-page">

	<?php snippet('title-module', [
		'title' => $page->title()->fancypants(),
		'isPageTitle' => true
	]) ?>

	<section class="module tech-info-module">
	  <div class="d-flex t-column">
      <div class="element d-two-thirds t-whole spacing-t-b-10 spacing-m-b-0" data-reveal="parent">
        <?= snippet('image-w-caption', [
          'img' => $page->tech_drawing()->toFile(),
          'mobileImg' => $page->tech_drawing_mobile()->toFile(),
          'classes' => 'spacing-m-b-2'
        ]); ?>

	      <div class="inner-element">
		    	<div class="text s-large spacing-t-6 spacing-m-t-0 spacing-m-p-t-2" data-reveal="child">
	        	<?= $page->intro_text()->fancypants(); ?>
	      	</div>
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

			<div class="element tech-element d-one-third t-whole" data-reveal="parent">
				<div class="inner-element">
					<?php foreach ($techFields as $field): ?>
					  <?php if ($field['value']->isNotEmpty()): ?>
					    <div class="tech-info d-flex flex-row-smaller" data-reveal="child">
					      <span class="tech-info__label mono uppercase s-xsmall d-3-twelfth"><?= $field['label'] ?>: </span>
					      <p class="tech-info__value mono s-small"><?= $field['value'] ?></p>
					    </div>
					  <?php endif ?>
					<?php endforeach ?>


					<?php // color variables
						$variables = $page->variables()->toStructure();
						if ($variables->isNotEmpty()):
					?>
						<div class="tech-info" data-reveal="child">
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
				    <div class="tech-info d-flex flex-row-smaller" data-reveal="child">
				      <span class="tech-info__label mono uppercase s-xsmall d-3-twelfth"><?= t('pdf') ?>: </span>
				      <a href="<?= $pdf->url(); ?>" class="tech-info__value mono s-small">Download</a>
				    </div>
				  <?php endif ?>
				</div>
			</div>    	
	  </div>
	</section>

	<?= $page->blocks()->toBlocks() ?>

	<?php snippet('navi-module') ?>
</main>

<?php snippet('footer') ?>