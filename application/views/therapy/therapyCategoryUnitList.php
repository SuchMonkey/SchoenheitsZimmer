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
		</p>
	</div>
	<div class="col-md-8">
		<?php insertImage($category['imgName'], "img-responsive image-border"); ?>
	</div>
</div>

<?php while(!empty($units)): ?>
	<div class="row">
		<?php for($i = 0; $i < 3 && !empty($units); $i++): ?>
			<?php $item = array_shift($units); ?>
			<div class="col-md-4">
				<h4 class="kapitaelchen"><a href="<?php href('therapy', 'categoryAjax', $category['name'], $item['name']); ?>"><?php echo $item['name']; ?></a></h4>
				<p>
					<?php echo $item['shortDescription']; ?>
					<a href="<?php href('therapy', 'categoryAjax', $category['name'], $item['name']); ?>"> mehr...</a>
				</p>
			</div>
		<?php endfor; ?>
	</div>
<?php endwhile; ?>
