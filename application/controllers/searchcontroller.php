<?php

class SearchController extends Controller {
	
	public function search($searchInput = NULL) {
		$this->searchX($searchInput, true);
	}
	
	public function searchAjax($searchInput = NULL) {
		$this->searchX($searchInput, false);
	}
	
	public function searchX($searchInput = NULL, $base = true) {
		if(!is_null($searchInput) && strlen($searchInput) >= 3) {
			$results = $this->Search->getSearchResults(strtolower($searchInput));			
			
			$this->set("searchResults", $results);
		} else {
			$this->set("searchResults", array());
		}
		
		$this->set("generalInformation", $this->Search->getGeneralInformation());
		$this->render($base, "search");
	}
	
	public function default_action() {
		$this->search();
	}
}