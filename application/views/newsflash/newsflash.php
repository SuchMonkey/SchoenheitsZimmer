<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li class="active kapitaelchen">Neuigkeiten</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<?php insertImage($generalInformation['imgName'], "img-responsive image-border"); ?>
	</div>
</div>
<?php while(!empty($sections)): ?>
	<div class="row">
		<?php for($i = 0; $i < 1 && !empty($sections); $i++): ?>
			<?php $section = array_shift($sections); ?>
			<div class="col-md-8 col-md-offset-2">
				<h4 class="kapitaelchen"><?php echo $section['name']; ?></h4>
				<p>
					<?php simpleFormat($section['text']); ?>
				</p>
			</div>
		<?php endfor; ?>
	</div>
<?php endwhile; ?>