<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb kapitaelchen">
			<li class="active">Suche</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<?php insertImage($generalInformation['imgName'], "img-responsive image-border"); ?>
	</div>
</div>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="input-group">
			<input type="text" id="input-search" class="form-control">
			<span class="input-group-btn">
				<button class="btn btn-link" data-searchhref="<?php href('search', 'searchAjax'); ?>" id="button-search" type="button"><span class="glyphicon glyphicon-search"></span></button>
			</span>
		</div><!-- /input-group -->
	</div>
</div>
<?php foreach($searchResults as $searchResult): ?>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h4 class="kapitaelchen">
			<a href="<?php href('therapy', 'categoryAjax', $searchResult['categoryname'], $searchResult['therapyunitname']); ?>" class="internal-link"><?php echo $searchResult['therapyunitname']; ?></a>
		</h4>
		<p>
			<?php simpleFormat($searchResult["therapyunittext"], true); ?>
		</p>
	</div>
</div>
<?php endforeach; ?>