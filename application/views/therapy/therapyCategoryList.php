<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb kapitaelchen">
			<li class="active">Behandlungen</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<?php insertImage($generalInformation['imgName'], "img-responsive image-border"); ?>
	</div>
</div>


<?php while(!empty($categories)): ?>
	<div class="row">
		<?php for($i = 0; $i < 3 && !empty($categories); $i++): ?>
			<?php $item = array_shift($categories); ?>
			<div class="col-md-4">
				<h4 class="kapitaelchen"><?php echo $item['name']; ?></h4>
				<p>
					<?php echo simpleFormat($item['shortDescription']); ?>
					<a href="<?php href('therapy', 'categoryAjax', $item['name']); ?>" class="internal-link"> mehr...</a>
				</p>
			</div>
		<?php endfor; ?>
	</div>
<?php endwhile; ?>
