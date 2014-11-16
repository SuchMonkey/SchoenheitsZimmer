<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb kapitaelchen">
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

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h4 class="kapitaelchen"><?php echo $unit["name"]; ?></h4>
		<p><?php echo $unit["shortDescription"]; ?></p>
		<ul>
		<?php foreach($therapyUnitActions as $action): ?>
			<li><?php echo $action["name"]; ?></li>
		<?php endforeach;?>
		</ul>
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
	<div class="col-md-4 col-md-offset-2">
		<h4 class="kapitaelchen">Preis: <small>€ <?php echo $unit['price']; ?>,-</small></h4>
	</div>
</div>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h4 class="kapitaelchen">Extras</h4>
		
		<table class="extra-table table ">
			<?php foreach($therapyUnitExtras as $extra):?>
				<tr>
					<td class="first"><?php echo $extra['name']; ?></td>
					<td class="text-right">€</td>
					<td class="text-right"><?php echo $extra['price']; ?>,-</td>
					
				</tr>
			<?php endforeach; ?>
		</table>
		
	</div>
</div>