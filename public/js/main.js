(function($) {
    $.fn.goTo = function(yOffset) {
    	if($(this).length == 0) return;
    	if(!yOffset) yOffset = 0;
    	var topOffset = $(this).offset().top + yOffset;
    	console.log(topOffset);
    	
        $('html, body').animate({
            scrollTop: topOffset + 'px'
        }, 'fast');
        return this; // for chaining...
    };
})(jQuery);

$(function() {
	
	
	function supports_history_api() {
		return !!!(window.history && history.pushState);
	}
	
	if(supports_history_api()) {
		// Prepare
		var History = window.History;
		if ( !History.enabled ) {
			// History.js is disabled for this browser.
			// This is because we can optionally choose to support HTML4 browsers or not.
			return false;
		}
	
		// Bind to StateChange Event
		History.Adapter.bind(window, 'statechange',function() {
			var state = History.getState();
			var url = state.url.replace("http://", "");
			var urlParts = url.split("/");
			
			url = "http://" + urlParts.shift() + "/" +  urlParts.shift() + "/" + urlParts.shift() + "Ajax/" + urlParts.join("/");
			console.log(url);
			$.get(url, function(data) {
				$('#pageContent').hide().html(data).fadeIn("fast");
				
				$('a.internal-link').unbind("click",linkHandler);
				$('a.internal-link').bind("click",linkHandler);
				
				$('#button-search').unbind("click",search);
				$('#button-search').bind("click",search);
				
				$('.carousel-inner img').unbind("click",openBigPicture);
				$('.carousel-inner img').bind("click",openBigPicture);
				
				$('.gallery-thumbnail').unbind("click", openBigPicture);
				$('.gallery-thumbnail').bind("click", openBigPicture);
				
				$('.big-picture-remover').unbind("click",closeBigPicture);
				$('.big-picture-remover').bind("click",closeBigPicture);
				
				$('.big-picture').unbind("click",closeBigPicture);
				$('.big-picture').bind("click",closeBigPicture);
				
				$('.image-tile-handler').unbind("click",scrollToTop);
				$('.image-tile-handler').bind("click",scrollToTop);
				
				$("#input-search").unbind("keypress",search);
				$("#input-search").bind("keypress",search);
				
				$("#input-search").focus();
				
				scrollToTop();
			});
		});
	}
	
	// Capture all the links to push their url to the history stack and trigger the StateChange Event
	
	$('a.internal-link').click(linkHandler);
	
	function linkHandler(evt) {
		var url = $(this).attr('href');
		
		evt.preventDefault();
		
		if(url.indexOf("www.") > -1) {
			$(window).unbind('statechange');
			window.location.href = url;
		} else {
			loadUrl(url);
		}
	}
	
	$('#button-search').click(search);
	
	$("#input-search").keypress(search);
	
	function search(event) {
		if(event.type == "keypress" && event.which != 13) {
			return;
		}
		var searchValue = $('#input-search').val();
		var urlPart = $('#button-search').attr('data-searchhref');
		var url = urlPart + encodeURIComponent(searchValue);
		loadUrl(url);
		$("#input-search").focus();
	}
	
	function loadUrl(url) {
		var displayUrl = url.replace("Ajax", "");	
		console.log(displayUrl);
		if(supports_history_api()) {
			History.pushState({}, $(this).text(), displayUrl);	
		} else {
			window.location.href = displayUrl;
		}
	}
	
	$('.carousel-inner img').click(openBigPicture);
	$('.gallery-thumbnail').click(openBigPicture);
	
	function openBigPicture() {
		var imgSrc = $(this).attr('src');
		
		if(!!!imgSrc) {
			imgSrc = $(this).css('background-image');
			
			if(!imgSrc) {
				return;
			}
		} else {
			imgSrc = "url(" + imgSrc + ")";
		}
		$("#big-img").css("background-image", imgSrc);
		$(".big-picture-container").removeClass("hidden");
	}
	
	$('.big-picture-remover').click(closeBigPicture);
	$('.big-picture').click(closeBigPicture);
		
	function closeBigPicture() {
		$(".big-picture-container").addClass("hidden");
	}
	
	function scrollToTop() {
		$("html, body").animate({ scrollTop: 0 }, "fast");
	}
	
	scrollToTop();
});