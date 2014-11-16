<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb kapitaelchen">
			<li class="active">Suche</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-md-2">
		<h2 class="kapitaelchen"><?php echo $generalInformation['name']; ?></h2>
	</div>	
	<div class="col-md-8">
		<div class="input-group">
			<input type="text" id="input-search" class="form-control" value="">
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
			<a href="<?php href($searchResult["hrefParts"]); ?>"><?php echo $searchResult["name"]; ?></a>
		</h4>
		<p>
			<?php echo $searchResult["text"]; ?>
		</p>
	</div>
</div>
<?php endforeach; ?>