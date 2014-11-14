<?php

class HomeController extends Controller {
	
	public function home() {
		$this->homeX(true);
	}
	
	public function homeAjax() {
		$this->homeX(false);
	}
	
	public function homeX($base = true) {
		$this->set("generalInformation", $this->Home->getGeneralInformation());
		$this->set("sections", $this->Home->getSections());
		$this->render($base, "home");
	}
	
	public function default_action() {
		$this->home();
	}
}
