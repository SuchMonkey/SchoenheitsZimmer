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
			$this->set("category", $this->Price->getCategory($category));
			$this->set("units", $this->Price->getUnits($category));
			$this->set("extras", $this->Price->getExtras($category));
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