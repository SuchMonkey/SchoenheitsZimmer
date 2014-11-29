<?php

class Price extends Model {
	public function getCategories() {
		return $this->query('select name from therapys order by orderNumber;')->fetchAll();
	}
	
	public function getCategory($name) {
		return $this->query('select name, description from therapys where lower(name) = ?;', array($name))->fetch();
	}
	
	public function getUnits($category) {
		return $this->query('select tu.name, tu.price, tu.duration from therapyunits tu, sz.therapys t where tu.therapyid = t.id and lower(t.name) = ? order by tu.orderNumber;', array($category))->fetchAll();
	}
	
	public function getGeneralInformation() {
		return $this->query("SELECT g.name, g.text, g.imgName FROM generals g WHERE g.keyName = 'price';")->fetch();
	}
	
	public function getTherapyUnitActions($unitName, $getExtras = false) {
		$isExtra = $getExtras ? 1 : 0;
		
		return $this->query('select tua.name, tua.price, tua.duration, tua.text from therapyUnitActions tua, therapyUnits tu where lower(tu.name) = ? and tua.therapyUnitId = tu.id and tua.isExtra = ? order by tua.orderNumber;', array($unitName, $isExtra))->fetchAll();
	}
}
	