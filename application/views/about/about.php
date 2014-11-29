<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li class="active kapitaelchen">Über mich</li>
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
		<h2 class="kapitaelchen">
			<?php echo $generalInformation["name"]; ?>
		</h2>
		<p>
			<?php echo simpleFormat($generalInformation["text"]); ?>
		</p>
		<?php insertImage("annakarner.png", "img-responsive brandy"); ?>
	</div>
	
</div>