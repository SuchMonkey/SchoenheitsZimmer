<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb kapitaelchen">
			<li><a href="<?php href('therapy', 'categoryAjax'); ?>">Behandlungen</a></li>
			<li><a href="<?php href('therapy', 'categoryAjax', $category['name']); ?>"><?php echo $category['name']; ?></a></li>
			<li class="active"><?php echo $unit['name']; ?></li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<?php insertImage($unit['imgName'], "img-responsive image-border"); ?>
	</div>
</div>
<?php
	$first = true; 
	foreach($sections as $section): 
?>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h4 class="kapitaelchen">
				<?php 
					echo $section['name'];
					if($first):
						$first = false;
				?>
						<small> (ca. <?php echo $unit['duration']; ?>)</small>
				<?php endif; ?>
			</h4>
			<p>
				<?php simpleFormat($section['text']); ?>
			</p>
		</div>
	</div>
<?php endforeach; ?>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h4 class="kapitaelchen">Preise <small>€ <?php echo $unit['price']; ?>,-</small></h4>
	</div>
</div>