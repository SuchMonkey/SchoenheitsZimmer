<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb kapitaelchen">
			<li class="active">Preise</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<h2 class="kapitaelchen"><?php echo $generalInformation["name"]; ?></h2>
		<p>
			<?php simpleFormat($generalInformation["text"]); ?>
		</p>
	</div>	
</div>
<?php foreach($prices as $category => $units):?>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<h4 class="kapitaelchen"><?php echo $category; ?></h4>
		
		<table class="extra-table table ">
			<?php foreach($units as $unit):?>		
				<?php $unitPrice = ($unit['price'] == -2) ? "**" : $unit['price']; ?>
				<?php if($unit["price"] != -1): ?>
					<tr>
						<td class="first"><a href="<?php href('therapy', 'categoryAjax', $category, $unit['name']); ?>" class="internal-link"><?php echo $unit['name']; ?></a></td>
						<td class="text-right">€</td>
						<td class="text-right"><?php echo $unitPrice; ?>,-</td>
					</tr>
				<?php endif; ?>
				<?php foreach($unit["actions"] as $action):?>
					<?php $actionPrice = ($action['price'] == -2) ? "**" : $action['price']; ?>
					<?php if($action['price'] != -1): ?>
						<tr>
							<td class="first">
								<?php if($action['price'] != -4): ?>
								<a href="<?php href('therapy', 'categoryAjax', $category, $unit['name']); ?>" class="internal-link"><?php simpleFormat($action['name']); ?></a>
								<?php else: simpleFormat($action['name']); endif; ?></td>
							<td class="text-right"><?php if($action['price'] > -3 ): ?>€<?php endif;?></td>
							<td class="text-right"><?php if($action['price'] > -3): echo $actionPrice; ?>,-<?php endif; ?></td>
						</tr>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php endforeach; ?>
		
		</table>
	</div>
</div>
<?php endforeach; ?>
