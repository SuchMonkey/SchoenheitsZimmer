<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li class="active kapitaelchen">Gallerie</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div id="sz-gallary-carousel" class="carousel slide fixed-size-carousel" data-ride="carousel">
			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">
				<?php 
					$first = true; 
					foreach($fileList as $file): 
				?>
				<div class="item <?php if($first) { echo "active"; $first = false; } ?>">
					<?php insertImage( $file, "image-border"); ?>
				</div>
				<?php endforeach; ?>
			</div>
			
			<!-- Controls -->
			<a class="left carousel-control" href="#sz-gallary-carousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
				<span class="sr-only">Vorheriges</span>
			</a>
			<a class="right carousel-control" href="#sz-gallary-carousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
				<span class="sr-only">Nächstes</span>
			</a>
		</div>
	</div>
</div>
<?php $j = 0; while(!empty($fileList)): ?>
	<div class="row">
		<?php for($i = 0; $i < 4 && !empty($fileList); $i++): ?>
			<?php $img = array_shift($fileList); ?>
			<div class="col-md-3 ">
				<div class="bg-image-border gallery-thumbnail pointer" style="background-image: url('<?php echo getImageUrl($img); ?>');">
					
				</div>
			</div>
		<?php endfor; ?>
	</div>
<?php endwhile; ?>
<div class="big-picture-container hidden">
	<!--div class="big-picture">
		<img id="big-img" class="big-picture-inner image-border-big"/>
	</div-->
	
	<div id="big-img" class="big-picture">
		<span class="glyphicon glyphicon-remove big-picture-remover pointer"></span>
	</div>
</div>

