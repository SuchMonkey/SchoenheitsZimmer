<?php

class OpeningController extends Controller {
	
	public function opening() {
		$this->openingX(true);
	}
	
	public function openingAjax() {
		$this->openingX(false);
	}
	
	public function openingX($base = true) {
		$this->set("generalInformation", $this->Opening->getGeneralInformation());
		$this->render($base, "opening");
	}
	
	public function default_action() {
		$this->opening();
	}
}