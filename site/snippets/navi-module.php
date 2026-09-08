<?php // navigation 
	$prevAll = $page->prevAll();
	$nextAll = $page->nextAll();
?>

<navi class="module navi-module">
	<div class="d-flex flex-row m-column space-between">
		<div class="element d-one-third m-whole" data-reveal="parent">
			<?php foreach ($prevAll as $prevContent): ?>
				<a class="navi-item mono uppercase s-xsmall spacing-b-2" href="<?= $prevContent->url()?>"><?= $prevContent->title()?></a>
			<?php endforeach ?>
		</div>
		<div class="element d-one-third m-whole" data-reveal="parent">
			<?php foreach ($nextAll as $nextContent): ?>
				<a class="navi-item mono uppercase s-xsmall spacing-b-2" href="<?= $nextContent->url()?>"><?= $nextContent->title()?></a>
			<?php endforeach ?>
		</div>
	</div>
</navi>