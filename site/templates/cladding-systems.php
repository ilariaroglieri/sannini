<?php snippet('header') ?>

<main id="cladding-systems-page">

	<?php snippet('title-module', [
		'title' => $page->page_title()->fancypants(),
		'isPageTitle' => true
	]) ?>

  <?php snippet('text-module', [
		'text' => $page->intro_text()->fancypants(),
		'width' => 'd-whole',
	]) ?>

	<?php snippet('img-module', [
		'fullImg' => $page->cover_img()->toFile(),
		'imgLayout' => 'full',
	]) ?>


  <?php
  	$claddingSystems = $page->children()->listed();

  	foreach ($claddingSystems as $claddingSystem): 
  		$slug = $claddingSystem->slug();
  ?>
  	<item id="<?= $slug ?>" class="cladding-system">
	  	<?php snippet('title-module', [
				'title' => $claddingSystem->title()->fancypants(),
			]) ?>

			<?php snippet('text-module', [
				'text' => $claddingSystem->intro_text()->fancypants(),
				'width' => 'd-whole',
			]) ?>

			<section class="module tech-info-module">
				<div class="d-flex m-column-reverse">
					<div class="element d-one-third m-whole" data-reveal="parent">
		      	<div class="inner-element">
							<?php 
							$pdf = $claddingSystem->pdf_1()->toFile();
							$pdf2 = $claddingSystem->pdf_2()->toFile();
					    if ($pdf !== null): ?>
						    <div class="tech-info download" data-reveal="child">
						      <a href="<?= $pdf->url(); ?>" class="tech-info__label mono uppercase s-reg-small"><?= t('pdf2') ?></a>
						    </div>
						  <?php endif; ?>

						  <?php if ($pdf2 !== null): ?>
						    <div class="tech-info download" data-reveal="child">
						      <a href="<?= $pdf2->url(); ?>" class="tech-info__label mono uppercase s-reg-small"><?= t('pdf') ?></a>
						    </div>
						  <?php endif; ?>
						</div>
					</div>
		      <div class="element d-two-thirds m-whole" data-reveal="parent">
		      	<div class="inner-element">
				    	<div class="text s-large" data-reveal="child">
			        	<?= $claddingSystem->intro_text_2()->fancypants(); ?>
			      	</div>
			      </div>
		      </div>
		    </div>
		  </section>

			<?= $claddingSystem->blocks()->toBlocks() ?>
		</item>

  <?php endforeach; ?>
</main>

<?php snippet('footer') ?>