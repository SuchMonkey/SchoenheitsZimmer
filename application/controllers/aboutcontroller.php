<?php

class AboutController extends Controller {
	
	public function about() {
		$this->aboutX(true);
	}
	
	public function aboutAjax() {
		$this->aboutX(false);
	}
	
	public function aboutX($base = true) {
		$this->set("generalInformation", $this->About->getGeneralInformation());
		$this->render($base, "about");
	}
	
	public function default_action() {
		$this->about();
	}
	
}