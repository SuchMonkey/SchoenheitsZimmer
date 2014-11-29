<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
			<li class="active kapitaelchen">Kontakt</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
		<h2 class="kapitaelchen"><?php simpleFormat($generalInformation['name']); ?></h2>
		<?php simpleFormat($generalInformation["text"]); ?>
	</div>
	<div class="col-md-8">
		<div id="map" class="image-border">
			
		</div>
	</div>
</div>


<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">

	function initialize() {
		var coords =  new google.maps.LatLng(47.748208,13.086559);
		
        var mapOptions = {
          center: coords,
          zoom: 18
        };
        var map = new google.maps.Map(document.getElementById('map'), mapOptions);
        
        var marker = new google.maps.Marker({
			position: coords,
			map: map,
			title: 'Schönheitszimmer'
		});
      }
      google.maps.event.addDomListener(window, 'load', initialize);
</script>
