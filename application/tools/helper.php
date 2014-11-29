<?php

class Helper extends Model {	
	
	public function getCategoriesForUrl() {
		return $this->query("SELECT name FROM therapys;")->fetchAll();
	}
	
	public function getTherapiesForUrl($category) {
		return $this->query('select tu.name, tu.shortDescription from therapyunits tu, therapys t where tu.therapyid = t.id and lower(t.name) = ? order by t.orderNumber;', array($category))->fetchAll();
	}
	
	public function getSocial() {
		return $this->query("SELECT name, text from generals where keyName = 'social';")->fetch();
	}
	
	public function getSiteMap() {
		$links = array();
		
		//home
		$links[] = array("Home", "home", "homeAjax");
		//therapies
		foreach($this->getCategoriesForUrl() as $category) {
			$links[] = array($category["name"], "therapy", "categoryAjax", $category["name"]);
			foreach($this->getTherapiesForUrl($category["name"]) as $therapyUnit) {
				$links[] = array($therapyUnit["name"], "therapy", "categoryAjax", $category["name"], $therapyUnit["name"]);
			}
		}
		//about
		$links[] = array("Über mich", "about", "aboutAjax");
		//gallery
		$links[] = array("Gallerie", "gallery", "galleryAjax");
		//price
		$links[] = array("Preise", "price", "categoryAjax");
		foreach($this->getCategoriesForUrl() as $category) {
			$links[] = array($category["name"], "price", "categoryAjax", $category["name"]);
			
		}
		//contact
		$links[] = array("Kontakt", "contact", "contactAjax");
		//opening
		$links[] = array("Öffnungszeiten", "opening", "openingAjax");
		//search
		$links[] = array("Suche", "search", "searchAjax");
		
		return $links;
	}
}