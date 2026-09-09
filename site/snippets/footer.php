  </div>

	<footer class="container module">
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

				<div class="info d-flex" data-reveal="child">
					<span class="mono uppercase s-xsmall label"><?= t('email'); ?></span>
					<p class="s-small"><?= page('contatti')->email()->kt()->inline() ?></p>
				</div>

				<div class="info spacing-b-8 d-flex" data-reveal="child">
					<span class="mono uppercase s-xsmall label">IG</span>
					<a class="s-small" href="<?= page('contatti')->email()->toUrl() ?>">Sannini_Impruneta</a>
				</div>

				<div class="policies d-flex d-column" data-reveal="child">
					<a class="mono uppercase s-xsmall" href="<?= page('privacy-policy')->url() ?>"><?= page('privacy-policy')->title() ?></a>
					<a class="mono uppercase s-xsmall" href="<?= page('cookie-policy')->url() ?>"><?= page('cookie-policy')->title() ?></a>
				</div>
			</div>

			<div class="d-one-third"></div>

			<div class="d-one-third m-whole element d-flex flex-row d-column space-between" data-reveal="parent">
				<div class="d-whole">
					<a class="mono uppercase s-xsmall" href="https://www.cottomanetti.com/manetti-gusmano-figli/" target="_blank">MANETTIGUSMANOEFIGLI.COM  &#8594;</a>
				</div>
				<div class="d-whole d-flex d-column bottom end spacing-m-t-10">
					<?php snippet('logo-manetti'); ?>

					<p id="copyright" class="s-small spacing-t-1">© All rights reserved <?= date("Y"); ?></p>
				</div>
			</div>
		</div>
	</footer>

  <?= js('assets/js/custom.js') ?>
</body>