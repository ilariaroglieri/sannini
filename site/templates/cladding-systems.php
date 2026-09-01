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
				<div class="d-flex m-column">
					<div class="element reveal-parent d-one-third m-whole">
						<?php 
						$pdf = $claddingSystem->pdf_1()->toFile();
						$pdf2 = $claddingSystem->pdf_2()->toFile();
				    if ($pdf !== null): ?>
					    <div class="tech-info download reveal-child">
					      <a href="<?= $pdf->url(); ?>" class="tech-info__label mono uppercase s-xsmall"><?= t('pdf2') ?></a>
					    </div>
					  <?php endif; ?>

					  <?php if ($pdf2 !== null): ?>
					    <div class="tech-info download reveal-child">
					      <a href="<?= $pdf2->url(); ?>" class="tech-info__label mono uppercase s-xsmall"><?= t('pdf') ?></a>
					    </div>
					  <?php endif; ?>
					</div>
		      <div class="element reveal-parent d-two-thirds m-whole">
			    	<div class="reveal-child text s-large">
		        	<?= $claddingSystem->intro_text_2()->fancypants(); ?>
		      	</div>
		      </div>
		    </div>
		  </section>

			<?= $claddingSystem->blocks()->toBlocks() ?>
		</item>

  <?php endforeach; ?>
</main>

<?php snippet('footer') ?>