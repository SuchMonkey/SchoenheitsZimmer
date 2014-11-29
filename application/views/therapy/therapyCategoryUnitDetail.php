<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb kapitaelchen">
			<li><a href="<?php href('therapy', 'categoryAjax', $category['name']); ?> class="internal-link""><?php echo $category['name']; ?></a></li>
			<li class="active"><?php echo $unit['name']; ?></li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<?php insertImage($unit['imgName'], "img-responsive image-border"); ?>
	</div>
</div>

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h4 class="kapitaelchen"><?php echo $unit["name"]; ?>
			<?php if($unit['duration'] != -1): ?>
			<small> (ca. <?php echo $unit['duration']; ?> min.)</small>
			<?php endif; ?>
		</h4>
		<p><?php echo simpleFormat($unit["shortDescription"]); ?></p>
		<?php if($unit["showActionsMode"] == 0): ?>
			<ul>
			<?php foreach($therapyUnitActions as $action): ?>
				<?php if($action['price'] > -3): ?>
				<li><?php echo $action["name"]; ?></li>
				<?php endif; ?>
			<?php endforeach;?>
			</ul>
		<?php endif; ?>
	</div>
</div>

<?php foreach($sections as $section): ?>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h4 class="kapitaelchen">
				<?php echo $section['name']; ?>
			</h4>
			<p>
				<?php simpleFormat($section['text']); ?>
			</p>
		</div>
	</div>
<?php endforeach; ?>

<?php if($unit['price'] != -1): ?>
	<?php $unitPrice = ($unit['price'] == -2) ? "auf Anfrage" : "€ " . $unit['price'] . ",-"; ?>
	<div class="row">
		<div class="col-md-4 col-md-offset-2">
			<h5 class="kapitaelchen">Preis <small><?php echo $unitPrice; ?></small></h5>
		</div>
	</div>
<?php endif; ?>

<?php if($unit["showActionsMode"] == 1): ?>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h5 class="kapitaelchen">Behandlungen / Preise</h5>
			<table class="extra-table table ">
				<?php foreach($therapyUnitActions as $action):?>
					<?php if($action['price'] > -3): ?>
					<tr>
						<td class="first">
							<?php echo $action['name']; ?>
							<?php if($action['duration'] >= 0):?>
								(ca. <?php echo $action['duration']; ?> min.)
							<?php endif; ?>
						</td>
						<td class="text-right">€</td>
						<td class="text-right"><?php echo $action['price']; ?>,-</td>
						
					</tr>
					<?php endif; ?>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
<?php endif; ?>

<?php if($unit["showActionsMode"] == 2): ?>
	<?php foreach($therapyUnitActions as $action): ?>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h4 class="kapitaelchen"><?php echo $action["name"]; ?>
					<?php if($action['duration'] != -1): ?>
					<small> (ca. <?php echo $action['duration']; ?> min.)</small>
					<?php endif; ?>
				</h4>
				<p><?php echo simpleFormat($action["text"]); ?></p>
				<?php $actionPrice = ($action['price'] == -2) ? "auf Anfrage" : "€ " . $action['price'] . ",-"; ?>
				<h5 class="kapitaelchen">Preis <small><?php echo $actionPrice; ?></small></h5>
			</div>
		</div>
	<?php endforeach; ?>
<?php endif; ?>

<?php if(!empty($therapyUnitExtras)): ?>
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
<?php endif; ?>