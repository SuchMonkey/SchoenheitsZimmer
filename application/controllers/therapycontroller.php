<?php

class TherapyController extends Controller {
		
	public function category($category = null, $unit = null) {
		$this->categoryX($category, $unit, true);
	}	
	
	public function categoryAjax($category = null, $unit = null) {
		$this->categoryX($category, $unit, false);
	}
	
	public function categoryX($category = null, $unit = null, $base = true) {
		if(!is_null($unit)) {
			$this->set("category", $this->Therapy->getCategory($category));
			$this->set("unit", $this->Therapy->getUnit($unit));
			$this->set("sections", $this->Therapy->getSections($unit));
			$this->set("therapyUnitExtras", $this->Therapy->getTherapyUnitActions($unit, true));
			$this->set("therapyUnitActions", $this->Therapy->getTherapyUnitActions($unit, false));
			$this->render($base, "therapyCategoryUnitDetail");
		} elseif (!is_null($category)) {
			$this->set("category", $this->Therapy->getCategory($category));
			$this->set("units", $this->Therapy->getUnits($category, false));
			
			$pulledUpUnit = $this->Therapy->getUnits($category, true);
			if(count($pulledUpUnit) == 1) {
				$this->set("pulledUpUnit", $pulledUpUnit[0]);
			}
			
			$this->render($base, "therapyCategoryUnitList");
		} else {
			
			$this->set("categories", $this->Therapy->getCategories());
			$this->set("generalInformation", $this->Therapy->getGeneralInformation());
			$this->render($base, "therapyCategoryList");
		}
		
	}
	
	public function default_action() {
		$this->category();
	}
}