<?php

function href() {
	$arguments = func_get_args();
	
	if(is_array($arguments[0])) {
		$arguments = $arguments[0];
	}
	
	$controller = array_shift($arguments);
	$action = array_shift($arguments);
	$params = $arguments;
	
	$url = "/";
	
	if(!is_null($controller) && !empty($controller)) {
		$url .= $controller . "/";
	}
	if(!is_null($action) && !empty($action)) {
		$url .= $action . "/";
	}
	if(!is_null($params) && !empty($params)) {
		foreach($params as $param) {
			$url .= urlencode(str_replace("/", "^", strtolower($param))) . "/";
		}
	}
	echo $url;
}

// surround first letter per word for first lette big stuff...
function sflpw($text = '') {
	echo preg_replace("/(\S)(\S+)/u", "<span class='highlight-first-letter'>$1</span>$2", $text);
}

function insertImage($imageName, $class = "") {
	
	$alt = explode(DS, $imageName);
	$alt = array_pop($alt);
	$src = getImageUrl($imageName);
	
	echo '<img src="' . $src . '" alt="' . $alt . '" class="' . $class . '">';
}

function getImageUrl($imageName) {
	$src = "/" . "public" . "/" . "img" . "/" . $imageName;	
	return $src;
}

function simpleFormat($text) {
	$replaceTable = array(
		"###liststart###" => "<ul>",
		"###unstyledliststart###" => "<ul class='list-unstyled'>",
		"###unstyledlistend###" => "</ul>",
		"###listend###" => "</ul>",
		"###listitemstart###" => "<li>",
		"###listitemend###" => "</li>",
		"###break###" => "<br>",
		"###strongstart###" => "<strong>",
		"###strongend###" => "</strong>"
	);
	
	foreach($replaceTable as $marker => $entity) {
		$text = str_replace($marker, $entity, $text);
	}
	echo $text;
}