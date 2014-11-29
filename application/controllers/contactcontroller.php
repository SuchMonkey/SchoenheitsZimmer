<?php

class ContactController extends Controller {
	
	public function contact() {
		$this->contactX(true);
	}
	
	public function contactAjax() {
		$this->contactX(false);
	}
	
	public function contactX($base = true) {
		$this->set("generalInformation", $this->Contact->getGeneralInformation());
		$this->render($base, "contact");
	}
	
	public function default_action() {
		$this->contact();
	}
}