<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb kapitaelchen">
			
			<li class="active"><?php echo $category['name']; ?></li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
		
		<h2 class="kapitaelchen"><?php echo $category['name']; ?></h2>
		<p>
			<?php simpleFormat($category['description']); ?>
			<?php if(isset($pulledUpUnit)): ?>
				<a href="<?php href('therapy', 'categoryAjax', $category['name'], $pulledUpUnit['name']); ?>" class="internal-link"> mehr...</a>
			<?php endif; ?>
		</p>
	</div>
	<div class="col-md-8">
		
		<?php insertImage($category['imgName'], "img-responsive image-border"); ?>
	</div>
</div>

<?php $pullRight = (count($units) == 2) ? true : false; ?>
<?php while(!empty($units)): ?>
	<div class="row">
		<?php if($pullRight):?>
			<div class="col-md-4">
			</div>
		<?php endif; ?>
		<?php for($i = 0; $i < 3 && !empty($units); $i++): ?>
			<?php $item = array_shift($units); ?>
			<div class="col-md-4">
				<h4 class="kapitaelchen"><a href="<?php href('therapy', 'categoryAjax', $category['name'], $item['name']); ?>" class="internal-link"><?php echo $item['name']; ?></a></h4>
				<p>
					<?php echo simpleFormat($item['shortDescription'], true); ?>
					<a href="<?php href('therapy', 'categoryAjax', $category['name'], $item['name']); ?>" class="internal-link"> mehr...</a>
				</p>
			</div>
		<?php endfor; ?>
	</div>
<?php endwhile; ?>