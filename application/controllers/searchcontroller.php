<?php

class SearchController extends Controller {
	
	public function search($searchInput = NULL) {
		$this->searchX($searchInput, true);
	}
	
	public function searchAjax($searchInput = NULL) {
		$this->searchX($searchInput, false);
	}
	
	public function searchX($searchInput = NULL, $base = true) {
		if(!is_null($searchInput)) {
			$results = $this->Search->getSearchResults(strtolower($searchInput));
			
			for($i = 0; $i < count($results); $i++) {
				switch($results[$i]["context"]) {
					case 'therapyunits':
						$sectionInfo = $this->Search->getCategoryAndUnitForUnitsSection($results[$i]["id"]);
						$results[$i]["hrefParts"] = array("therapy","categoryAjax",$sectionInfo["category"],$sectionInfo["unit"]);
						break;
					case 'therapyunits':
						$sectionInfo = $this->Search->getCategoryForTherapy($results[$i]["id"]);
						$results[$i]["hrefParts"] = array("therapy","categoryAjax",$sectionInfo["category"]);
						break;
					case 'therapys':
						$results[$i]["hrefParts"] = array("therapy","categoryAjax");
						break;
					case 'home': case 'about': case 'price':
						$sectionInfo = $this->Search->getCategoryAndUnitForUnitsSection($results[$i]["id"]);
						$results[$i]["hrefParts"] = array($results[$i]["context"],$results[$i]["context"]."Ajax");
						break;
				}
			}
			
			
			$this->set("searchResults", $results);
		} else {
			$this->set("searchResults", array());
		}
		
		$this->render($base, "search");
	}
	
	public function default_action() {
		$this->search();
	}
}