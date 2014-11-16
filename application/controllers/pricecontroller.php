<?php

class PriceController extends Controller {
		
	public function category($category = null, $unit = null) {
		$this->categoryX($category, $unit, true);
	}	
	
	public function categoryAjax($category = null, $unit = null) {
		$this->categoryX($category, $unit, false);
	}
	
	public function categoryX($category = null, $unit = null, $base = true) {
		if (!is_null($category)) {
			
			$prices = array();
			$pCategories = $this->Price->getCategories();
			
			foreach($pCategories as $pCategory) {
				$prices[$pCategory["name"]] = $this->Price->getUnits($pCategory["name"]);
			}
			
			$this->set("prices", $prices);
			$this->set("clickedCategory", $category);
			$this->render($base, "priceCategoryUnitList");
		} else {
			$this->set("categories", $this->Price->getCategories());
			$this->set("generalInformation", $this->Price->getGeneralInformation());
			$this->render($base, "priceCategoryList");
		}
		
	}
	
	public function default_action() {
		$this->category();
	}
}