<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li class="active kapitaelchen">Preise</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<?php foreach($categories as $category): ?>
			<h2><a class="kapitaelchen" href="<?php href('price', 'categoryAjax', $category['name']);?>" class="internal-link"><?php echo $category['name']; ?></a></h2>
		<?php endforeach ?>
		<p>Bitte beachten Sie, dass nur Barzahlung möglich ist.</p>
	</div>
</div>

