<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb kapitaelchen">
			<li><a href="<?php href('price', 'categoryAjax'); ?>">Preise</a></li>
			<li class="active">Preisübersicht</li>
		</ol>
	</div>
</div>

<?php foreach($prices as $category => $units):?>
<div class="row <?php if(strcasecmp($category, $clickedCategory) == 0) echo "scrollTo"; ?>">
	<div class="col-md-6 col-md-offset-3">
		<h4 class="kapitaelchen"><?php echo $category; ?></h4>
		
		<table class="extra-table table ">
		<?php foreach($units as $unit):?>		
			<tr>
				<td class="first"><a href="<?php href('therapy', 'categoryAjax', $category, $unit['name']); ?>"><?php echo $unit['name']; ?></a></td>
				<td class="text-right">€</td>
				<td class="text-right"><?php echo $unit['price']; ?>,-</td>
			</tr>
		<?php endforeach; ?>
		</table>
	</div>
</div>
<?php endforeach; ?>
