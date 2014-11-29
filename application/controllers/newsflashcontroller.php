<?php

class NewsflashController extends Controller {
	
	public function newsflash() {
		$this->newsflashX(true);
	}
	
	public function newsflashAjax() {
		$this->newsflashX(false);
	}
	
	public function newsflashX($base = true) {
		$this->set("generalInformation", $this->Newsflash->getGeneralInformation());
		$this->set("sections", $this->Newsflash->getSections());
		$this->render($base, "newsflash");
	}
	
	public function default_action() {
		$this->newsflash();
	}
}
