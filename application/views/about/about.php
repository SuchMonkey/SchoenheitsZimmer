<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li class="active kapitaelchen">Über mich</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-md-8">
		<h4 class="kapitaelchen">
			<?php echo $generalInformation["name"]; ?>
		</h4>
		<p>
			<?php echo $generalInformation["text"]; ?>
		</p>
	</div>
	<div class="col-md-4">
		<?php insertImage($generalInformation['imgName'], "img-responsive image-border"); ?>
	</div>
</div>