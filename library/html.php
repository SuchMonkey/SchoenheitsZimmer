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

function simpleFormat($inputText, $shortenAndNoFormat = false) {
	$replaceTable = array(
			"###liststart###" => "<ul>",
			"###unstyledliststart###" => "<ul class='list-unstyled'>",
			"###unstyledlistend###" => "</ul>",
			"###listend###" => "</ul>",
			"###listitemstart###" => "<li>",
			"###listitemend###" => "</li>",
			"###break###" => "<br>",
			"###strongstart###" => "<strong>",
			"###strongend###" => "</strong>",
			'###emaillinkstart###' => '<a href=',
			'###emailaddressstart###' => '"mailto:',
			'###emailaddressend###' => '">',
			'###emaillinkend###' => '</a>',
			'###smallstart###' => '<small>',
			'###smallend###' => '</small>'
		);
	
	$outputText = "";
		
	if($shortenAndNoFormat) {
		foreach($replaceTable as $marker => $entity) {
			$inputText = str_replace($marker, " ", $inputText);
		}
		
		$sentence = preg_split('/([^.:!?]+[.:!?]+)/', $inputText, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
		
		
		
		foreach($sentence as $line) {
			if(strlen($outputText) <= 200 && strlen($outputText . $line) <= 300) {
				$outputText .= $line;
			} else {
				break;
			}
		}
		
		if(strlen($outputText) <= 100) {
			$outputText = $inputText;
		}
	} else {	
		foreach($replaceTable as $marker => $entity) {
			$inputText = str_replace($marker, $entity, $inputText);
		}
		$outputText = $inputText;
	}
	echo $outputText;
}