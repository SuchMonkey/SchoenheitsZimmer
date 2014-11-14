<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb kapitaelchen">
			<li><a href="<?php href('price', 'categoryAjax'); ?>">Preise</a></li>
			<li class="active"><?php echo $category['name']; ?></li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<h4 class="kapitaelchen"><?php echo $category['name']; ?></h4>
		<?php foreach($units as $unit):?>
			<h5 class="kapitaelchen"><?php echo $unit['name']; ?> <small>(ca. <?php echo $unit['duration']; ?> min)</small> <small class="pull-right">€ <?php echo $unit['price']; ?>-</small></h5>
			<p>
				<?php echo $unit['keyPoints']; ?>
			</p>
			
		<?php endforeach; ?>
	</div>
</div>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<h4 class="kapitaelchen">Extras</h4>
		<?php foreach($extras as $extra):?>
			<h5 class="kapitaelchen"><?php echo $extra['name']; ?> <small class="pull-right">€ <?php echo $extra['price']; ?>-</small></h5>
		<?php endforeach; ?>
	</div>
</div>