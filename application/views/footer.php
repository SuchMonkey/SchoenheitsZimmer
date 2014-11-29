		</div>
			<div class="row bottom-section">
				<div class="col-md-3">
					<a href="https://www.facebook.com/pages/Sch%C3%B6nheitszimmer/762548707148973" class="fb-icon" target="_blank">
					</a>
					<h4 class="kapitaelchen">
						<?php echo $getSocialInformation["name"]; ?>
					</h4>
					<p>
						<?php echo $getSocialInformation["text"]; ?>
					</p>
				</div-->
				<!--?php while(!empty($siteMapLinks)): ?>
					<div class="col-md-3">
						<ul class="list-unstyled sitemap">
							<?php for($i = 0; $i < 12 && !empty($siteMapLinks); $i++): ?>
							<?php 
								$item = array_shift($siteMapLinks);
								$urlName = array_shift($item);
								$urlParams = $item; 
							?>
							<li>
							<a href="<?php href($urlParams); ?>"><?php echo $urlName; ?></a>
							</li>
							<?php endfor; ?>
						</ul>
					</div>
				<!--?php endwhile; ?-->
			<!--/div-->
		</div>
	</body>
</html>