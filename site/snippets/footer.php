  </div>

	<footer class="container">
		<div class="d-flex space-between">
			<div class="d-one-third element reveal">
				<div class="info reveal spacing-b-8 d-flex">
					<span class="mono uppercase s-xsmall label">Sannini Impruneta</span>
					<p class="s-xsmall"><?= page('contatti')->address()->kt()->inline() ?></p>
				</div>

				<div class="info reveal d-flex">
					<span class="mono uppercase s-xsmall label"><?= t('phone'); ?></span>
					<p class="s-xsmall"><?= page('contatti')->phone()->kt()->inline() ?></p>
				</div>

				<div class="info reveal d-flex">
					<span class="mono uppercase s-xsmall label"><?= t('email'); ?></span>
					<p class="s-xsmall"><?= page('contatti')->email()->kt()->inline() ?></p>
				</div>

				<div class="info reveal spacing-b-8 d-flex">
					<span class="mono uppercase s-xsmall label">IG</span>
					<a class="s-xsmall" href="<?= page('contatti')->email()->toUrl() ?>">Sannini_Impruneta</a>
				</div>

				<div class="policies reveal d-flex d-column">
					<a class="mono uppercase s-xsmall" href="<?= page('privacy-policy')->url() ?>"><?= page('privacy-policy')->title() ?></a>
					<a class="mono uppercase s-xsmall" href="<?= page('cookie-policy')->url() ?>"><?= page('cookie-policy')->title() ?></a>
				</div>
			</div>
		</div>
	</footer>

  <?= js('assets/js/custom.js') ?>
</body>