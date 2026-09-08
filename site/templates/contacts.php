<?php snippet('header') ?>

<main id="contacts">
	<section class="module empty-module">
		<div class="d-flex">
			<div class="d-whole"></div>
		</div>
	</section>

	<section class="module contact-module">
		<div class="d-flex space-between m-column">
			<div class="d-one-third m-whole element" data-reveal="parent">
				<div class="info spacing-b-8 d-flex" data-reveal="child">
					<span class="mono uppercase s-xsmall label">Sannini Impruneta</span>
					<p class="s-small"><?= page('contatti')->address()->kt()->inline() ?></p>
				</div>

				<div class="info d-flex" data-reveal="child">
					<span class="mono uppercase s-xsmall label"><?= t('phone'); ?></span>
					<p class="s-small"><?= page('contatti')->phone()->kt()->inline() ?></p>
				</div>

				<p id="copyright" class="s-small spacing-t-6">© All rights reserved <?= date("Y"); ?></p>
			</div>

			<div class="d-one-third m-whole element" data-reveal="parent">
				<div class="info d-flex spacing-b-half" data-reveal="child">
					<span class="mono uppercase s-xsmall label"><?= t('email'); ?></span>
					<p class="s-small"><?= page('contatti')->email()->kt()->inline() ?></p>
				</div>

				<div class="info spacing-b-8 d-flex" data-reveal="child">
					<span class="mono uppercase s-xsmall label">IG</span>
					<a class="s-small" href="<?= page('contatti')->email()->toUrl() ?>">Sannini_Impruneta</a>
				</div>

				<div class="policies d-flex d-column" data-reveal="child">
					<a class="mono uppercase s-xsmall spacing-b-half" href="<?= page('privacy-policy')->url() ?>"><?= page('privacy-policy')->title() ?></a>
					<a class="mono uppercase s-xsmall" href="<?= page('cookie-policy')->url() ?>"><?= page('cookie-policy')->title() ?></a>
				</div>
			</div>

			<div class="d-one-third m-whole element" data-reveal="parent">
				<?php 
				$contacts = $page->departments()->toStructure();
				foreach ($contacts as $item): ?>
					<div class="info d-flex spacing-b-half" data-reveal="child">
						<span class="mono uppercase s-xsmall label"><?= $item->title()->smartypants() ?></span>
					  <a class="s-small" href="mailto:<?= $item->email()->value() ?>"><?= $item->email()->value() ?></a>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
</main>

<?php snippet('footer') ?>