<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li class="active kapitaelchen">Home</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<h3 class="excerpt"><?php echo $generalInformation["name"]; ?></h3>
	</div>
	<div class="col-md-6">
		<?php insertImage($generalInformation['imgName'], "img-responsive image-border"); ?>
	</div>
</div>
<?php while(!empty($sections)): ?>
	<div class="row">
		<?php for($i = 0; $i < 2 && !empty($sections); $i++): ?>
			<?php $section = array_shift($sections); ?>
			<div class="col-md-6">
				<h4 class="kapitaelchen"><?php echo $section['name']; ?></h4>
				<p>
					<?php echo $section['text']; ?>
				</p>
			</div>
		<?php endfor; ?>
	</div>
<?php endwhile; ?>