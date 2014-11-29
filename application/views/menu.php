<div class="header">
	
	<div id="nav-header">
		<a id="nav-header-inner" class="internal-link" href="<?php href('home', 'homeAjax'); ?>">
			
		</a>
	</div>
	<div id="nav-wrapper">
		<nav class="navbar navbar-default affix-top" data-spy="affix" data-offset-top="200" role="navigation" id="nav">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul id="navbar" class="nav navbar-nav kapitaelchen">
						<li id="home">
							<a href="<?php href('home', 'homeAjax'); ?>" class="internal-link">Home</a>
						</li>
						<li class="dropdown">
							<a href="#" data-toggle="dropdown" class="dropdown-toggle">Behandlungen<b class="caret"></b></a>
							<ul class="dropdown-menu" id="categoryMenu">
								<!--<li><a href="<?php href('therapy', 'categoryAjax'); ?>" data-toggle="dropdown" class="dropdown-toggle">Übersicht</li>-->
								<!--<li class="divider"></li>-->
								<?php foreach($menuCategoryList as $cat): ?>
									<li><a href="<?php href('therapy', 'categoryAjax', $cat['name']); ?>" class="internal-link"><?php echo $cat['name']; ?></a></li>
								<?php endforeach; ?>
							</ul>
						</li>
						<li id="about">
							<a href="<?php href('about', 'aboutAjax'); ?>" class="internal-link">Über mich</a>
						</li>
						<li id="gallery">
							<a href="<?php href('gallery', 'galleryAjax'); ?>" class="internal-link">Gallerie</a>
						</li>
						<li id="price">
							<a href="<?php href('price', 'categoryAjax'); ?>" class="internal-link">Preise</a>
						</li>
						<li id="contact">
							<a href="<?php href('contact', 'contactAjax'); ?>" class="internal-link">Kontakt</a>
						</li>
						<li id="opening">
							<a href="<?php href('opening', 'openingAjax'); ?>" class="internal-link">Öffnungszeiten</a>
						</li>
						<li id="search">
							<a href="<?php href('search', 'searchAjax'); ?>" class="internal-link">Suche</a>
						</li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
	</div>
</div>