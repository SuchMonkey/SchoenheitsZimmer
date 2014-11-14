<?php

class GalleryController extends Controller {

	public function gallery() {
		$this -> galleryX(true);
	}

	public function galleryAjax() {
		$this -> galleryX(false);
	}

	public function galleryX($base = true) {
		$fileList = array();
		$dir = ROOT . DS . "public" . DS . "img" . DS . "gallery";
		if ($handle = opendir($dir)) {

			while (false !== ($file = readdir($handle))) {
				if(is_dir($dir . DS . $file)) {
					continue;
				}
				$fileList[] = "gallery/" . $file;
			}

			closedir($handle);
		}
		$this -> set("fileList", $fileList);
		$this -> render($base, "gallery");
	}

	public function default_action() {
		$this -> gallery();
	}

}
