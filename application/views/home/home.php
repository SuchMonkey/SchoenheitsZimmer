<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li class="active kapitaelchen">Home</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<?php insertImage($generalInformation['imgName'], "img-responsive image-border"); ?>
	</div>
</div>
<?php while(!empty($sections)): ?>
	<div class="row">
		<?php for($i = 0; $i < 2 && !empty($sections); $i++): ?>
			<?php $section = array_shift($sections); ?>
			<div class="col-md-6">
				<h4 class="kapitaelchen"><?php if(!is_null($section["linksTo"])): ?>
					<a href="<?php href($section["linksTo"]); ?>"><?php endif; echo $section['name']; if(!is_null($section["linksTo"])):?></a>
				<?php endif; ?></h4>
				<p>
					<?php simpleFormat($section['text']); ?>
					<?php if(!is_null($section["linksTo"])): ?>
						<a href="<?php href($section["linksTo"]); ?>" class="internal-link"> mehr...</a>
					<?php endif; ?>
				</p>
			</div>
		<?php endfor; ?>
	</div>
<?php endwhile; ?>