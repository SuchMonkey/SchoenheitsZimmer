<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li class="active kapitaelchen">Preise</li>
		</ol>
	</div>
</div>

<div class="row">
	<div class="col-md-4">
		<?php foreach($categories as $category): ?>
			<h4><a class="kapitaelchen" href="<?php href('price', 'categoryAjax', $category['name']);?>"><?php echo $category['name']; ?></a></h4>
		<?php endforeach ?>
		<p>Bitte beachten Sie, dass nur Barzahlungen möglich sind.</p>
	</div>
	<div class="col-md-8">
		<?php insertImage($generalInformation['imgName'], "img-responsive image-border"); ?>
	</div>
</div>

